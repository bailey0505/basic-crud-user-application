# Basic Crud Application with Laravel

## Installation 

- Clone the repository
- Rename example env file to .env and set up your database credentials in the file
- Run php artisan key:generate
- Run php artisan migrate
- Go into dev/db/migrations and run any migrations in there
- Depending on how you want to run this, you could either run php artisan serve or set up a VHOST



## Application usage
- This is set up where you can simply register an account to access the dashboard
- On the dashboard you have a searchable datatable. You can use the add user button on the top right to add a user, filter the users, and remove/edit users


## Where to look for code
- The main controller used for logic: /app/Http/Controllers/EmployeeController.php
- The Model that was created for database table: /app/Models/Employee.php
- Javascript/Jquery Written: public/js/site.js
- Html that was written: /resources/views/dashboard.blade.php