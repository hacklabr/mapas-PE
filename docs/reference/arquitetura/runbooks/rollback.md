# Runbook — Rollback

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Desatualizado → corrigir ou marcar obsoleto, nunca deixar apodrecer.

## Propósito

Reverter a plataforma para o estado anterior a um deploy com falha ou regressão.

## Pré-condições

- Saber o commit/estado anterior (o versionamento é por peça — ADR-0001).

## Procedimento

1. Voltar o repositório ao commit anterior: `git checkout <commit-anterior>` + `git submodule update --init --recursive` (isso repina plugins/tema nos SHAs do commit).
2. Se a tag do core mudou no Dockerfile, ela volta junto com o checkout (ADR-0001).
3. Rebuild + restart: `sudo ./update.sh` a partir do estado repinado (ou `stop.sh` + `start.sh` após build manual).
4. Smoke conforme `deploy.md`.

## ⚠️ Atenção — migrations

Migrations rodam em todo boot (ADR-0004): rollback de app NÃO faz rollback de schema. Se o deploy ruim aplicou migration destrutiva, o rollback da app pode não bastar — restaurar dump do backup diário (DB externo em prod) e avaliar perda de dados. <!-- TODO: preencher procedimento detalhado de restauração de dump quando documentado pelo time -->
