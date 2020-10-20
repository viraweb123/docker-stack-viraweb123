#!/bin/bash

docker service create --name lottery \
    --replicas 1 \
    --replicas-max-per-node 1 \
    --network back-tier \
    --restart-condition any \
    docker.viraweb123.ir/lottery:6.0.17
    
