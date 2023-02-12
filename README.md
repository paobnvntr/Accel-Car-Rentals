# Accel Car Rentals
##### DATABASE SETUP:
1. Open XAMMP Control Panel. Start Apache and MySQL
2. Download the accel_db database file in the database-file folder
3. Open [PHPMyAdmin](http://localhost/phpmyadmin/) on your browser
4. Create a database
5. Upload the accel_db database file.
6. Open assets/database/connection.php
7. Update the dbpass, dbname
6. Open cars.php
7. Also update the password, database name

##### INCLUDES
- Header / Navigation Bar
- Footer
   - About Us
   - Contact Information (website link, gmail, location)
   - Quick Links (home, cars, reviews, FAQ)

##### LANDING PAGE
- Home Page
- Cars Page
- Reviews
- Customer Login & Registration
- Admin Login & Registration
- FAQ Page

##### CUSTOMER SIDE
- Home Page
- Cars page
   - list of available cars with details (vehicle (name, type, seat capacity, transmission type, rent price, location))
   - filtering system (sorting, location, type, transmission, capacity)
- Reviews Page
   - reviews of customers
- FAQ Page
- Reservation Page 
   - where users will see and input reservation details (vehicle (name, type, seat capacity, transmission type, rent price, location) rental period, w/ or w/o driver)
- Reservation Confirmation Page
   - details of reservation (reservation number, rent price, total rent amount, reservation date, rental period)
- Reservation Status Page
  - where users can check the status of their reservations (pending, paid, cancelled)
  - proceed to payment
  - option for customers to cancel reservation
- Payment Page
   - details of reservation and card details (card number, expiration date, cvv)
- Bookings Status Page
   - where users can check the status of their bookings (not returned, returned)
- Logout

##### ADMIN SIDE
- Home Page
- Cars Page
   - list of all cars and filtering (can filter with their availability)
   - can add/delete cars in inventory
   - return cars (admin can update the cars returned by customers)
- Reviews Page
- FAQ Page
- Driver Page
   - add and remove driver
   - list of drivers
- Reservations Page
   - display reservation status of customers (pending, paid, cancelled)
- Bookings Page
   - display booking status of customers (returned, not returned)
- Logout
