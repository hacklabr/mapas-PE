# Convenção — Git workflow

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Desatualizado → corrigir ou marcar obsoleto, nunca deixar apodrecer.
> Derivado de: README.md (Git Flow + semver), histórico de commits, `.github/workflows/ci.yml`.

## Branches (Git Flow)

- `develop` — desenvolvimento e teste local de novas funcionalidades
- `master`/`main` — homologação (branches pontuais de funcionalidade para teste pontual)
- tags semver — produção (`v<X.Y.Z>`: PATCH = bump de peça/fix; MINOR = nova funcionalidade/plugin; MAJOR = quebra de compatibilidade, ex.: troca de major do core)

## CI (`.github/workflows/ci.yml`)

- Em push de tags `v*` e branches `master`/`develop`/`basev2`/`v7.0`/`v7.4`: inicializa submódulos `--init --recursive` e publica a imagem `docker.io/hacklab/mapas-pe`.

## Mensagens de commit

- Bump de peça: padrão histórico `"Atualiza <peça> para v<versão>"` ou `"Atualiza plugin <Nome>"`.
- Correções: prefixo convencional quando apropriado (ex.: `fix(docker): …` — presente no histórico).

## Atualização de peça (procedimento canônico)

1. Dentro do submódulo: checkout do commit/tag desejado.
2. Na raiz: stage do gitlink (`plugins/<Nome>` ou `themes/<Nome>`) — ou, para o core, edição da tag em `docker/Dockerfile:1` (e `update.sh`, se pinado).
3. Commit com a mensagem de bump; deploy via `update.sh`.
