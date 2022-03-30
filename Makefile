#!/bin/bash

DOCKER_BE = docker-php-service
UID = $(shell id -u)

help: ## Show this help message
	@echo 'usage: make [target]'
	@echo
	@echo 'targets:'
	@egrep '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 2 -s ':#'

run: ## Start the containers
	docker network create php-network || true
	docker-compose up -d

stop: ## Stop the containers
	docker-compose stop

down: ## Stop and remove the containers and remove the network created
	docker-compose down
	docker network rm php-network || true

restart: ## Restart the containers
	$(MAKE) stop && $(MAKE) run

build: ## Rebuilds all the containers
	docker-compose build

ssh-be: ## ssh's into the docker-php-service container
	docker exec -it --user ${UID} ${DOCKER_BE} bash
