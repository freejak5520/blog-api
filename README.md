# Blog Api

Laravel을 사용하여 블로그 Rest API를 구현합니다.

## Install

### Install packages

```shell
composer install
```

### Docker compose

Docker compose를 사용하여 개발환경을 설정할 수 있습니다.

MySQL, Redis

```shell
docker-compose up
```

포트 변경
`.env`의 `FORWARD_SERVICE_PORT`를 수정하여 포트를 변경할 수 있습니다.

```shell
FORWARD_DB_PORT=33066
FORWARD_REDIS_PORT=63799
```

### ide-helper

```shell
php artisan ide-helper:eloquent # Add \Eloquent helper to \Eloquent\Model
php artisan ide-helper:generate # Generate a new IDE Helper file.
php artisan ide-helper:meta # Generate metadata for PhpStorm
php artisan ide-helper:models # Generate autocompletion for models
```
