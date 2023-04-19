<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b></b></a>
            <small>Sistem Informasi Manajemen | Amikom Purwokerto</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="<?= base_url('auth/proses_login') ?>">
                    <div class="msg">Sign in to start your session</div>
                    <center>
                        <img src="assets\images\logo-amikom.png" alt="logo Universitas Amikom Purwokerto" width="100"
                            height="80">
                    </center>

                    <br>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required
                                autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">

                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">LOGIN</button>
                        </div>
                    </div>

                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?= base_url('auth/register'); ?>">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="<?= base_url('auth/forgot_password'); ?>">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>