# Task Management System

A Laravel-based task management system that allows users to create, update, delete, and track tasks with clear status and priority indicators. Designed for reliability, simplicity, and extensibility.

---

## 🚀 Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/avilashsaha035/task-management-system
   cd task-management-system
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Environment setup**
   - Copy `.env.example` to `.env`
   - Make sure your database is configured
     ```bash
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_db_name
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```
   - Generate app key:
     ```bash
     php artisan key:generate
     ```

4. **Run migrations and seeders**
   ```bash
   php artisan migrate --seed
   ```

5. **Start the application**
   ```bash
   php artisan serve
   ```

---

## 🛠 Technologies Used

- **Laravel 10** — backend framework
- **Blade** — templating engine
- **MySQL** — relational database
- **AdminLTE / TailwindCSS** — frontend styling
- **PHPUnit / Pest** — testing framework

---

## 📌 Assumptions & Decisions

- All logged-in users can view all tasks (team transparency).
- Each task has a `created_by` field linking to the user who created it.
- Task statuses: `pending`, `in progress`, `completed`.
- Task priorities: `low`, `medium`, `high`.
- Focused on core CRUD and reliability rather than complex role-based permissions.
- Designed for easy extension (role-based access, task assignment, notifications).

---

## ✅ Testing Approach

- **Feature tests**:
  - Task creation, update, deletion
  - Validation (e.g., required title)
  - Route access (index, create, edit pages)
  - Overdue logic (`is_overdue` accessor)

- **Unit tests**:
  - Business rules (e.g., completed tasks are never overdue)

- **Strategy**:
  - Use `RefreshDatabase` for clean state per test.
  - Factories generate realistic test data.
  - Assertions check both HTTP responses and database state.


Run only task tests:
```bash
php artisan test --filter=TaskTest
```

---

## 📖 Notes

- Dashboard includes summary boxes for **total tasks**, **pending tasks**, **completed tasks**, and **high priority tasks**.
- Future enhancements could include role-based permissions, task assignment, and filtering on dashboard links.

---
