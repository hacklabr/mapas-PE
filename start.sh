#!/bin/bash

AMBIENTE=$1

if [ -z "$AMBIENTE" ]; then

    echo "Informe qual ambiente deseja executar homolog ou prod  Ex.: ./start.sh prod"
    exit

fi

docker-compose -f docker-compose.$AMBIENTE.yml up --detach
