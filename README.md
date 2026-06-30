# Student Certificate Portal

A student management system and certificate portal built with PHP and MySQL. Lets an
administrator manage courses and students, and automatically generates PDF
certificates for completed courses.

## Features

- **Student management** — add, update, and manage student records.
- **Course management** — create and organize courses.
- **Automated certificates** — generate PDF certificates with FPDF.
- **Admin login** — simple authentication gate for administrative tasks.
- **Responsive UI** — built with Bootstrap 5.

## Tech Stack

- **Backend**: PHP 8.x
- **Database**: MySQL (PDO)
- **Frontend**: HTML5, CSS3, Bootstrap 5
- **PDF generation**: FPDF

## Project Structure

```
/assets           Images and CSS
/configuraciones  Database connection logic
/librerias        Third-party libraries (FPDF)
/secciones        Business logic and views (students, courses, certificates)
/templates        Reusable header/footer components
index.php         Login page
```

## Setup

### Prerequisites
- XAMPP or any LAMP/WAMP stack.

### Steps
1. Clone the repository and copy it into your web root (e.g. `C:\xampp\htdocs\student-certificate-portal`).
2. Create a database named `aplicacion` and run:
   ```sql
   CREATE TABLE `cursos` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `nombre_curso` varchar(255) NOT NULL,
     PRIMARY KEY (`id`)
   );

   CREATE TABLE `alumnos` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `nombre` varchar(255) NOT NULL,
     `apellidos` varchar(255) NOT NULL,
     PRIMARY KEY (`id`)
   );

   CREATE TABLE `alumnos_cursos` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `idalumno` int(11) NOT NULL,
     `idcurso` int(11) NOT NULL,
     PRIMARY KEY (`id`)
   );
   ```
3. Check `configuraciones/bd.php` and match the credentials to your local MySQL setup.
4. Open `http://localhost/student-certificate-portal/` in your browser.

> **Demo login**: the login check in `index.php` is hardcoded to `admin` / `123456`
> for grading/demo purposes — this is an academic project, not a production system.
> Replace it with real authentication (hashed passwords, a `users` table) before
> using this code as a base for anything beyond the classroom.

## Author

**Alejandro Oviedo**
