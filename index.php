<?php

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
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card w-100 p-2 mx-auto bg-light shadow" style="max-width: 600px">
        <div class="card-header"><h1 class="text-center mb-4 fs-3">PHP registration form:</h1></div>
        <form action="" method="post" novalidate class="p-4">
            <div class="row gx-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Username</label>
                        <input class="form-control" name="username">
                        <small class="form-text text-muted">Min: 6 and max 16 characters</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>
            </div>
            <div class="row gx-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Repeat Password</label>
                        <input type="password" class="form-control" name="password_confirm">
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Your CV link</label>
                <input type="url" class="form-control" name="cv_url" placeholder="https://www.example.com/my-cv">
            </div>
            <div class="form-group mt-4">
                <button class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
