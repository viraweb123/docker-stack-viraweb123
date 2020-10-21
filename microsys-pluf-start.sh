#!/bin/bash

docker service create --name pluf \
    --replicas 1 \
    --replicas-max-per-node 1 \
    --network back-tier \
    --mount type=bind,source=/mnt/apache,target=/etc/apache2 \
    --mount type=bind,source=/mnt/storage,target=/var/www/storage \
    --restart-condition any \
    docker.viraweb123.ir/pluf:6.0.12
