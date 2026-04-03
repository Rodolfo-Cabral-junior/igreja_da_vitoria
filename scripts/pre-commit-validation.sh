#!/bin/bash
# Validação automática para pre-commit hook
# Coloque este arquivo em .git/hooks/pre-commit e faça chmod +x

echo "🔍 Executando validações pré-commit..."
echo ""

ERRORS=0

# 1. Validar sintaxe PHP
echo "▶️  Validando PHP..."
for file in config/*.php components/*.php index.php; do
    if [ -f "$file" ]; then
        if ! php -l "$file" > /dev/null 2>&1; then
            echo "  ❌ ERRO em $file"
            php -l "$file"
            ERRORS=$((ERRORS + 1))
        fi
    fi
done
[ $ERRORS -eq 0 ] && echo "  ✅ PHP válido"

# 2. Verificar IDs duplicados no HTML
echo ""
echo "▶️  Verificando IDs HTML duplicados..."
DUPLICATED=$(grep -rh 'id="' components/ 2>/dev/null | cut -d'"' -f2 | sort | uniq -c | awk '$1 > 1 {print $2}')
if [ ! -z "$DUPLICATED" ]; then
    echo "  ❌ IDs duplicados encontrados:"
    echo "$DUPLICATED" | sed 's/^/     - /'
    ERRORS=$((ERRORS + 1))
else
    echo "  ✅ Sem IDs duplicados"
fi

# 3. Verificar inline styles (exceto Leaflet)
echo ""
echo "▶️  Verificando inline styles..."
INLINE=$(grep -rn 'style=' components/ | grep -v 'leaflet' | wc -l)
if [ $INLINE -gt 5 ]; then
    echo "  ⚠️  Encontrados $INLINE inline styles (limite: 5)"
    grep -rn 'style=' components/ | grep -v 'leaflet' | head -5
else
    echo "  ✅ Inline styles dentro do limite"
fi

# 4. Verificar se há console.log (debug)
echo ""
echo "▶️  Verificando console.log..."
CONSOLE=$(grep -rn 'console\.log' assets/js/ 2>/dev/null | wc -l)
if [ $CONSOLE -gt 0 ]; then
    echo "  ⚠️  $CONSOLE console.log encontrados (remover antes de produção)"
else
    echo "  ✅ Sem console.log"
fi

# 5. Verificar arquivo style.css foi compilado recentemente
echo ""
echo "▶️  Verificando compilação Tailwind..."
CSS_TIME=$(stat -f %m assets/css/style.css 2>/dev/null || stat -c%Y assets/css/style.css 2>/dev/null || echo 0)
NOW=$(date +%s)
DIFF=$((NOW - CSS_TIME))
if [ $DIFF -gt 3600 ]; then
    echo "  ⚠️  style.css tem mais de 1 hora (rode: npm run build)"
else
    echo "  ✅ CSS compilado recentemente"
fi

# Resumo
echo ""
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
if [ $ERRORS -eq 0 ]; then
    echo "✅ Todas as validações passaram!"
    exit 0
else
    echo "❌ $ERRORS erro(s) encontrado(s). Corrija antes de fazer commit."
    exit 1
fi
