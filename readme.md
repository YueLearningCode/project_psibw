# Project PSIBW

This repository contains the project for PSIBW (Pengembangan Sistem Informasi Berbasis WEB - Web-Based Information System Development). Specifically, a simple web-based LMS (Learning Management System).

## Project Overview

Create a simple web-based LMS using PHP API and MySQL. The application should have a sidebar navigation and support different user roles.

## Prerequisites

### Tools

- **PHP** (version 8.0 or higher) - For backend scripting
- **MySQL** - For database management
- **Web Server** (Laragon) - To serve the application
- **Composer** (optional) - For PHP dependency management
- **Git** - For version control
- **Text Editor/IDE** (VS Code) - For code editing
- **Browser** (Chrome) - For testing the web interface

### Required Files and Structure

- `api/` - Directory for PHP API endpoints (e.g., `login.php`, `students.php`)
- `public/` - Directory for frontend files (HTML, CSS, JS)
- `config/` - Database configuration files (e.g., `db.php`)
- `sql/` - SQL scripts for database schema and initial data
- `assets/` - Images, CSS, JS libraries (e.g., Tailwind CSS)

## Requirements

- **Frontend**: HTML + CSS (Tailwind CSS) + JavaScript
- **Backend**: PHP + MySQL + JSON (REST API)
- Use pop-ups and notifications for actions like adding, deleting data, login, etc.

## Database Name = project_psibw

## Database Tables 

1. **users** - Handles login roles: USER, DOSEN (Lecturer), MAHASISWA (Student)
   - If logged in as DOSEN, displays MAHASISWA; if as MAHASISWA, displays relevant data.

2. **dosen** - Lecturer table (includes photo)

3. **mahasiswa** - Student table (includes photo)

4. **kuliah** - Course table (id, course name, lecturer, etc.)

## Roles

- DOSEN (Lecturer)
- ADMIN
- MAHASISWA (Student)

## Sidebar Menu

1. **Login & Register** - Authentication pages
2. **Dashboard** - Overview of students, lecturers, new courses, etc. (similar to superadmin dashboard)
3. **Mahasiswa** - Student management
   - Table with: checkbox, no, NIM, photo, ..., actions (detail, edit, delete)
   - "Tambah" (Add) button at top
   - "Hapus Semua Checklist" (Delete All Checked) button at bottom
   - Detail page: student info (photo, name, etc.)
   - Pagination: 1, 2, 3, etc.
4. **Dosen** - Lecturer management
5. **Mata Kuliah** - Course management
6. **Tukar Password** - Change Password
7. **Logout** - Logout

## Notes

- Implement pop-ups and notifications for data operations (add, delete, login, etc.).
- Based on meeting 14 instructions.