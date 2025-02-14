<?php

const REQUIRED_FIELD_ERROR = 'This field is required.';

$errors = [];
$username = '';
$email = '';
$password = '';
$password_confirm = '';
$cv_url = '';

function post_data($field)
{
    if (!isset($_POST[$field])) {
        return false;
    }
    $data = $_POST[$field];
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = post_data('username');
    $email = post_data('email');
    $password = post_data('password');
    $password_confirm = post_data('password_confirm');
    $cv_url = post_data('cv_url');

    if (!$username) {
        $errors['username'] = REQUIRED_FIELD_ERROR;
        $username = '';
    } elseif (strlen($username) < 6 || strlen($username) > 16) {
        $errors['username'] = 'Username must be between 6-16 characters';
        $username = '';
    }

    if (!$email) {
        $errors['email'] = REQUIRED_FIELD_ERROR;
        $email = '';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'You must provide valid email address';
        $email = '';
    }

    if (empty($password)) {
        $errors['password'] = REQUIRED_FIELD_ERROR;
    } elseif (strlen($password) < 6 || strlen($password) > 16) {
        $errors['password'] = 'Password must be between 6-16 characters';
    }

    if (strcmp($password, $password_confirm) !== 0) {
        $errors['password_confirm'] = 'The password confirmation does not match';
    }

    if (!$cv_url) {
        $errors['cv_url'] = REQUIRED_FIELD_ERROR;
    } elseif (!filter_var($cv_url, FILTER_VALIDATE_URL)) {
        $errors['cv_url'] = 'You must provide a valid URL';
    }

    if (empty($errors)) {
        $validated = true;
        $username = '';
        $email = '';
        $password = '';
        $password_confirm = '';
        $cv_url = '';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>PHP form validation</title>
</head>
<body class="bg-primary bg-gradient">
<?php if ($validated): ?>
<div class="alert alert-success ms-2" role="alert">
    Congratulations! You've provided valid data!
</div>
<?php endif; ?>
<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card w-100 p-2 mx-auto bg-light shadow" style="max-width: 600px">
        <div class="card-header"><h1 class="text-center mb-4 fs-3">Registration form:</h1></div>
        <form action="" method="post" novalidate class="p-4">
            <div class="row gx-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Username</label>
                        <input class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" name="username"
                               value="<?php echo $username ?>">
                        <small class="form-text text-muted">Min: 6 and max 16 characters</small>
                        <div class="invalid-feedback">
                            <?php echo $errors['username'] ?: '' ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                               value="<?php echo $email ?>"
                               name="email">
                        <div class="invalid-feedback">
                            <?php echo $errors['email'] ?: '' ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gx-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                               name="password" value="<?php echo $password ?>">
                        <div class="invalid-feedback">
                            <?php echo $errors['password'] ?: '' ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Repeat Password</label>
                        <input type="password"
                               class="form-control <?= isset($errors['password_confirm']) ? 'is-invalid' : '' ?>"
                               name="password_confirm"
                               value="<?php echo $password_confirm ?>">
                        <div class="invalid-feedback">
                            <?php echo $errors['password_confirm'] ?: '' ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Your CV link</label>
                <input type="url" class="form-control <?php echo isset($errors['cv_url']) ? 'is-invalid' : '' ?>" name="cv_url"
                       value="<?php echo $cv_url ?>" placeholder="https://www.example.com/my-cv">
                <div class="invalid-feedback">
                    <?php echo $errors['cv_url'] ?: '' ?>
                </div>
            </div>
            <div class="form-group mt-4">
                <button class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
