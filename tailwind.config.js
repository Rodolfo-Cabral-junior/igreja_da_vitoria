/** @type {import('tailwindcss').Config} */
module.exports = {
  // Tailwind varre todos esses arquivos para incluir apenas as classes usadas
  content: [
    "./index.php",
    "./components/**/*.php",
    "./config/**/*.php",
    "./assets/js/**/*.js",
  ],

  theme: {
    extend: {
      colors: {
        // ── Azul (cor primária) ──────────────────────────
        azul: {
          DEFAULT: "#1A2FA0",
          escuro:  "#111f6e",
          claro:   "#2a44c8",
        },

        // ── Vermelho (destaque) ──────────────────────────
        vermelho: {
          DEFAULT: "#CC1020",
          escuro:  "#9e0b18",
        },

        // ── Dourado (acento premium) ─────────────────────
        dourado: {
          DEFAULT: "#D4A844",
          claro:   "#e8c870",
          escuro:  "#a07a28",
        },

        // ── Neutros ──────────────────────────────────────
        preto:  "#0d0d0d",
        branco: "#ffffff",
        creme:  "#F8F6F1",
        bege:   "#EEEAE3",

        // ── Tons de texto ────────────────────────────────
        titulo:     "#18150F",
        corpo:      "#3D3830",
        secundario: "#6B6259",
        terciario:  "#9B9088",

        // ── Cinzas ───────────────────────────────────────
        "cinza-claro":  "#f5f5f5",
        "cinza-medio":  "#9ca3af",
        "cinza-escuro": "#4b5563",
      },

      fontFamily: {
        cinzel:  ["Cinzel", "serif"],
        raleway: ["Raleway", "sans-serif"],
      },

      // Animações usadas no hero e entrada de seções
      keyframes: {
        fadeDown: {
          "0%":   { opacity: "0", transform: "translateY(-20px)" },
          "100%": { opacity: "1", transform: "translateY(0)" },
        },
        fadeUp: {
          "0%":   { opacity: "0", transform: "translateY(20px)" },
          "100%": { opacity: "1", transform: "translateY(0)" },
        },
        slideIn: {
          "0%":   { opacity: "0", transform: "translateX(-20px)" },
          "100%": { opacity: "1", transform: "translateX(0)" },
        },
        pulse_soft: {
          "0%, 100%": { opacity: "1" },
          "50%":       { opacity: "0.7" },
        },
      },

      animation: {
        fadeDown:   "fadeDown 0.8s ease-out backwards",
        fadeUp:     "fadeUp 0.8s ease-out 0.2s backwards",
        slideIn:    "slideIn 0.6s ease-out backwards",
        pulse_soft: "pulse_soft 2s ease-in-out infinite",
      },

      // Sombras extras usadas nos cards
      boxShadow: {
        "3xl":    "0 35px 60px -15px rgba(0, 0, 0, 0.3)",
        dourado:  "0 8px 24px rgba(212, 168, 68, 0.25)",
        azul:     "0 8px 24px rgba(26, 47, 160, 0.25)",
        vermelho: "0 8px 24px rgba(204, 16, 32, 0.25)",
      },

      // Blur customizado para glass morphism
      backdropBlur: {
        xs: "2px",
      },
    },
  },

  plugins: [],
};