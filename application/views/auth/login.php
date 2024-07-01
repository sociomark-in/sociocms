<div class="page-content d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="row w-100 mx-0 auth-page justify-content-center align-items-center">
        <div class="col-md-8 col-xl-3 mx-auto">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="auth-form-wrapper px-4 py-4">
                            <div class="">
                                <a href="javascript:void(0)" class="noble-ui-logo d-block mb-2">
                                    <img src="<?= base_url('assets/logo.png') ?>" alt="" width="160">
                                </a>
                                <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                            </div>
                            <?= form_open("api/v2/oauth/sign-in", ["class" => "forms-sample"]) ?>
                            <div class="mb-3">
                                <label for="userEmail" class="form-label">Username/Email address</label>
                                <input name="username" type="email" class="form-control" id="userEmail" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="userPassword" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="userPassword" autocomplete="current-password" placeholder="Password">
                            </div>
                            <input type="hidden" name="referrer" value="<?= is_null($this->input->get_request_header('Referer'))? base_url() : $this->input->get_request_header('Referer') ?>">
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="authCheck">
                                <label class="form-check-label" for="authCheck">
                                    Remember me
                                </label>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Login</button>
                            </div>
                            <!-- <a href="register.html" class="d-block mt-3 text-muted">Not a user? Sign up</a> -->
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>