#!/bin/bash

docker volume create --name=mysql-db
docker volume create --name=storage
docker volume create --name=logs
docker volume create --name=sites-enabled
docker volume create --name=sites-certificates

docker network create back-tier
docker network create front-tier