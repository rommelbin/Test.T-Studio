DOT_ENV_FILE_PATH := .env
DOT_ENV_EXAMPLE_FILE_PATH := ${DOT_ENV_FILE_PATH}.example

generate-dot-env-file:
	test -f $(DOT_ENV_FILE_PATH) || cp "$(DOT_ENV_EXAMPLE_FILE_PATH)" "$(DOT_ENV_FILE_PATH)"

build:
	docker-compose build

DOCKER_COMPOSER := docker run --rm --interactive --tty --workdir /app --user $(shell id -u):$(shell id -g)
COMPOSER_COMMAND := composer --ignore-platform-reqs
composer-install/main-service: generate-dot-env-file
	${DOCKER_COMPOSER} --volume $(shell pwd):/app ${COMPOSER_COMMAND} install
composer-update/main-service: generate-dot-env-file
	${DOCKER_COMPOSER} --volume ${shell pwd}:/app ${COMPOSER_COMMAND} update

up:
	docker-compose up

up/migrate:
	docker-compose run --rm main-service sh -c "/wait && php artisan migrate --force --seed"

up/migrate:
	docker-compose run --rm main-service sh -c "/wait && php artisan migrate --force --seed"
up/migrate/fresh:
	docker-compose run --rm main-service sh -c "/wait && php artisan migrate:fresh --force --seed"


add/cities:
	docker-compose run --rm main-service sh -c "/wait && php artisan add:cities"

dadata/clean:
	docker-compose run --rm main-service sh -c "/wait && php artisan dadata:clean"

get/directions:
	docker-compose run --rm main-service sh -c "/wait && php artisan get:directions"
