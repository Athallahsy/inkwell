# 📝 Inkwell — A Full-Stack Blog CMS

![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![Tailwind](https://img.shields.io/badge/Tailwind-CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-Build_Tool-646CFF?style=for-the-badge&logo=vite&logoColor=white)

Inkwell is a full-stack Content Management System (CMS) built with Laravel 11, designed for managing and publishing blog articles. It features a public-facing frontend for readers and a secure admin panel for content management.

---

## 🌐 Live Demo

> Coming soon

---

## ✨ Features

### Public Frontend
- 📰 Browse and read published articles
- 🔍 Search articles by title and content
- 🏷️ Filter articles by category
- 📈 Article view counter (session-based, no duplicate counts)
- 📱 Responsive design with Tailwind CSS

### Admin Panel
- 🔐 Authentication (Login, Register, Forgot Password)
- 👥 Role-based access control (**Admin** & **User**)
- 📝 Full article management (Create, Read, Update, Delete)
- 🗂️ Category management
- 👤 User management
- ⚙️ Site configuration (logo, title, footer, social links)
- 📁 Built-in File Manager for media uploads
- 📊 Dashboard with article stats & popular content

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 11 (PHP 8.2+) |
| Frontend | Blade, Bootstrap 5, Tailwind CSS |
| Database | MySQL |
| Build Tool | Vite |
| Auth | Laravel UI |
| File Manager | UniSharp Laravel Filemanager |
| Data Tables | Yajra DataTables (server-side) |
| Image Processing | Intervention Image |

---

## ⚙️ Installation

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & npm
- MySQL

### Steps

**1. Clone the repository**
```bash
git clone https://github.com/your-username/inkwell.git
cd inkwell
```

**2. Install dependencies**
```bash
composer install
npm install
```

**3. Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Configure your database in `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=root
DB_PASSWORD=
```

**5. Run migrations**
```bash
php artisan migrate
```

**6. Create storage symlink**
```bash
php artisan storage:link
```

**7. Run the development server**
```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

**8. Visit the app**
```
http://localhost:8000
```

---

## 🔐 Role & Access

| Feature | Admin | User |
|---|---|---|
| View all articles | ✅ | ✅ |
| Create article | ✅ | ✅ |
| Edit/Delete own article | ✅ | ✅ |
| Edit/Delete any article | ✅ | ❌ |
| Manage categories | ✅ | ❌ |
| Manage users | ✅ | ❌ |
| Site configuration | ✅ | ❌ |

---

## 📁 Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Back/          # Admin panel controllers
│   │   └── Front/         # Public frontend controllers
│   ├── Middleware/        # Auth & role middleware
│   └── Requests/          # Form validation
├── Models/                # Eloquent models
└── Providers/             # View composers (sidebar, config)
```

---

## 📸 Screenshots

> Coming soon

---

## 🙋 Author

Made with ❤️ by **[AThallahsy]**

[![GitHub](https://img.shields.io/badge/GitHub-your--username-181717?style=flat&logo=github)](https://github.com/Athallahsy)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-your--name-0A66C2?style=flat&logo=linkedin)](https://linkedin.com/in/athallahsy)
