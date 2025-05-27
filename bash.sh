#!/bin/bash
ENV=$(cat environment)

ENV=$(cat environment)

docker compose -f docker-compose.$ENV.yml exec mapasculturais bash
