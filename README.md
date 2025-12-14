🏥 Hospital Management System

A web-based Hospital Management System designed to simplify and automate hospital operations such as patient management, doctor scheduling, appointments, and billing.
Developed using HTML, CSS, JavaScript, PHP, and MySQL.

📌 Features

👨‍⚕️ Doctor Management

🧑‍🤝‍🧑 Patient Registration & Records

📅 Appointment Booking System

🏥 Department Management

💊 Prescription & Treatment Records

💳 Billing & Payment Management

🔐 Secure Login System (Admin / Doctor / Patient)

📊 Dashboard with Reports

🛠️ Technologies Used
Technology	Purpose
HTML5	Structure
CSS3	Styling & Layout
JavaScript	Client-side Validation & Interactivity
PHP	Server-side Logic
MySQL	Database
WAMP / XAMPP	Local Server
GitHub	Version Control
📂 Project Structure
Hospital-Management-System/
│
├── css/
│   └── style.css
├── js/
│   └── script.js
├── php/
│   ├── login.php
│   ├── register.php
│   ├── appointment.php
│   └── config.php
├
├── index.html
├── README.md
└── screenshots/

⚙️ Installation & Setup

Clone the repository

git clone https://github.com/your-username/hospital-management-system.git


Move project to server directory

C:\wamp64\www\
or
htdocs (XAMPP)


Create Database

Open phpMyAdmin

Create database: hospital_db

Import hospital_db.sql

Configure Database
Edit config.php:

$conn = mysqli_connect("localhost","root","","hospital_db");


Run the Project

http://localhost/Hospital-Management-System/

🔑 Login Credentials (Sample)
Role	Username	Password
Admin	admin	admin123
Doctor	doctor	doctor123
Patient	patient	patient123
📸 Screenshots

Add screenshots of:

Admin Login 
![Login Page](\img\Admin_Login.png)

Admin Dashboard
![Admin DashBoard](\img\adminfunctionality.png)

Appointment Page
![Appointement Page](\img\Appointment.png)

And there are many other functionaity like feedback,feedback report,appointement report,
lab_test report,doctor report etc.



🎯 Future Enhancements

Email & SMS Notifications

Online Payment Gateway

Role-based Access Control

Cloud Deployment

API Integration

📚 Learning Outcomes

Full-stack web development

PHP & MySQL database connectivity

CRUD operations

MVC-based coding approach

Git & GitHub usage