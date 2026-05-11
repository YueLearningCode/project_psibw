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

## Sidebar Menu For Dosen (Lecturer)

1. **Login & Register** — Authentication pages (login with lecturer ID & password, new account registration)
2. **Dashboard** — Overview of teaching activities: courses taught, total students, ungraded assignments, this week's schedule, recent notifications, and lecturer profile summary
3. **Teaching Schedule** — Personal teaching schedule
      - Weekly view: timetable grid by day (Monday–Friday) with time slots
      - List view: daily schedule list with course name, room, duration, and student count
      - Toggle view: Weekly / List
      - Week navigation: left & right arrow buttons
4. **Student Grades** — View and manage student grades (input/edit)
      - Course filter: dropdown to select which course to manage
      - Table: checkbox, no, NIM, student photo, student name, component scores (UTS, UAS, Tugas), final grade, letter grade, actions (edit)
      Inline edit: click edit to input or update scores directly in the row
      - Grade summary: class average, highest, lowest score
      - Buttons: Save Grades, Export to Excel
5. **My Students** — View data of students under the lecturer's courses
      - Table with: checkbox, no, NIM, photo, name, study program, semester, GPA, actions (detail)
      - Search and filter: by course, semester, or study program
      - Detail page: student full profile (photo, name, NIM, email, GPA, attendance rate, grade history)
      - Pagination: 1, 2, 3, etc.
6. **Profile** — Personal profile and account info
      - View and edit: name, NID (NIP), email, phone number, office room, photo
      - Academic info: study program, faculty, position/rank
7. **Change Password** — Account security
      - Form: current password, new password, confirm new password
      - Password strength indicator
8. **Logout** — Sign out, redirect to login page

## Sidebar Menu for Mahasiswa (Student)

1. **Login & Register** — Authentication pages (login with NIM & password, new account registration page)
2. **Dashboard** — Academic information summary: credits taken, GPA, active bills, attendance percentage, today's class schedule, latest grades, and notifications
3. **Class Schedule** — Weekly and daily schedule
   - Weekly view: timetable grid per day (Monday–Friday) with time slots
   - List view: daily schedule list complete with lecturer, room, and duration
   - Toggle view: Weekly / List
   - Week navigation: left & right arrow buttons
4. **Grades & Transcript** — Grade history per semester and academic transcript
   - Semester tabs: Sem 1, Sem 2, Sem 3, Sem 4 (Active), etc.
   - Grade table: Course Code, Course Name, Credits, Letter Grade, Score, Grade Points, Status
   - Summary: cumulative GPA, credits passed, current semester GPA, semesters completed
   - Buttons: Download Transcript, Print Grade Report
5. **Course Registration (KRS)** — Study plan card filling and submission
   - Status banner: approved / pending advisor approval
   - Credits meter: credits taken vs maximum allowed
   - List of registered courses with delete button per item
   - Course catalog: search and add button
   - Buttons: Submit to Advisor, Print KRS
6. **Attendance** — Attendance recap per course
   - Summary card per course: attendance percentage, number of meetings, H/A/S/I badges
   - Detail table per meeting: date, topic, status (Present / Absent / Sick / Excused)
   - Row highlight if absent
   - Button: Download Recap
7. **Tuition & Payment** — UKT status and transaction history
   - Active bill banner with amount and due date
   - Payment history: table with date, description, amount, paid/unpaid status
   - Buttons: Pay Now, Download Receipt
8. **My Profile** — Personal data and profile photo
   - Edit form: name, NIM, email, phone number, address, photo
   - Academic information: study program, year of entry, academic advisor
9. **Change Password** — Account security
   - Form: current password, new password, confirm new password
   - Password strength indicator
10. **Logout** — Sign out, redirect to login page



## Notes

- Implement pop-ups and notifications for data operations (add, delete, login, etc.).
- Based on meeting 14 instructions.