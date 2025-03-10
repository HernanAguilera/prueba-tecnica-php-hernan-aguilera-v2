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
	docker exec -it pc-php bash -c "./doctrine migrate"

migrate-test:
	docker exec -it pc-php bash -c "APP_ENV=testing php doctrine migrate"

run-tests:
	docker exec -it pc-php bash -c "vendor/bin/phpunit"