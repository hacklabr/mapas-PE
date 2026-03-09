#!/bin/bash
# Habilita modo verbose (mostra os comandos) e exit-on-error
set -x
set -e

# ==============================================================================
# 1. BLOCO DE ESPERA DO BANCO DE DADOS (CRÍTICO)
# ==============================================================================
# Ajuste as variáveis abaixo conforme seu .env (DB_HOST, DB_USER, etc)
echo "🐘 [Mapas] Aguardando conexão com o Banco de Dados..."

# Usamos um one-liner PHP para testar a conexão real, pois é mais confiável que netcat/ping
# Loop de até 60 segundos
for i in {1..30}; do
    if php -r "try { new PDO('pgsql:host=${DB_HOST:-db};dbname=${DB_NAME:-mapas}', '${DB_USER:-mapas}', '${DB_PASS:-mapas}'); echo 'OK'; } catch (PDOException \$e) { exit(1); }" > /dev/null 2>&1; then
        echo "✅ [Mapas] Banco de Dados conectado com sucesso!"
        break
    fi
    echo "⏳ [Mapas] Banco indisponível. Tentando novamente em 2s..."
    sleep 2
done

# ==============================================================================
# 2. CONFIGURAÇÃO DE DIRETÓRIOS E PERMISSÕES
# ==============================================================================
echo "📂 [Mapas] Configurando diretórios de cache e logs..."
mkdir -p /var/www/var/DoctrineProxies /var/www/var/logs

# Garante que o arquivo existe antes de mudar permissão
touch /var/www/var/logs/app.log
chown -R www-data: /var/www/var/DoctrineProxies /var/www/var/logs

# ==============================================================================
# 3. ATUALIZAÇÕES DE BANCO E SCHEMA
# ==============================================================================
echo "🔄 [Mapas] Executando scripts de atualização de banco..."

# Dica: Adicione "|| true" se você quiser que o container suba mesmo se o update falhar
sudo -E -u www-data /var/www/scripts/db-update.sh
sudo -E -u www-data /var/www/scripts/mc-db-updates.sh

# ==============================================================================
# 4. COMPILAÇÃO CONDICIONAL (Versão/Assets)
# ==============================================================================
if ! cmp /var/www/version.txt /var/www/var/private-files/deployment-version >/dev/null 2>&1
then
    echo "⚙️ [Mapas] Versão alterada. Recompilando SASS e Proxies..."
    sudo -E -u www-data /var/www/scripts/compile-sass.sh
    sudo -E -u www-data /var/www/src/tools/doctrine orm:generate-proxies
    
    # Verifica se a pasta destino existe antes de copiar
    mkdir -p /var/www/var/private-files/
    cp /var/www/version.txt /var/www/var/private-files/deployment-version
fi

if [ "$BUILD_ASSETS" = "1" ]; then
    echo "📦 [Mapas] BUILD_ASSETS=1 detectado. Instalando dependências JS..."
    chown www-data: /var/www/public/assets
    cd /var/www/src
    # Adicionado --ignore-scripts para segurança se necessário, ou mantenha normal
    pnpm install --recursive 
    pnpm run dev
    cd / # Volta para raiz para segurança
fi

# ==============================================================================
# 5. AJUSTE FINAL DE PERMISSÕES
# ==============================================================================
echo "🔒 [Mapas] Aplicando permissões finais..."
# Verifica existência antes do chown para evitar erros
[ -d /var/www/public/assets ] && chown www-data:www-data /var/www/public/assets 
[ -d /var/www/public/files ] && chown www-data:www-data /var/www/public/files 
[ -d /var/www/var/private-files ] && chown www-data:www-data /var/www/var/private-files

# ==============================================================================
# 6. CRONS E PROCESSO PRINCIPAL
# ==============================================================================
echo "⏰ [Mapas] Inicializando CRONs..."
touch /nohup.out
chown www-data: /nohup.out

# Redirecionamento simplificado para garantir que vá para o stdout do Docker
sudo -E -u www-data nohup /jobs-cron.sh > /proc/1/fd/1 2>&1 &
sudo -E -u www-data nohup /recreate-pending-pcache-cron.sh > /proc/1/fd/1 2>&1 &

touch /mapas-ready

echo "🚀 [Mapas] Iniciando processo principal..."
exec "$@"