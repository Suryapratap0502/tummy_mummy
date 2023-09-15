<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

  <meta charset="utf-8" />
  <title>Sign In | Tummy Mummy - Admin & Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}" />

  <!-- Layout config Js -->
  <script src="{{ asset('assets/js/layout.js')}}"></script>
  <!-- Bootstrap Css -->
  <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- custom Css-->
  <link href="{{ asset('assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />


</head>
<style>
  .hide {
    display: none;
  }
</style>

<body>

  <div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
      <div class="bg-overlay"></div>

      <div class="shape">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
          <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
        </svg>
      </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-center mt-sm-5 mb-4 text-white-50">
              <div>
                <a href="index.php" class="d-inline-block auth-logo">
                  <img src="{{ asset('assets/images/logo_tm.png')}}" alt="" height="120">
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- end row -->

        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

              <div class="card-body p-4">
                <div class="text-center mt-2">
                  <h5 class="text-primary">Welcome Back !</h5>
                  <p class="text-muted">Sign in to continue to Tummy Mummy.</p>
                </div>
                <div class="p-2 mt-4">
                  <form id="login">
                    @csrf()
                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="ri-user-line"></i></span>
                        <input type="text" class="form-control" name="username" id="username" aria-describedby="inputGroupPrepend" placeholder="Enter Username" required>
                      </div>
                      <span id="username_error" class="error"></span>
                    </div>

                    <div class="mb-3">
                      <div class="float-end">
                        <a href="reset-pass.php" class="text-muted">Forgot password?</a>
                      </div>
                      <label for="password" class="form-label">Password</label>
                      <div class="input-group position-relative auth-pass-inputgroup">
                        <span class="input-group-text" id="inputGroupPrepend">
                          <i class="ri-lock-password-line"></i>
                        </span>
                        
                        <input type="password" class="form-control password-input" name="password" id="password" aria-describedby="inputGroupPrepend" placeholder="Enter Password" required>
                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                      </div>
                      <span id="password_error" class="error"></span>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                      <label class="form-check-label" for="auth-remember-check">Remember me</label>
                    </div>
                    <div class="toast-body">
                      <span id="err_resp"></span>
                    </div>
                    <div class="mt-4">
                      <button class="btn btn-primary w-100 show" type="submit">Sign In</button>
                      <button class="btn btn-primary btn-load w-100 hide">
                        <span class="d-flex align-items-center">
                          <span class="flex-grow-1 me-2">
                            Loading...
                          </span>
                          <span class="spinner-border flex-shrink-0" role="status">
                            <span class="visually-hidden">Loading...</span>
                          </span>
                        </span>
                      </button>
                    </div>
                    <!-- Display Position -->
                    
                  

                  </form>
                </div>
              </div>
              <!-- end card body -->
            </div>
            <!-- end card -->
          </div>
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-center">
              <p class="mb-0 text-muted">&copy;
                2023- <script>
                  document.write(new Date().getFullYear())
                </script> Tummy Mummy. Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://maishainfotech.com/" target="_blank">Maisha Infotech Pvt. Ltd.</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- end Footer -->
  </div>
  <!-- end auth-page-wrapper -->

  <!-- JAVASCRIPT -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/admin/login.js')}}"></script>
  <script src="{{ asset('assets/js/pages/form-validation.init.js')}}"></script>
  <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
  <script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>
  <script src="{{ asset('assets/libs/feather-icons/feather.min.js')}}"></script>
  <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
  <script src="{{ asset('assets/js/plugins.js')}}"></script>
  <script src="{{ asset('assets/js/pages/notifications.init.js')}}"></script>
  <!-- particles js -->
  <script src="{{ asset('assets/libs/particles.js/particles.js')}}"></script>
  <!-- particles app js -->
  <script src="{{ asset('assets/js/pages/particles.app.js')}}"></script>
  <!-- password-addon init -->
  <script src="{{ asset('assets/js/pages/password-addon.init.js')}}"></script>
</body>

</html>