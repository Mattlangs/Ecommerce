<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>

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
                <form action="<?= base_url('include/login') ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="Username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="Password" placeholder="Password" required>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                </form>
                <p class="text-center"><a href="#" onclick="showSignupForm()">Sign Up</a></p>
                <p class="text-center"><a href="#" onclick="showForgotPasswordForm()">Forgot Password?</a></p>
            </div>

            <div id="signup-form" class="hidden">
                <h2 class="text-center">Sign Up</h2>
                <form action="<?= base_url('signup') ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="Username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="Password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="Email" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="Phone" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success" value="Register">
                    </div>
                </form>
                <p class="text-center"><a href="#" onclick="showLoginForm()">Login</a></p>
            </div>

            <div id="forgotpassword-form" class="hidden">
                <h2 class="text-center">Forgot Password</h2>
                <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?php echo implode('<br>', $validation); ?>
                </div>
                <?php endif; ?>
                <form action="<?= base_url('resetpassword') ?>" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control" name="Email" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="NewPassword" placeholder="New Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="ConfirmPassword" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-warning" value="Reset Password">
                    </div>
                </form>
                <p class="text-center"><a href="#" onclick="showLoginForm()">Login</a></p>
            </div>
        </div>
    </div>
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

    function showSignupForm() {
        document.getElementById('login-form').classList.add('hidden');
        document.getElementById('signup-form').classList.remove('hidden');
        document.getElementById('forgotpassword-form').classList.add('hidden');
    }

    function showForgotPasswordForm() {
        document.getElementById('login-form').classList.add('hidden');
        document.getElementById('signup-form').classList.add('hidden');
        document.getElementById('forgotpassword-form').classList.remove('hidden');
    }
</script>
</body>
</html>
