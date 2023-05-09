#!/bin/bash

ENV=$(cat environment)

docker pull hacklab/mapasculturais:latest
git pull

git submodule update

docker-compose -f docker-compose.$ENV.yml build --no-cache

./stop.sh $ENV
./start.sh $ENV
