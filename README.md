# Handicrafts portal
Handicrafts portal built with PHP 7.3.29, MySQL and Bootstrap 5.1.
## Functionality
### Public web page
- Read and print all handicrafts
- Login into an user account
- Create a new user account
### Admin site
- Read user's handicrafts
- Create one handicraft
- Update one user's handicraft
- Delete one user's handicraft
- Logout
## Architecture
MVC architectural design pattern.
## Data Source
MySQL database.

SQL statements to create the database and table along with CRUD queries are provided.
## Installation in XAMPP development environment
1. Install [XAMPP](https://www.apachefriends.org/index.html).
2. Execute XAMPP control panel and Start both Apache and MySQL.
3. Go to phpMyAdmin on localhost and prepare the DDBB and its tables with ddbb.sql file.
4. Clone the repository in htdocs folder inside XAMPP installation folder.
5. Open http://localhost/handicraft-portal/ with a web browser.

## Feasible improvements
1. Use htmlspecialcharacters() function for data coming from the DB.
2. Use msqli_fetch_assoc function instead of fetch rows as arrays.
3. Sanitize the names of uploaded files.
4. Handle errors and validate $_POST data in server side because browsers can deactivate JS and, in turn, client-side validation.
5. Reduce the length of functions references of controllers, e.g., createHandicraft for create.
6. Validate weight_grams in client side so that float numbers are accepted.
7. Validate file extensions of files uploaded by users in server and client sides.
8. A button to delete the image of a handicraft.
9. Filters.
10. Order by functionality.
11. Implement pagination by counting the number of results, using OFFSET and LIMIT in SQL queries, and $_GET from URLs to organize them.
12. Refactor models to use the PDO (PHP Data Objects) interface instead of mysqli to invert dependencies so that the app becomes more easily maintained in case DB changes.
13. Add categories for handicrafts by using a table for categories and another one where rows contain the id of the handicraft and the id of a category. Views must render check boxes.
14. Make a detail view for handicrafts where users get from the home page by clicking a button that is in each handicraft card. When clicking it, the application redirects to an URL like handicrafts/id. This goes to the controller that uses the id parameter to retrieve the handicraft from the DB and renders its data on the corresponding view.
15. Create a config file for environments (development/production) to hide confidential data, such as admin info to login in the DB system, and exclude it from belonging to the repository by using a .gitignore file.
16. UX/UI.
17. Send email to the user when a handicraft has been created.
18. Request email verification for user to finish the signup.
19. Create an user admin page for updating user info.
20. Change the format of the date_created property/field in PHP and DB to get hour, minute and secondDate data.