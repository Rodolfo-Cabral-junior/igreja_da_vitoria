# Decisão Arquitetural — Alta Disponibilidade

## Projeto

Igreja da Vitória

Repositório:

`Rodolfo-Cabral-junior/igreja_da_vitoria`

Commit identificado no início da auditoria:

`54c34f957191e38f786fabe10de079a4f2f252b7`

---

## 1. Decisão

Foi definida como diretriz arquitetural do projeto a preparação da VPS Integrator para atuar futuramente como **origem secundária** da Igreja da Vitória.

A HostGator permanece, neste momento, como a **origem principal** da aplicação atualmente publicada.

A Cloudflare permanece como camada de DNS, proxy e proteção na frente das origens.

A futura arquitetura deverá permitir, após validação e implementação dos requisitos técnicos, o direcionamento do tráfego para a origem secundária na Integrator caso a origem principal fique indisponível.

---

## 2. Arquitetura planejada

A arquitetura planejada é:

**Internet → Cloudflare → Health Check → HostGator (origem principal) / Integrator (origem secundária)**

A HostGator continuará sendo a origem principal enquanto estiver disponível.

A Integrator será preparada como segunda origem da Igreja da Vitória.

O mecanismo de seleção entre as origens somente será implementado após auditoria, planejamento e testes.

---

## 3. Objetivo

Reduzir o risco de indisponibilidade da Igreja da Vitória caso a hospedagem principal na HostGator apresente uma falha.

A Integrator deverá ser preparada como segunda origem capaz de assumir a aplicação quando a origem principal estiver indisponível, desde que todos os requisitos técnicos tenham sido implementados e testados.

---

## 4. Cloudflare

A Cloudflare continuará sendo utilizada como camada intermediária entre os usuários e as origens.

A configuração atual deverá ser preservada durante a fase de auditoria.

Posteriormente deverão ser avaliados:

- DNS;
- proxy;
- SSL/TLS;
- WAF;
- regras de segurança;
- health checks;
- mecanismo de failover;
- eventual Cloudflare Load Balancing.

Nenhuma alteração deverá ser realizada antes da etapa correspondente do planejamento.

---

## 5. O que ainda NÃO foi implementado

Esta documentação registra uma decisão arquitetural planejada.

Ainda NÃO foram implementados:

- segunda origem da Igreja na Integrator;
- failover automático;
- Cloudflare Load Balancing;
- health check específico da aplicação;
- sincronização automática entre HostGator e Integrator;
- replicação de banco de dados;
- sincronização de arquivos;
- estratégia definitiva de recuperação;
- testes de failover;
- retorno automático para a origem principal.

---

## 6. Independência em relação à Vitrine Digital

A Igreja da Vitória será um projeto totalmente independente da Vitrine Digital.

Poderão ser reutilizados somente componentes de infraestrutura global quando a auditoria confirmar que isso é seguro.

### Potencialmente compartilháveis

- Docker Engine;
- Docker Compose;
- UFW;
- Fail2ban;
- SSH;
- recursos físicos da VPS;
- Nginx Proxy Manager, caso seja confirmado como gateway compartilhado adequado.

### Não compartilhar

- código da Vitrine;
- containers da Vitrine;
- banco da Vitrine;
- volumes da Vitrine;
- redes internas da Vitrine;
- `.env`;
- credenciais;
- APP_KEY;
- sessões;
- cache;
- filas;
- logs de aplicação;
- repositório Git;
- documentação interna;
- dados específicos da aplicação.

A Igreja deverá possuir seus próprios containers, redes internas, banco, volumes, variáveis de ambiente, código e documentação, conforme a arquitetura que será definida após a auditoria.

---

## 7. Ordem obrigatória de implementação

1. Auditar o projeto existente no GitHub.
2. Auditar a aplicação atualmente publicada na HostGator.
3. Auditar a configuração DNS e proxy da Cloudflare.
4. Identificar a stack atualmente utilizada.
5. Identificar dados estáticos e dinâmicos.
6. Identificar necessidade de banco de dados.
7. Identificar uploads e arquivos dinâmicos.
8. Identificar integrações externas.
9. Comparar o estado atual com o planejamento do projeto.
10. Definir a arquitetura definitiva.
11. Definir a estratégia de sincronização.
12. Definir a infraestrutura da Integrator.
13. Construir a origem secundária.
14. Testar a aplicação na Integrator sem interferir na origem principal.
15. Implementar health checks.
16. Implementar failover somente após validação.
17. Testar indisponibilidade da origem principal.
18. Testar retorno da origem principal.
19. Documentar o procedimento de recuperação.

---

## 8. Regra de prevenção de retrabalho

Nenhuma decisão definitiva sobre Laravel, PHP, banco de dados, Docker, frontend, backend ou outra tecnologia deverá ser tomada apenas por preferência ou suposição.

Primeiro deverá ser analisado o que já existe no projeto versionado.

O código existente deverá ser preservado sempre que tecnicamente adequado.

Nenhuma funcionalidade existente deverá ser reescrita sem análise prévia de seu funcionamento, dependências e impacto.

---

## 9. Estado atual

**STATUS: DECISÃO REGISTRADA — IMPLEMENTAÇÃO PENDENTE**

A arquitetura de alta disponibilidade foi definida como objetivo futuro.

A auditoria técnica do projeto ainda está em andamento.

A infraestrutura secundária da Integrator somente deverá ser construída após a conclusão da auditoria e do planejamento.

---

## 10. Regra para futuras sessões

Antes de qualquer alteração relacionada a:

- Cloudflare;
- HostGator;
- Integrator;
- DNS;
- proxy;
- failover;
- segunda origem;
- sincronização;
- banco de dados;
- deploy;

este documento deverá ser consultado.

Esta decisão não constitui autorização para implementação imediata.

A implementação somente deverá ocorrer quando a auditoria e o planejamento técnico forem concluídos e a etapa correspondente do projeto for formalmente iniciada.
