#!/bin/bash

docker service create --name imgx \
    --replicas 1 \
    --replicas-max-per-node 1 \
    --network back-tier \
    --mount type=bind,source=/mnt/storage,target=/var/www/storage \
    --restart-condition any \
    viraweb/imgx:0.1.0
