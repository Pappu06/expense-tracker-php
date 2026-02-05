# Expense Tracker Web Application 💰

A full-stack **Expense Tracker Web Application** built using **PHP, MySQL, HTML, CSS, and JavaScript**.  
This application allows users to securely manage their daily expenses with full CRUD functionality.

---

## 🚀 Features

- User Registration & Login (Session-based Authentication)
- Add, Edit, View, and Delete Expenses (CRUD)
- User-wise expense management
- Secure password hashing
- Clean and responsive UI
- Protected routes (unauthorized access blocked)

---

## 🛠️ Tech Stack

| Layer | Technology |
|-----|-----------|
| Frontend | HTML, CSS, JavaScript |
| Backend | PHP |
| Database | MySQL |
| Server | Apache (XAMPP) |
| Version Control | Git & GitHub |

---

## 📂 Project Structure
<img width="333" height="495" alt="image" src="https://github.com/user-attachments/assets/174f8dd4-6533-48c8-9755-fefd0d7352ac" />


---

## ⚙️ Installation & Setup

Follow these steps to run the project locally:

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/your-username/expense-tracker.git
```

2️⃣ Move Project to XAMPP
C:/xampp/htdocs/expense-tracker

3️⃣ Start XAMPP

Start Apache

Start MySQL

🗄️ Database Setup

Open phpMyAdmin

Create a database:
```bash
CREATE DATABASE expense_tracker;
```

Create users table:
```bash
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

Create expenses table:
```bash
CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    amount DECIMAL(10,2),
    category VARCHAR(50),
    expense_date DATE,
    note TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
```
🎯 Use Cases

Track daily personal expenses

Practice full-stack web development

Academic final-year project

Portfolio project for job applications

🧠 Learning Outcomes

Full-stack PHP development

MySQL relational database design

Session handling & authentication

CRUD operations

Secure coding practices

Git & GitHub workflow

📌 Future Enhancements

Expense summary dashboard

Monthly & category-wise analytics

REST API integration

React frontend

Cloud deployment

👨‍💻 Author

Pappu
Final Year B.Tech (Computer Science Engineering)

📄 License

This project is for educational purposes.


---
