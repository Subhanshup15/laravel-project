composer create-project laravel/laravel companyApp
cd companyApp    
php artisan serve

php artisan make:seeder EmployeeSeeder

php artisan db:seed --class=EmployeeSeeder

php artisan make:controller EmployeeController

php artisan make:view employees/index    

php artisan make:migration add_indexes_to_employees_table --table=employees
