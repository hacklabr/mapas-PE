#!/bin/bash

AMBIENTE=$1

if [ -z "$AMBIENTE" ]; then

    echo "Informe qual ambiente deseja executar homolog ou prod  Ex.: ./logs.sh prod"
    exit

fi

docker-compose -f docker-compose.$AMBIENTE.yml logs -f --tail=10
