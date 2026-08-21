# ADR-0001 — Versionamento por peça via repositório aglutinador e submódulos pinados por SHA

> Status: **aceito** (2026-08-21) · Criado em: 2026-08-21

## Contexto

A plataforma é composta por core (Mapas Culturais), ~18 plugins, 2 temas e infraestrutura; atualizações independentes quebram compatibilidade entre as peças.

## Decisão

O repositório de deploy aglutina todas as peças: core pinado por tag exata de imagem (`hacklab/mapasculturais:7.8.6` — `docker/Dockerfile:1`), plugins/temas como submódulos git pinados por commit (evidência: `git ls-tree HEAD`), atualização controlada por `update.sh` (git pull + submodule update) e política semver documentada no README.

## Consequências

- ✅ Reprodutibilidade e rollback por commit.
- ⚠️ Exige submódulos inicializados no build (CI faz `--init --recursive` — `.github/workflows/ci.yml`).
- ⚠️ Exceções de pin (nginx:latest, metabase sem tag) e anomalias (SettingsPe local mas no `.gitmodules`; SubsiteMuseusSwitcher gitlink órfão sem `.gitmodules`) minam a uniformidade.
