# Cinema Booking Case Study
A cinema ticket booking system

The below requirements are implemented

● Users should be able to register and log in.
● Users should be logged in to complete a booking, but can view and select
whilst unauthenticated.
● Users should be given a unique booking reference number to use as a
redemption method.
● Users should be able to view their booking specifics after having booked.
● Users should be able to cancel a booking up until one hour before the show
starts.
● Cinema theaters should have a maximum number of 30 seats.
● When booking, a user need only choose a cinema, a film, a show time, and the
number of tickets

Below are the assumptions considered

● Users won’t need to pay. 

This App is built with Laravel 5.5

### Prerequisites

1. ```Composer```
2. ```PHP >= 7.1```
3. ```MySQL```

### Quick start

1. Clone the repository with `git clone https://github.com/mangya/cinema.git <your_project_folder_name>`
2. Change directory to your project folder `cd <your_project_folder_name>`
3. Install the dependencies with `composer install`
4. Create database in MySQL.
5. Update the your database name and credentials in the `.env` file.
6. Set permissions for the folders in Linux
## Permissions
  
```
sudo chown -R :www-data bootstrap/cache
sudo chmod -R ug+rwx bootstrap/cache
sudo chown -R :www-data storage/framework
sudo chmod -R ug+rwx storage/framework
sudo chown -R :www-data storage/logs
sudo chmod -R ug+rwx storage/logs
```
6. Create database tables and sample data with `php artisan migrate:refresh --seed`
7. Run the application with `php artisan serve` (MySQL service should be up and running).
8. Access `http://localhost:8000` and you're ready to go!

Thank you 😊