#!/bin/bash

AMBIENTE=$1

if [ -z "$AMBIENTE" ]; then

    echo "Informe qual ambiente deseja executar homolog ou prod  Ex.: ./logs.sh prod"
    exit

fi

docker pull hacklab/mapasculturais:latest
git pull

git submodule update

docker-compose -f docker-compose.$AMBIENTE.yml build --no-cache

./stop.sh $AMBIENTE
./start.sh $AMBIENTE
