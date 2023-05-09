#!/bin/bash

ENV=$(cat environment)

docker-compose -f docker-compose.$ENV.yml up --detach
