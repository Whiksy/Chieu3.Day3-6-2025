<?php include 'app/views/shares/header.php'; ?>

<section class="vh-100 bg-gradient">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body p-5 text-center">
                        <h2 class="fw-bold mb-4 text-uppercase text-dark">Login</h2>
                        <p class="text-muted mb-4">Please enter your username and password</p>
                        
                        <form action="/NguyenThaiDuy/account/checklogin" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control form-control-lg" id="username" placeholder="Username" required>
                                <label for="username">Username</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>

                            <p class="small mb-5">
                                <a href="#!" class="text-muted">Forgot password?</a>
                            </p>

                            <button class="btn btn-primary btn-lg w-100" type="submit">Login</button>

                            <div class="d-flex justify-content-center mt-4">
                                <a href="#!" class="text-muted me-3"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-muted mx-3"><i class="fab fa-twitter fa-lg"></i></a>
                                <a href="#!" class="text-muted ms-3"><i class="fab fa-google fa-lg"></i></a>
                            </div>

                            <div class="mt-3">
                                <p class="mb-0">Don't have an account? <a href="/NguyenThaiDuy/account/register" class="text-primary fw-bold">Sign Up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>
