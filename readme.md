# Project PSIBW

This repository contains the project for PSIBW (Simple Web-Based LMS).

## Project Overview

Create a simple web-based LMS using PHP API and MySQL. The application should have a sidebar navigation and support different user roles.

## Requirements

- **Frontend**: HTML
- **Backend**: PHP + MySQL
- Use pop-ups and notifications for actions like adding, deleting data, login, etc.

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