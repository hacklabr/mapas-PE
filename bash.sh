#!/bin/bash
ENV=$(cat environment)

docker-compose -f docker-compose.$ENV.yml exec mapasculturais bash
