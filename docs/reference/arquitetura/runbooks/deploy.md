# Runbook — Deploy

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Desatualizado → corrigir ou marcar obsoleto, nunca deixar apodrecer.

## Propósito

Publicar uma versão da plataforma em produção ou homologação (e subir o ambiente de dev).

## Pré-condições

- Submódulos inicializados: `git submodule update --init --recursive`
- Arquivo `environment` na raiz do servidor com `prod` ou `homolog`
- `.env` presente no servidor (contrato: `.env_sample`)
- CI verde (imagem `hacklab/mapas-pe` publicada se veio de tag/branch monitorada)

## Procedimento (produção/homologação)

1. No servidor: `sudo ./update.sh` — faz `git pull` → `git submodule update` → build `--no-cache --pull` → stop → start.
2. Acompanhar subida: `./logs.sh` (entrypoint roda migrations no boot — ADR-0004).
3. Smoke: homepage responde; login gov.br carrega; domínio de Museus responde; `bi.mapacultural.pe.gov.br` responde.

## Procedimento (dev)

1. `sudo ./dev/start.sh` (ou `-b` para rebuild); app em `http://localhost/`, mailhog em `http://localhost:8025`.

## Rollback deste runbook

→ `rollback.md`.
