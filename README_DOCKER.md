docker-compose build kata
docker-compose up -d
docker-compose exec kata ls -l
docker-compose exec kata composer install
docker-compose exec kata composer test