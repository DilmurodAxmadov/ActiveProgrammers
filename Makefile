du: memory
	docker-compose up -d

dd:
	docker-compose down

db: memory
	docker-compose up --build -d

de:
	docker exec -it crrt-php sh

test:
	docker-compose exec php-cli vendor/bin/phpunit

memory:
	sudo sysctl -w vm.max_map_count=262144
