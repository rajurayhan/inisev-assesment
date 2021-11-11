## Clone Using Git
    git clone https://github.com/rajurayhan/inisev-assesment.git

Then Run

    composer install

After Cloning, Configure .env file with Db credentials and maigun smtp credentials.  And then Migrate : 
    php artisan migrate --seed

It will migrate tables and Seed Platform(Website) Data. 
## API Doc

Run following command  
    php artisan scribe:generate
This will generate API Doc at 
http://localhost:8000/docs and the postman collection at http://localhost:8000/docs/collection.json
