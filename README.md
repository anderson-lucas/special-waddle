## How to start the project

1. docker-compose up -d
2. docker exec container cp .env.example .env && php artisan key:generate
2. docker exec container php artisan migrate:fresh --seed
3. Ready to go
