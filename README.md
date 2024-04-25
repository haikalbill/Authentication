# Authentication

1. First page is the signup.php form.
2. When submitted it will redirected to the signup_process.php then it have button to the login page (login.php)
3. The submit signup form will be stored the input from user to the mysql database
4. Login page then will ask for matric number and password and checked it from the database to allow user to the next page.
5. Finish 

# Authorization
Make major changes because just understand how to do it correctly

1. The signup and login page have same credential that working same as before
2. Adding 2 new tables in auth_project database called students and users
3. users for signup and login where assigning role guest,users and admin
4. Adding 2 new pages for this assignments which are studentpage.php and adminpage.php
5. studentpage.php is where the student details form is and it for the students to add the student details it will input it in the students table in database
6. adminpage.php  is for admin to delete or edit(not yet done) the input from students.
