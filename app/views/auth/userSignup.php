<section class="vh-50">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 shadow-lg">
                    <div class="row g-0 d-flex flex-lg-row-reverse">
                        <!-- Right Registration Form (moved with Flexbox) -->
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center">
                                    <h4 class="mt-1 mb-3 text-primary">Register</h4>
                                </div>
                                <form action="<?= $baseUrl ?>/auth/sign-up/check" method="post" id="user-sign-up">
                                    <p class="lead">Please create an account to get started</p>
                                    <!-- Error message display -->
                                    <div class="" role="alert" id="message">
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-4 col-12">
                                            <div class="">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" name="username"
                                                        id="username" value="Jean">
                                                    <label for="username">Username</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <div class="">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" name="real_name"
                                                        id="real_name" value="RABESON Jean Paul">
                                                    <label for="real_name">Real_name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        value="jean@gmail.com">
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="">
                                                <div class="form-floating">
                                                    <input type="password" class="form-control" name="pwd" id="pwd"
                                                        value="12345">
                                                    <label for="pwd">Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating">
                                            <input type="number" class="form-control" name="numero" id="numero"
                                                value="0381234567">
                                            <label for="numero">Numero</label>
                                        </div>
                                        <div class="text-center pt-1">
                                            <button class="btn btn-primary btn-block">
                                                Register
                                            </button>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <p class="mb-0 me-2">Already have an account?</p>
                                            <a href="<?= $baseUrl ?>/auth" class="btn btn-outline-primary">Login</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Left Gradient Section (moved here using Flexbox) -->
                        <div class="col-lg-6 d-flex align-items-center bg-secondary text-white">
                            <div class="px-3 py-4 p-md-5 mx-md-4 text-center">
                                <h4 class="mb-4 fs-2 fw-bold lh-sm">Welcome!</h4>
                                <p class="mb-0 fs-5 text-opacity-75">
                                    Discover a new world behind the joy of farming!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>