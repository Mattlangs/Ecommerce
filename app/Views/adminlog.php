<!DOCTYPE html>
<html lang="en">
<head>
    <title>AdminLogin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div id="login-form" class="">
                <h2 class="text-center">Login</h2>
                <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
                <?php endif; ?>
                <form action="<?= base_url('admin') ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="name" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="password" required>
                    </div>
                    <div class="form-group">
                    <input type="email" class="form-control" name="Email" placeholder="Email Address" required>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                </form>
                </div>

                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function showLoginForm() {
        document.getElementById('login-form').classList.remove('hidden');
        document.getElementById('signup-form').classList.add('hidden');
        document.getElementById('forgotpassword-form').classList.add('hidden');
    }
</script>
</body>
</html>