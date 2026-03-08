# Laravel Multi Role Authentication System  
# Sistem Autentikasi Multi Role Laravel

A complete **Multi Role Authentication System built with Laravel** that supports multiple user roles with separate authentication guards, dashboards, and profile management.

Sebuah **sistem autentikasi multi role berbasis Laravel** yang mendukung beberapa jenis pengguna dengan sistem login, dashboard, dan manajemen profil yang terpisah untuk setiap role.

---

# 🚀 Features | Fitur

## English
This project provides a complete authentication system for multiple user roles including:

- Admin Authentication
- Lecturer Authentication
- Student Authentication
- Separate Login and Registration for each role
- Independent Dashboard for each role
- Profile management system
- Profile photo upload support
- User management by admin
- Search and filter users
- Responsive dashboard UI using TailwindCSS
- Toast notification system
- Secure password hashing
- Validation system for all forms

## Bahasa Indonesia

Project ini menyediakan sistem autentikasi lengkap untuk beberapa role pengguna, yaitu:

- Autentikasi Admin
- Autentikasi Dosen (Lecturer)
- Autentikasi Mahasiswa (Student)
- Halaman Login dan Register terpisah untuk setiap role
- Dashboard berbeda untuk setiap role
- Sistem manajemen profil pengguna
- Upload foto profil
- Admin dapat mengelola data pengguna
- Fitur pencarian dan filter pengguna
- Tampilan dashboard responsif menggunakan TailwindCSS
- Sistem notifikasi toast
- Password hashing yang aman
- Validasi form yang lengkap

---

# 🧠 System Architecture | Arsitektur Sistem

## English

This system uses **Laravel Multi Authentication Guards** to separate authentication between different roles.

Each role has its own:

- Model
- Authentication Guard
- Controller
- Dashboard
- Profile Management
- Views

Roles included:

| Role | Description |
|-----|-------------|
| Admin | System administrator who manages users |
| Lecturer | Lecturer or teacher user |
| Student | Student user |

---

## Bahasa Indonesia

Sistem ini menggunakan **Laravel Multi Authentication Guards** untuk memisahkan sistem login antara role yang berbeda.

Setiap role memiliki:

- Model
- Guard autentikasi
- Controller
- Dashboard
- Manajemen profil
- Tampilan (View)

Role yang tersedia:

| Role | Deskripsi |
|-----|-------------|
| Admin | Administrator sistem yang mengelola pengguna |
| Lecturer | Pengguna dosen |
| Student | Pengguna mahasiswa |

---

# 📂 Project Structure | Struktur Project

```
app
├── Models
│ ├── Admin.php
│ ├── Lecturer.php
│ └── Student.php
│
├── Http/Controllers
│ ├── Admin
│ ├── Lecturer
│ └── Student
│
resources/views
├── admin
├── lecturer
└── student
```

Each role has its own authentication controller and dashboard controller.

Setiap role memiliki controller autentikasi dan dashboard masing-masing.

---

# ⚙️ Installation | Instalasi

## 1. Clone Repository

```sh
    git clone https://github.com/faqeeh-qeeh/laravel-multi_role.git
    cd laravel-multi-role-auth
```

---

## 2. Install Dependencies

 ```sh
    composer install
```

---

## 3. Copy Environment File

```sh
    cp .env.example .env
```

---

## 4. Generate Application Key

```sh
    php artisan key:generate
```

---

## 5. Setup Database

Edit the `.env` file.

Ubah konfigurasi database pada file `.env`.

```sh
    DB_DATABASE=your_database
    DB_USERNAME=root
    DB_PASSWORD=
```

---

## 6. Run Migration

 ```sh
    php artisan migrate
 ```

---

## 7. Storage Link

This command is required for profile photo uploads.

Perintah ini diperlukan untuk upload foto profil.

```sh
    php artisan storage:link
```

---

## 8. Run the Application


php artisan serve


Open in browser:


http://127.0.0.1:8000


---

# 🔑 Authentication Routes | Route Login

## Admin

- /admin/login
- /admin/register


## Lecturer

- /lecturer/login
- /lecturer/register


## Student

- /student/login
- /student/register


---

# 👤 User Roles Access | Akses Berdasarkan Role

## Admin

Admin can:

- Manage students
- Manage lecturers
- View dashboard analytics
- Delete users
- View user profiles

Admin dapat:

- Mengelola mahasiswa
- Mengelola dosen
- Melihat statistik dashboard
- Menghapus pengguna
- Melihat profil pengguna

---

## Lecturer

Lecturer can:

- Register account
- Login to lecturer dashboard
- Edit profile
- Upload profile photo

Dosen dapat:

- Mendaftar akun
- Login ke dashboard dosen
- Mengedit profil
- Upload foto profil

---

## Student

Student can:

- Register account
- Login to student dashboard
- Edit profile
- Upload profile photo

Mahasiswa dapat:

- Mendaftar akun
- Login ke dashboard mahasiswa
- Mengedit profil
- Upload foto profil

---

# 🧩 Customization | Modifikasi Sistem

## English

This project can be modified to:

- Add more user roles
- Convert to API authentication
- Integrate with mobile applications
- Add permissions and role hierarchy
- Implement RBAC system
- Add course or learning management features

## Bahasa Indonesia

Project ini dapat dimodifikasi untuk:

- Menambahkan role pengguna baru
- Mengubah sistem menjadi API authentication
- Integrasi dengan aplikasi mobile
- Menambahkan sistem permission
- Menggunakan RBAC (Role Based Access Control)
- Menambahkan fitur sistem pembelajaran

---

# 🔒 Security

This project uses Laravel built-in security features:

- Password hashing
- CSRF protection
- Request validation
- Guard authentication
- Session protection

---

# 🛠 Built With | Teknologi yang Digunakan

- Laravel
- PHP
- MySQL
- TailwindCSS
- AlpineJS
- Blade Template Engine

---

# 📌 Use Cases | Contoh Penggunaan

This system can be used for:

- University portal systems
- Learning management systems
- School management systems
- Multi user dashboard applications
- SaaS authentication templates

Sistem ini dapat digunakan untuk:

- Portal universitas
- Sistem pembelajaran
- Sistem manajemen sekolah
- Dashboard aplikasi multi pengguna
- Template autentikasi SaaS

---

# 📜 License

This project is open-source and free to use for educational and commercial purposes.

Project ini bersifat open-source dan dapat digunakan untuk keperluan pendidikan maupun komersial.

---

# ✨ Author

Developed for developers who need a **ready-to-use Laravel multi-role authentication system**.

Dikembangkan untuk developer yang membutuhkan **template autentikasi multi role Laravel yang siap digunakan**.