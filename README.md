Student Data Form
This project consists of a student data form with a login and signup system. The system is built with PHP and uses a MySQL database to store user and student data.

Files
login.php: This is the login page. It contains an HTML form where users enter their login details. These details should match the ones they used during signup.

login_process.php: This file authenticates and processes the input from login.php. It checks and fetches data from the existing database that was created during signup. If the entered details match the ones in the database, the user is authenticated.

signup.php: This is the signup page. It contains a signup form where users can register to be able to login to the student page.

signup_process.php: This file processes the signup form. It checks for any errors in the form and, if there are none, it stores the user's details in a SQL database called users.

adminpage.php: This is the admin page. Admins can enter and delete any unwanted input from the studentpage.php here.

studentpage.php: This is the student page. It contains a form where students can enter their details.

studentpage_process.php: This file processes the student form from studentpage.php. It stores the entered details in a database called students.

Usage
To use this system, first sign up on the signup.php page. After signing up, you can log in on the login.php page. Once logged in, you can enter your student details on the studentpage.php page. If you're an admin, you can manage student data on the adminpage.php page.

Security Features
Cross-Site Scripting (XSS) Protection: All output is properly escaped to prevent XSS attacks. Additionally, a Content Security Policy (CSP) header is used to restrict the sources of scripts and other resources, further mitigating the risk of XSS.

Cross-Site Request Forgery (CSRF) Protection: All forms include a CSRF token to prevent CSRF attacks. This token is checked on the server side before any changes are made.

Input Validation: All user input is validated using whitelist regex patterns to prevent SQL injection and other forms of input-based attacks.

Session Management: Sessions are terminated after a period of inactivity to protect against session hijacking. Additionally, session IDs are regenerated every time a page is loaded to prevent session fixation attacks.
