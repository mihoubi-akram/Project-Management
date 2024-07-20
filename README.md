
## Filament Dashboard
This Laravel 11 web application, powered by FilamentPHP 3, includes two panels: an admin panel and a user panel. The admin panel manages users, while the user panel handles projects and tasks.

## Screenshots
**AdminPanel**
![AdminPanelUsers](https://github.com/user-attachments/assets/ec67daa0-ab2b-4532-80b9-42998c6f7d58)
![adminPanel](https://github.com/user-attachments/assets/d7ba56a9-2092-48d1-ad10-f8817d22f42e)
**UserPanel**
![loginuser](https://github.com/user-attachments/assets/d82543e2-1ae8-4c9d-86d5-a67000278d2a)
![UserPanel](https://github.com/user-attachments/assets/65177e2a-2d53-4b3b-8c3f-db4e48f6971b)
![UserPanelProjects](https://github.com/user-attachments/assets/c723d537-6d25-4eb0-bd24-359ff328e588)
![UserPanelTask](https://github.com/user-attachments/assets/57965537-e7cc-4ac0-a192-9b8a9c459266)

## Setup
```bash
git clone <url>
cd <dashboard-app>

composer install
npm install
```

**Rename .env.example to .env and update the database and other settings**
```bash
php artisan migrate:fresh --seed
php artisan serve
```

## Access the Application:
Admin Panel: http://localhost:8000/admin
User Panel: http://localhost:8000

For additional details on FilamentPHP, refer to the FilamentPHP documentation.
