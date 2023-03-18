# Flights

# installation

## docker install (ubuntu)

https://docs.docker.com/engine/install/ubuntu/

    sudo apt-get remove docker docker-engine docker.io containerd runc

    sudo apt-get update

    sudo apt-get install \
    ca-certificates \
    curl \
    gnupg \
    lsb-release
    
    sudo mkdir -p /etc/apt/keyrings
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg

    echo \
    "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \
    $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
    
    sudo apt-get update
    sudo apt-get install docker-ce docker-ce-cli containerd.io docker-compose-plugin

## Manual installation tasks 

Make environment settings file

    cp .env.example .env

Docker network:

    docker network create flights-network

### if need to rebuild docker

    docker build -t gertum/flights .docker/flights

## running

With user rights

    docker exec -itu 1000:1000 flights bash

With root rights

    docker exec -it flights bash

Change to full access to the cache and logs files 

    chmod 777 -R storage




    

    
