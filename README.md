# World Blog
<p align="center">
</p>

---

<li> Welcome to World Blog application, designed  for allowing users to view and comment on blogs and articles while admins can write, edit and delete them. </li>

##  📝Table of content

---
- [Built Using](#built).
- [Features](#features).
- [Requirements](#requirements).
- [Installation Steps](#installation).


## ⛏️ Built Using <a name = "built"></a>

---
- [MySQL](https://www.mongodb.com/) - Database
- [PHP](https://www.php.net/) - Programming Language
- [Laravel](https://laravel.com/) - Web Framework
- [Bootstrap Css](https://getbootstrap.com/) - Css Framework

## 🧐Features <a name = "features"></a>

---
- Login, Registration and logout
- Email verification and Password Reset
- search and filtering articles by title, content and author
- create, edit and delete articles for admins and post creator.
- view and comment on articles by users and admins

## 🔧Requirements <a name = "requirements"></a>

---
- PHP => 8.2
- Laravel => 11
- composer
- MySQL

## 🚀 Installation Steps <a name = "installation"></a>

---

First clone this repository, install the dependencies, and setup your .env file.

```
git clone https://github.com/Grizi7/world-blog.git
composer install
cp .env.example .env
```
add your Database credentials to your .env file and run this command to generate the app key, create and seed the database

```
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
```

run the project using the following command
```
php artisan serve
```

### Admin credentials
- email : grizi@example.com
- password : password




