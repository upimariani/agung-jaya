<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LOGIN | ADMIN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Login</b>ADMIN</a>
        </div>
        <!-- /.login-logo -->
        <?php
        if ($this->session->userdata('success')) {
        ?>
            <div class="callout callout-success">
                <p><?= $this->session->userdata('success')  ?></p>
            </div>
        <?php
        }
        ?>
        <?php
        if ($this->session->userdata('error')) {
        ?>
            <div class="callout callout-danger">
                <p><?= $this->session->userdata('error')  ?></p>
            </div>
        <?php
        }
        ?>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="<?= base_url('cLogin') ?>" method="post">
                    <?= form_error('username', ' <small class="text-danger">', '</small>') ?>
                    <div class="input-group mb-3">

                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>

                    </div>
                    <?= form_error('password', ' <small class="text-danger">', '</small>') ?>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="social-auth-links text-center mb-3">
                        <button type="submit" class="btn btn-block btn-primary">
                            Login
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('asset/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('asset/AdminLTE/') ?>dist/js/adminlte.min.js"></script>

</body>

</html>