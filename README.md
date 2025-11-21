# COINKY - Digital Banking System

## Description

COINKY is a web banking application developed in PHP that allows users to manage multiple financial accounts (Main, Savings, and Reserve) with transfer functionalities, balance visualization, and transaction history.
**This project was developed as part of a university course assignment.**
## Main Features

### User Management
- New customer registration with unique email validation
- Login/logout system with secure authentication
- User profile with ability to modify personal data
- Password change with security verification
- Upload and change profile photo

### Financial Management
- Three account types:
  - Main Account - For daily transactions
  - Savings - For long-term goals
  - Reserve - For emergencies
- Inter-account transfers with intuitive interface
- Real-time balance visualization
- Complete transaction history per account
- Balance evolution charts (Chart.js)

### Dashboard and Reports
- Main dashboard with circular balance visualization
- Interactive charts for trend analysis
- Detailed history of all operations
- Currency converter (additional functionality)

### Administration
- Administrative panel for customer management
- List of all registered customers
- Account activation/deactivation
- System transaction management

## Technologies Used

- **Backend:** PHP 7.4+
- **Database:** MySQL
- **Frontend:** HTML5, CSS3, JavaScript
- **Libraries:**
  - jQuery
  - Chart.js (for charts)
  - Circle Progress (for circular visualization)
  - FontAwesome (icons)
- **Architecture:** MVC (Model-View-Controller)
- **Autoloader:** Composer

## Project Structure

```
14-Luis_rosa_1/
├── config.php                 # Application configuration
├── composer.json              # Project dependencies
├── core/                      # Application core
│   ├── classes/              # Main classes
│   │   ├── Database.php      # Database management
│   │   ├── Store.php         # Helper functions
│   │   └── functions.php     # Utility functions
│   ├── controllers/          # MVC Controllers
│   │   ├── Main.php         # Main controller
│   │   ├── Admin.php        # Administrative controller
│   │   └── Loja.php         # Store controller
│   ├── models/              # Data models
│   │   ├── Clientes.php     # Customer model
│   │   ├── AdminModel.php   # Administrative model
│   │   └── alunos.php       # Student model
│   ├── views/               # Application views
│   │   ├── layouts/         # Base layouts
│   │   ├── principal.php    # Main dashboard
│   │   ├── transfer.php     # Transfer page
│   │   └── ...              # Other pages
│   ├── rotas.php            # Routing system
│   └── rotas_admin.php      # Administrative routes
├── public/                   # Public files
│   ├── index.php            # Entry point
│   ├── assets/              # CSS, JS, images
│   └── admin/               # Administrative panel
└── vendor/                   # Composer dependencies
```

## Database

### Main Tables:
- **`clientes`** - User information
- **`saldo`** - Balances of the three accounts per customer
- **`movimentos`** - History of all transactions
- **`admins`** - Administrative users
- **`alunos`** - Student registration system

## Installation and Configuration

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- Composer

### Installation Steps

1. **Clone the repository:**
   ```bash
   git clone [REPOSITORY_URL]
   cd 14-Luis_rosa_1
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Configure the database:**
   - Edit the `config.php` file
   - Update database credentials:
   ```php
   define('MYSQL_SERVER', 'your_server');
   define('MYSQL_DATABASE', 'your_database');
   define('MYSQL_USER', 'your_user');
   define('MYSQL_PASS', 'your_password');
   ```

4. **Configure the web server:**
   - Point document root to the `public/` folder
   - Configure friendly URLs if necessary

5. **Import database structure:**
   - Execute necessary SQL scripts to create tables

## How to Run

1. **Start the web server**
2. **Access the application:**
   - Main URL: `http://localhost/`
   - Admin panel: `http://localhost/admin/`

## Usage

### For Users:
1. **Register** as a new customer
2. **Login** with your credentials
3. **View balances** on the main dashboard
4. **Execute transfers** between accounts
5. **Check transaction history**

### For Administrators:
1. **Access the administrative panel**
2. **View the list** of all customers
3. **Manage accounts** (activate/deactivate)
4. **Monitor system transactions**

## Security

- **Password encryption** with `password_hash()`
- **SQL Injection protection** with prepared statements
- **Session validation** for page access
- **Permission verification** for administrative areas

## Interface

- **Responsive design** for different devices
- **Modern interface** with gradients and animations
- **Intuitive visualization** of balances with circular charts
- **Interactive sliders** for transfers
- **Visual feedback** for all actions

## Special Features

- **Dynamic transfer system** with balance validation
- **Real-time charts** of financial evolution
- **Currency converter interface**
- **Student registration system** (additional functionality)
- **File management** for photo uploads

## Developer

**Luis Rosa**  
Email: luis.rosa17@hotmail.com  
Project developed for academic purposes (PAP2022)

## License

This project was developed for educational and academic purposes.

---

*COINKY - Managing your money intelligently*

---

**README generated by Claude 3.7 Sonnet**
