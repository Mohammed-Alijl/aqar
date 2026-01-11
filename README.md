# 🏠 Aqar - Real Estate Management Platform

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)

## 📖 About The Project
**Aqar** is a comprehensive Real Estate Marketplace developed to bridge the gap between property buyers, renters, and real estate agents. The system features a robust backend to handle property listings, user roles, and advanced search capabilities using **AJAX** for real-time filtering.

## 🚀 Key Features

### 🔹 For Users & Buyers
* **Advanced Search Engine:** Filter properties by location, price range, type, and amenities in real-time (AJAX).
* **Interactive Maps:** Google Maps API integration to view property locations visually.
* **Responsive Design:** Fully optimized interface for mobile and desktop viewing.

### 🔹 For Admins & Agents (Dashboard)
* **Role-Based Access Control (RBAC):** Secure login and distinct permissions for Admins, Agents, and Users.
* **Property Management:** Specialized dashboard to Create, Read, Update, and Delete (CRUD) listings with image uploads.
* **Analytics:** Overview of active listings, user interactions, and inquiries.

## 🛠️ Tech Stack
* **Backend:** PHP (Laravel Framework).
* **Database:** MySQL (Relational Schema).
* **Frontend:** Blade Templates, Bootstrap, JavaScript, jQuery (AJAX).
* **APIs:** Google Maps API.

## 📸 Screenshots
| Home Page | Property Details |
| :---: | :---: |
| ![Home Page](screenshots/home.png) | ![Details](screenshots/details.png) |

| Admin Dashboard | Search Map |
| :---: | :---: |
| ![Dashboard](screenshots/dashboard.png) | ![Map](screenshots/map.png) |

## ⚙️ Installation & Setup

1. **Clone the repository**
     git clone [https://github.com/Mohammed-Alijl/aqar.git](https://github.com/Mohammed-Alijl/aqar.git)
     cd aqar
2. **Install Dependencies**
    composer install
    npm install
3. **Environment Configuration**
    cp .env.example .env
    php artisan key:generate
4. **Database Setup**
  . Create a new database in your MySQL server (e.g., named aqar_db).
  . Open .env file and update your database credentials:
     DB_DATABASE=aqar_db
     DB_USERNAME=root
     DB_PASSWORD=
  . Run migrations and seeders:
     php artisan migrate --seed
5. **Run the Application**
    php artisan serve
