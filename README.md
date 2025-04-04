# MoneyMind - Personal Budget Management

MoneyMind is a Laravel-based web application designed to help users effectively manage their personal finances. The application offers income tracking, expense management, savings goals, and AI-powered financial suggestions.

## Key Features

### User Features
- **Dashboard Overview**
  - Real-time balance tracking
  - Expense categorization and visualization
  - Monthly spending analysis
  - AI-powered financial advice

- **Expense Management**
  - Track one-time and recurring expenses
  - Categorize expenses
  - Set budget alerts
  - Monitor spending patterns

- **Financial Planning**
  - Set and track savings goals
  - Automated monthly salary credit
  - Budget alerts and notifications
  - AI-powered spending recommendations

### Admin Features
- User management
- Expense category management
- System statistics and analytics
- Account maintenance

## Technical Stack

- **Backend:** PHP 8+, Laravel 12
- **Database:** MySQL
- **Frontend:** Blade templates, TailwindCSS
- **AI Integration:** Google Gemini API
- **Authentication:** Laravel Breeze

## Installation

1. **Clone the repository**
```bash
git clone https://github.com/your-username/MoneyMind.git
cd MoneyMind
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Environment setup**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure database**
- Update `.env` with your database credentials
```bash
php artisan migrate --seed
```

5. **Start development server**
```bash
npm run dev
php artisan serve
```

## Usage Example

1. **User Registration**
   - Register with monthly salary and credit date
   - Set up initial budget preferences

2. **Expense Tracking**
   - Add regular expenses
   - Set up recurring payments
   - Monitor spending by category

3. **Budget Management**
   - Set budget limits
   - Receive overspending alerts
   - Track savings progress

## Security

- CSRF protection
- SQL injection prevention
- Password hashing
- Role-based access control
- Input validation

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Author

Omar FARAJI

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
