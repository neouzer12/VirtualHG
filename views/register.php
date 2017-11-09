<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home!</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/vhg.css">
</head>
<body>
    <?php include_once('./assets/php/layout/01_header.php') ?>
    <style>
        main{
            padding-top: 90px;
        }
    </style>
    <main>
        <div class="container">
            <h1>Register to VirtualHG</h1>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <form action="register" method="POST" class="form">
                        <h4>Account information</h4>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input name="usr" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input name="pwd" type="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input name="confirm_pwd" type="password" class="form-control" required>
                        </div>
                        <h4>Personal information</h4>
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input name="n_f" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Middle Name</label>
                            <input name="m_n" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input name="l_n" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Extension Name</label>
                            <input name="e_n" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Register!</button>
                            <small class="text-muted">We value your privacy. Click <a href="">here</a> for our policy.</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include_once('./assets/php/layout/02_footer.php') ?>