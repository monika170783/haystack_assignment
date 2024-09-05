# PHP Assignment - User Management System

This project is a simple user management system built using PHP. It provides functionality for user registration, login, and session-based authentication. The system ensures that users can access protected pages like the dashboard only after logging in.

## Project Structure

```bash
.
├── frontend
│   ├── assets
│   │   └── css
│   │       └── dashboard.css    # CSS styles for the frontend
            └── main.css    # CSS styles for the frontend
│   ├── dashboard.php            # Dashboard page (protected, accessible only after login)
│   ├── register.php             # User registration page
│   ├── login.php                # User login page
│   ├── logout.php               # User logout logic
│   ├── header.php               # Shared header and navigation menu
│   ├── footer.php               # Shared footer content
│   ├── table1.php               # Example page (Table 1)
│   ├── table2.php               # Example page (Table 2)
│   ├── table3.php               # Example page (Table 3)
│   └── table4.php               # Example page (Table 4)
├── backend
│   ├── login.php              # backend for login
│   ├── signup.php             # backend for register
├── database 
│   │   └── mysql.php            # db connection details
└── README.md                    # This README file

##Installation
To get the project up and running, follow these steps:

Clone the repository:

bash
Copy code
git clone https://github.com/monika170783/haystack_assignment.git
Configure your local server:

Ensure you have PHP and MySQL installed (e.g., XAMPP, WAMP, MAMP).
Place the project in the htdocs (or equivalent) directory.
Database Setup:

Used provided MySQL database (db name -  haystack_db).


In the database.php files, update the database connection details (host, username, password, database name).
Run the Application:

Open your browser and access the application by navigating to:
Register: http://localhost/haystack_assignment/frontend/register.php
Login: http://localhost/haystack_assignment/frontend/login.php
Dashboard (Protected): http://localhost/haystack_assignment/frontend/dashboard.php