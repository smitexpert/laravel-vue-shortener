# Link Shortener

## _Laravel and Vue_

### How to start?

## Use Docker

```sh
git clone https://github.com/smitexpert/laravel-vue-shortener.git
```

```sh
docker-compose -f docker/docker-compose.yml up -d
```

#### Log inside shortener-app container

```sh
docker exec -it shortner-app sh
```

#### Install composer dependency

```sh
composer install
```

#### Copy ENV file

```sh
copy .env.example .env
```

### Configure Google developer API key

Set `GOOGLE_DEVELOPER_API` variable inside .env file

### Install npm dependancy `RUN CMD inside container`

```sh
npm install
```

### Run Mixin

```sh
npm run production
```

### Your app is live at `localhost:8888`
