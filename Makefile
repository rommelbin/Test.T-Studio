up:
	docker-compose up
build:
	docker-compose build
up/migrate:
	docker-compose run --rm main-service sh -c "/wait && php artisan migrate --force --seed"
up/migrate/fresh:
	docker-compose run --rm main-service sh -c "/wait && php artisan migrate:fresh --force --seed"
