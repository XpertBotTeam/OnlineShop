
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
<!-- link to homePage -->
<div style='width:100%;display:flex;justify-content:center;padding:1rem;'>
  <a href="/" style='align'>
    <button class='btn btn-primary'>Back to home page</button>
  </a>
</div>
<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form method='POST' action='checkLogin'>
            @csrf
            @error('loginError')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label h5" for="form3Example3"></label>
                <input name='email' type="email" id="form3Example3" class="form-control form-control-lg"
                placeholder="Email address" />
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
                <label class="form-label h5" for="form3Example4"></label>
                <input name='password' type="password" id="form3Example4" class="form-control form-control-lg"
                placeholder="Password" />
            </div>
            
            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
              </div>
              <a href="forgotPassword" class="text-body">Forgot password?</a>
            </div>

            <div class="form-outline d-flex align-items-center flex-column gap-1 mb-3 text-center">
              <span><strong> Login with:</strong></span>
              <div class='d-flex  justify-content-center'>
                <a href="loginWithGoogle" class="btn border border-danger  p-2 bg-danger text-white text-center me-4" style='border-radius:50%;text-decoration:none'>
                  <i class="fab fa-google" style='font-size:large'></i> 
                </a>
                <a href="loginWithGoogle" class="btn border border-primary p-2 bg-primary text-center text-white  me-4" style='border-radius:50%;text-decoration:none'>
                  <i class="fab fa-facebook"style='font-size:large'></i> 
                </a>
              </div>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register"
                  class="link-danger">Register</a></p>
            </div>
  
          </form>
        </div>
      </div>
    </div>
    <div
      class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
      <!-- Copyright -->
      <div class="text-white mb-3 mb-md-0">
        Copyright © 2020. All rights reserved.
      </div>
      <!-- Copyright -->
  
      <!-- Right -->
      <div>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="#!" class="text-white">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
      <!-- Right -->
    </div>
  </section>