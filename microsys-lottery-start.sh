#!/bin/bash

docker service create --name lottery \
    --replicas 1 \
    --replicas-max-per-node 1 \
    --network back-tier \
    --mount type=bind,source=/mnt/apache,target=/etc/apache2 \
    --restart-condition any \
    docker.viraweb123.ir/lottery:6.0.17
    