#!/bin/bash

ENV=$(cat environment)

docker compose -f docker-compose.$ENV.yml logs -f --tail=10
