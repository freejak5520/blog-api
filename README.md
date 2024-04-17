# Blog API

Laravel을 사용하여 블로그 Rest API를 구현합니다.

## Install

### Copy .env

```shell
cp .env.example .env
```

`.env` 파일을 수정하여 DB 연결을 설정합니다.

```shell
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_api
DB_USERNAME=root
DB_PASSWORD=
# FORWARD_DB_PORT=3306 # 개발환경 DB 포트 변경
```

### 의존성 설치

```shell
composer install
```

### Generate key

```shell
php artisan key:generate # Create app key
php artisan jwt:secret # Create JWT key
```

### 데이터베이스 마이그레이션

마이그레이션을 실행하여 데이터베이스 스키마를 생성합니다.

```shell
php artisan migrate
```

## l5-swagger

Swagger API 문서 생성

```shell
php artisan l5-swagger:generate
```

문서 생성 이후 `/api/documentation` 주소를 통해 API 문서에 접근할 수 있습니다.

## 개발 환경

### Docker compose

Docker compose를 사용하여 개발환경을 설정할 수 있습니다.

아래 명령어로 개발에 필요한 MySQL, Redis 컨테이너를 실행할 수 있습니다.

```shell
docker-compose up
# or
docker-compose up -d # 백그라운드 실행
```

`.env` 파일의 `FORWARD_DB_PORT`, `FORWARD_REDIS_PORT`를 수정하여 포트를 변경할 수 있습니다.

```shell
FORWARD_DB_PORT=33066
FORWARD_REDIS_PORT=63799
```

### ide-helper

[`barryvdh/laravel-ide-helper`](https://github.com/barryvdh/laravel-ide-helper)
Laravel 프로젝트에서 IDE 자동완성 기능을 향상시키기 위한 패키지 입니다.

```shell
php artisan ide-helper:eloquent # \Eloquent\Model에 \Eloquent 헬퍼 추가
php artisan ide-helper:generate # 새 IDE Helper 파일 생성
php artisan ide-helper:meta # PhpStorm을 위한 메타데이터 생성
php artisan ide-helper:models # 모델에 대한 자동완성 생성
```
