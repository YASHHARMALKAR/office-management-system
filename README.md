# 🏢 Office Management System

A simple Office Management System built using **Laravel, MySQL, and Tailwind CSS**.
This project demonstrates CRUD operations, relationships, and dynamic UI features.

##  Features

###  Company Management

* Add Company
* View Company List
* Edit Company
* Delete Company

###  Employee Management

* Add Employee
* View Employee List
* Edit Employee
* Delete Employee

###  Relationships

* Each Employee belongs to a Company
* Employee can have a Manager (Self-referencing relationship)

### UI Features

* Tailwind CSS for modern UI
* DataTables for:

  * Search 🔍
  * Pagination 📄
  * Sorting ⬆️⬇️

---

## Tech Stack

* **Frontend:** HTML, Tailwind CSS
* **Backend:** Laravel (PHP)
* **Database:** MySQL
* **Libraries:** jQuery DataTables

---

Project Structure

* `app/Models` → Eloquent Models
* `app/Http/Controllers` → Controllers
* `resources/views` → Blade Templates
* `routes/web.php` → Application Routes

---

Installation Steps

1. Clone the repository:

```bash
git clone https://github.com/your-username/office-management-system.git
```

2. Navigate to project folder:

```bash
cd office-management-system
```

3. Install dependencies:

```bash
composer install
```

4. Create `.env` file:

```bash
cp .env.example .env
```

5. Configure database in `.env`:

```env
DB_DATABASE=your_db_name
DB_USERNAME=root
DB_PASSWORD=
```

6. Generate application key:

```bash
php artisan key:generate
```

7. Run migrations:

```bash
php artisan migrate
```

8. Start server:

```bash
php artisan serve




* Home Page → `/`
* Companies → `/companies`
* Employees → `/employees`



* Laravel Resource Controllers
* Eloquent Relationships (belongsTo, self-referencing)
* Blade Templating
* Form Validation
* DataTables Integration



* Country/State/City API integration is optional and may require an API key.
* For simplicity, static dropdowns can be used.

Developed by Yash Harmalkar

This project is designed to demonstrate practical Laravel skills including:

* CRUD operations
* Database relationships
* Clean UI design
* Real-world application structure
