PHP CRUD Application with MySQL and Chart.js Visualization
Overview:
This project is a PHP-based CRUD (Create, Read, Update, Delete) application developed to manage products using MySQL as the backend database.
It includes a clean and user-friendly interface built with Bootstrap and a dynamic bar chart using Chart.js to visualize category-wise product data.
This application was created as part of a technical assignment to demonstrate PHP, database handling with PDO, and basic data visualization skills.

Features
Create new products
View products in a table
Update existing product details
Delete products
Category-wise product count visualization using a bar chart
Responsive UI using Bootstrap

Technologies Used
PHP
MySQL
PDO (PHP Data Objects)
HTML, CSS
Bootstrap
JavaScript
Chart.js

Project Structure
crud-app/
│
├── config/
│   └── db.php
│
├── public/
│   ├── assets/
│   │   └── chart.js
│   │
│   ├── index.php
│   ├── create.php
│   ├── update.php
│   ├── delete.php
│   └── chart-data.php
│
├── screenshots/
│   └── (screenshots)
│
└── README.md

Database Structure

Database Name: crud_app
Table Name: products

CREATE DATABASE IF NOT EXISTS crud_app;
USE crud_app;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    category VARCHAR(50) NOT NULL
);

How the Bar Chart Works

The bar chart shows total number of products per category
Categories are normalized to avoid duplicates (case and spacing issues)
Data is fetched from chart-data.php in JSON format
Chart updates automatically when any CRUD operation is performed

Example:
Accessories: 2 products → 1 bar
Office: 1 product → 1 bar
