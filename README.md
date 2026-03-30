# SLMP Technical Exam

A containerized Laravel API for fetching and managing post data. This project utilizes **Laravel Sail** to manage the Docker environment and includes a custom Artisan command to sync data from an external REST API.

---

## 📥 Clone the Repository

```bash
git clone https://github.com/Viron1121/slmp_technical_exam.git
cd slmp_technical_exam
```

Create a `.env` file and copy the contents from `.env.example`.

---

## ⚙️ Prerequisites

* Install **Docker Desktop**
* Ensure Docker is running

---

## 🚀 Start the Containers

Run the Docker containers:

```bash
docker-compose up -d
```

---

## 🐳 Set Up Laravel Inside the App Container

Access the Laravel app container:

```bash
docker exec -it laravel_app bash
```

You will be redirected to:

```
/var/www/html
```

Then run:

```bash
composer install --ignore-platform-reqs
php artisan key:generate
```

---

## 🗄️ Database Setup

### Access MySQL Container

```bash
docker exec -it laravel_db bash
docker exec -it laravel_db mysql -u root -p
```

**Password:**

```
123
```

### Create Database

```sql
CREATE DATABASE IF NOT EXISTS slmp_db;
```

---

## 🔧 Configure `.env`

Ensure your database credentials match:

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=slmp_db
DB_USERNAME=sail
DB_PASSWORD=123
```

---

## 📦 Run Migrations

Inside the app container (`/var/www/html`):

```bash
php artisan migrate
```

---

## 🔄 Fetch Data from External API

Run the custom Artisan command:

```bash
php artisan fetch:json-data
```

---

## 📬 API Testing (Postman)

### 🔐 Login

* **Method:** POST
* **URL:** `http://localhost:8000/api/login`
* **Headers:**

  ```
  Accept: application/json
  ```
* **Body (raw JSON):**

```json
{
  "email": "Sincere@april.biz",
  "password": "password"
}
```

✅ You should receive a **token** in the response.

---

### 📄 Get Posts

* **Method:** GET
* **URL:** `http://localhost:8000/api/posts`
* **Headers:**

```
Authorization: Bearer YOUR_TOKEN_HERE
Accept: application/json
```

✅ This will return all posts.

---

## 📞 Contact

If you have any questions regarding running the project in a container:

* 📧 Email: [viron3210@gmail.com](mailto:viron3210@gmail.com)
* 📱 Phone: 09754711573

---
