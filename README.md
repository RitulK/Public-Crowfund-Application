# Public Crowdfund 🏦

A Laravel-based crowdfunding platform where users can launch campaigns and contribute to others with secure and transparent tracking. Built with role-based access for admins and campaign owners, the application supports authentication, campaign management, and real-time fundraising progress.

## 🚀 Features

- User Registration & Login
- Role-based Access: Admin, Campaign Owner, General User
- Campaign Creation & Listing
- Campaign Contribution with Live Updates
- Responsive UI with Blade Templates
- Secure Password Hashing and Middleware Protection
- Campaign update, delete
## 🛠️ Tech Stack

- **Framework:** Laravel 10+
- **Database:** MySQL / SQLite
- **Frontend:** Blade, Tailwind CSS


## 📦 Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/public-crowdfund.git
   cd public-crowdfund
   ```
2. **Install dependencies:**
```bash
  composer install
  npm install && npm run dev
  ```

3. **Create .env file and generate app key:**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Set up your database in .env file, then run:**
```bash
php artisan migrate --seed
```
5. **Start the development server:**
```bash
php artisan serve
```

📂 **Seeders Overview**
RolesTableSeeder — Seeds default roles: admin, campaign_owner, user

UsersTableSeeder — Seeds an admin and campaign owner

DatabaseSeeder — Triggers the roles and users seeders

📸 **Screenshots**
![image](https://github.com/user-attachments/assets/5f0abde6-f5ec-41db-9487-630211b2a6de)
![image](https://github.com/user-attachments/assets/8324f9ed-678f-47fe-a735-92462cc0ebc3)
![image](https://github.com/user-attachments/assets/0f5c2c7f-083d-488b-94d3-fc57b808ff4c)
![image](https://github.com/user-attachments/assets/357e0077-d187-4502-b367-e152c98db338)
![image](https://github.com/user-attachments/assets/aef4bb0e-50da-4cae-8493-205e9ed9bc61)
![image](https://github.com/user-attachments/assets/dbf4e5d4-f333-407a-a3a7-77a374094588)

Made with ❤️ using Laravel.
