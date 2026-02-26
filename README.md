# Academy Management System 🎓

A comprehensive student management system and certificate portal built with PHP and MySQL. This system allows administrators to manage courses, students, and automatically generate PDF certificates for completed courses.

## ✨ Features

- 👤 **Student Management**: Add, update, and manage student information.
- 📚 **Course Management**: Create and organize various courses.
- 🎓 **Automated Certificates**: Generate professional PDF certificates using FPDF.
- 🔐 **Secure Access**: Simple login system for administrative tasks.
- 🎨 **Responsive Design**: Modern UI built with Bootstrap 5.
- 📄 **PDF Icon Integration**: Visual indicators for certificate links.

## 🛠️ Technologies Used

- **Back-end**: PHP 8.x
- **Database**: MySQL (PDO for secure connections)
- **Front-end**: HTML5, CSS3, Bootstrap 5
- **PDF Generation**: FPDF Library
- **Icons**: SVG & PNG custom assets

## 🚀 Installation

### Prerequisites
- [XAMPP](https://www.apachefriends.org/index.html) or any LAMP/WAMP stack.
- Composer (optional, for dependencies).

### Steps
1. **Clone the repository**:
   ```bash
   git clone https://github.com/your-username/academy-management-system.git
   ```
2. **Move to web root**:
   Copy the project folder to your `htdocs` directory (e.g., `C:\xampp\htdocs\academy`).
3. **Database Setup**:
   - Open **phpMyAdmin**.
   - Create a new database named `aplicacion`.
   - Run the following SQL to set up the tables:
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
4. **Configuration**:
   - Check `configuraciones/bd.php` to ensure the credentials match your local MySQL setup (default is usually `root` with no password).
5. **Access the App**:
   - Open your browser and navigate to `http://localhost/academy/`.
   - **Login**: Use `admin` / `123456`.

## 📁 Project Structure

- `/assets`: Images and CSS files.
- `/configuraciones`: Database connection logic.
- `/librerias`: Third-party libraries like FPDF.
- `/secciones`: Business logic and views (Alumnos, Cursos, Certificados).
- `/templates`: Reusable header and footer components.
- `index.php`: Login page.

## 🤝 Contributing

Feel free to fork this project and submit pull requests for any features or bug fixes.

---
Developed by Alejandro Oviedo.
