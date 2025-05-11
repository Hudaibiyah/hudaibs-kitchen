# Hudaib's Kitchen 🍽️

A simple yet stylish food ordering website where users can explore products, view product details, and contact us. Admin can log in to view contact queries.

## 🔥 Features

- ✅ Home, About, Contact, Product, and Product Details pages
- ✅ Contact form with backend storage (MySQL)
- ✅ Admin login to view contact table
- ✅ Bootstrap-based responsive UI
- ✅ PHP & MySQL integration for backend
- ✅ GitHub-hosted project

## 👨‍🍳 Icon

The website is represented by a unique cook icon with **Hudaib** — symbolizing tradition and flavor.

## 💻 Tech Stack

- HTML5, CSS3
- Bootstrap 5
- PHP (for backend)
- MySQL (Database)
- Git & GitHub

## ⚙️ How to Run Locally

1. Clone the repo:
   ```bash
   git clone https://github.com/Hudaibiyah/hudaibs-kitchen.git

---

Move into the project directory:
bash
cd hudaibs-kitchen

Start XAMPP (Apache and MySQL), and place the folder in htdocs.

Open your browser and go to:
http://localhost/hudaibs-kitchen/
![Homepage Screenshot]![home_page_screenshot](https://github.com/user-attachments/assets/fe012cbc-6ba0-4983-9566-5e6ae450524c)
![Contactpage Screenshot]![Contact_page_screenshot](https://github.com/user-attachments/assets/19ce338e-dda9-480b-8e1b-915691ca32fd)
![Product_detailspage Screenshot]![product details page](https://github.com/user-attachments/assets/5b4b438b-ba19-4a4c-bf8f-f8d4228a0f62)


🔐 Admin Login
Email: admin@123
Password: admin

## 📦 Database Setup

This project uses **MariaDB** for handling user registration and contact form submissions.

### 🧑‍💻 Databases Created:
- `user_registration`
- `contact_db`

### 📄 Tables:

### 📄 Tables:

#### 1. `users` table (in `user_registration` database):

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

 contacts table (in contact_db database):
sql
Copy
Edit
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    message TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




Made by Syed Hudaibiah Zafir Alam
Feel free to connect or give feedback!




