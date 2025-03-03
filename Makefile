up:
	docker-compose up -d --build

down:
	docker-compose down

logs:
	docker-compose logs -f

bash:
	docker exec -it pc-php bash

install:
	docker-compose exec php composer install

diff:
	docker exec -it pc-php bash -c "vendor/bin/doctrine-migrations diff"

migrate:
	docker exec -it pc-php bash -c "vendor/bin/doctrine-migrations migrate"

