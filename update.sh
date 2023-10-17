#!/bin/bash

ENV=$(cat environment)

git pull

git submodule update

docker-compose -f docker-compose.$ENV.yml build --no-cache --pull mapasculturais

./stop.sh $ENV
./start.sh $ENV
