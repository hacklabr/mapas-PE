#!/bin/bash

ENV=$(cat environment)

docker-compose -f docker-compose.$ENV.yml exec db psql -U mapas -d mapas
