# ADR-0003 — Dois produtos num único core, por domínio (MapasPE + Museus)

> Status: **aceito** (2026-08-21) · Criado em: 2026-08-21

## Contexto

PE opera o Mapa Cultural geral e a plataforma Museus com identidades distintas, sobre a mesma instalação.

## Decisão

`themes.active=MapasPE` (`docker/common/config.d/0.main.php:21`); o domínio de museus resolve na mesma app com o tema `MapasMuseus`, que recebe `conf-base.php` próprio substituído no build (`docker/Dockerfile:14` ← `docker/common/conf-base-museus.php`) — desabilita módulos e define selo/subsite (subsiteId=2). O plugin SubsiteMuseusSwitcher (submódulo) faz a alternância. MapasPE estende BaseV2 (`themes/MapasPE/Theme.php:6`).

## Consequências

- ✅ Um só deploy/DB para dois produtos.
- ⚠️ A config do Museus vive fora do tema (no repo de deploy) — atualizar o tema exige sincronizar o conf-base.
- ⚠️ O submódulo switcher órfão no `.gitmodules` é ponto frágil.
