<!DOCTYPE html>
<html lang="en">
<head>
    <title>AdminLogin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .hidden {
            display: none;
        }
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="center-container">
        <div class="col-5">
            <h2>Login</h2>
            <?php if(session()->getFlashdata('msg')): ?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo base_url(); ?>signin" method="post">
                <div class="form-group mb-3">
                    <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-success btn-block">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
