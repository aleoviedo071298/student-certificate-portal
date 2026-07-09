# Student Certificate Portal

> PHP + MySQL student management system with automated PDF certificate generation via FPDF.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)

## About

A student management portal where an administrator can manage courses, register students, assign them to courses, and automatically generate PDF certificates for completed courses using the FPDF library. Built with PHP 8.x, PDO, and Bootstrap 5.

## Features

- **Student management** — add, update, and manage student records.
- **Course management** — create and organize courses.
- **Automated certificates** — generate downloadable PDF certificates with FPDF.
- **Admin login** — authentication gate for all administrative actions.
- **Responsive UI** — built with Bootstrap 5.

## Project Structure

```
student-certificate-portal/
├── index.php              Login page
├── /assets                Images and CSS
├── /configuraciones       Database connection (bd.php)
├── /librerias             Third-party libraries (FPDF)
├── /secciones             Business logic and views (students, courses, certificates)
└── /templates             Reusable header/footer components
```

## Setup

**Requirements:** PHP 8.x, MySQL, Apache (XAMPP/Laragon).

```bash
git clone https://github.com/aleoviedo071298/student-certificate-portal.git
```

1. Create a database named `aplicacion` and run:
   ```sql
   CREATE TABLE `cursos` (`id` int AUTO_INCREMENT PRIMARY KEY, `nombre_curso` varchar(255) NOT NULL);
   CREATE TABLE `alumnos` (`id` int AUTO_INCREMENT PRIMARY KEY, `nombre` varchar(255) NOT NULL, `apellidos` varchar(255) NOT NULL);
   CREATE TABLE `alumnos_cursos` (`id` int AUTO_INCREMENT PRIMARY KEY, `idalumno` int NOT NULL, `idcurso` int NOT NULL);
   ```
2. Set your local credentials in `configuraciones/bd.php`.
3. Open `http://localhost/student-certificate-portal/`.

> **Demo login:** `admin` / `123456` — hardcoded for academic evaluation only. Replace with hashed passwords and a `users` table before using this as a production base.

---

**Alejandro Oviedo** · [LinkedIn](https://www.linkedin.com/in/aleoviedo071298/) · [GitHub](https://github.com/aleoviedo071298)
