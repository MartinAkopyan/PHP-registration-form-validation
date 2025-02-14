# PHP Registration Form Validation

A simple PHP registration form with server-side validation and Bootstrap styling.  
The project runs in a Docker container with Apache and PHP 8.2.

## 🚀 Features
- Validates username, email, password, and CV URL.
- Uses Bootstrap 5 for styling.
- Runs in a Docker container with Apache.
- Secure input handling (`htmlspecialchars`, `trim`, `stripslashes`).

## 🛠 How to Run  

1. Ensure that **Docker** and **Docker Compose** are installed.  
2. Clone the repository:  
   ```bash
   git clone https://github.com/YOUR_GITHUB/martinakopyan-php-registration-form-validation.git
3. Navigate to the project directory
   ```bash
   cd martinakopyan-php-registration-form-validation
4. Build and start the container:
   ```bash
   docker-compose up --build -d
5. Open the app in your browser:  
   👉 [http://localhost:8000](http://localhost:8000)

