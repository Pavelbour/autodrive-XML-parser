### Deploy
- docker compose up -d
- docker compose exec backend composer install
- docker compose exec backend php artisan migrate

### Run
- docker compose exec backend php artisan parser:parse
- docker compose exec backend php artisan parser:parse file_name