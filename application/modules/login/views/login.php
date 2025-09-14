<body class="login-body">

    <div class="container">

        <form class="form-signin" action="<?= base_url('login/do_login') ?>" method="POST">

            <h2 class="form-signin-heading">Admin Login</h2>
            <div class="login-wrap">
            		<center><img src="<?php echo base_url('assets/images/logo.png') ?>" width="50%"></center>
            		<br><br>
                <input type="text" class="form-control" name="username" id="username" placeholder="User ID" autofocus>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                
                <button class="btn btn-lg btn-login btn-block" style="background-color: 094c17;" type="submit">Masuk</button>
            </div>

        </form>

    </div>