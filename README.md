# laravel-docker-standalone

## Local workspace

### Starting

````bash
docker network create laravel-network

docker volume create --name mariadb_data
docker run -d --name mariadb \
    --env ALLOW_EMPTY_PASSWORD=yes \
    --env MARIADB_USER=bn_myapp \
    --env MARIADB_DATABASE=bitnami_myapp \
    --network laravel-network \
    --volume mariadb_data:/bitnami/mariadb \
    bitnami/mariadb:latest

docker build -t laravel .

docker run -it \
    --name laravel \
    -p 8000:8000 \
    --env DB_HOST=mariadb \
    --env DB_PORT=3306 \
    --env DB_USERNAME=bn_myapp \
    --env DB_DATABASE=bitnami_myapp \
    --network laravel-network \
    --volume ${PWD}/project:/app \
    laravel
````

### Access to app bash

````bash
docker exec -it laravel bash
````

If you like to run simultaneously the app and the bash, you need two terminals; 
or run the app in background with `docker run -d ...` and then run the bash with `docker exec -it laravel bash`.


## Extending the image

1. Create a new `Dockerfile` in your project with `FROM bitnami/laravel:latest`.
2. Run `docker build -t laravel .` to build the new image.
3. Run `docker run ...` replacing bitnami image by just `laravel`.


## Develop

**Q: How to upgrade laravel app on this repository?**

**A:** Just remove `project` folder and re-run `docker run -it ...` again. 
