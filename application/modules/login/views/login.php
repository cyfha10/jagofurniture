<div class="authentication-bg min-vh-100">
    <div class="bg-overlay bg-light"></div>
    <div class="container">
        <div class="d-flex flex-column min-vh-100 px-3 pt-4">
            <div class="row justify-content-center my-auto">
                <div class="col-md-8 col-lg-6 col-xl-5">

                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5><?= $title; ?></h5>
                            </div>
                            <div class="p-2 mt-4">
                                <!-- Form login dengan action ke method do_login -->
                                <form action="<?= site_url('login/do_login'); ?>" method="POST">

                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <div class="position-relative input-custom-icon">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                                            <span class="bx bx-user"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password-input">Password</label>
                                        <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                            <span class="bx bx-lock-alt"></span>
                                            <input type="password" class="form-control" id="password-input" name="password" placeholder="Enter password">
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Don't Have an Account? <a href="register" class="fw-medium text-primary">Register</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->
            </div><!-- end row -->

        </div>
    </div><!-- end container -->
</div>