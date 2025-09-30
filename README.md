# Learning Management System (LMS)

A comprehensive Learning Management System built with Laravel, designed for educational institutions to manage courses, assignments, and student-teacher interactions.

## Features

- **User Authentication** - Separate login for teachers and students
- **Subject Management** - Create and manage academic subjects
- **Task Assignment** - Teachers can create and assign tasks to students
- **Solution Submission** - Students can submit solutions for assigned tasks
- **Grading System** - Teachers can evaluate and grade student submissions
- **Dashboard** - Role-based dashboards for teachers and students

## Tech Stack

- **Backend**: Laravel 11
- **Frontend**: Blade Templates with Tailwind CSS
- **Database**: SQLite (development)
- **Authentication**: Laravel Breeze

## Installation

1. Clone the repository:
```bash
git clone https://github.com/Achi-199/Learning-Management-System.git
cd Learning-Management-System
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Copy environment file:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Run migrations and seed database:
```bash
php artisan migrate --seed
```

6. Build assets:
```bash
npm run build
```

7. Start the development server:
```bash
php artisan serve
```

## Usage

- Access the application at `http://localhost:8000`
- Register as a teacher or student
- teacher1 - teacher1@example.com , password123
- teacher2 - teacher2@example.com , password123
- Teachers can create subjects and assign tasks
- Students can view assigned tasks and submit solutions
- Teachers can grade student submissions

## Contributing

Feel free to submit issues and enhancement requests!

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
