<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
          <form method='POST' action='registerUser' onsubmit="event.preventDefault(); validateForm();">
            @csrf
            <!-- Name input -->
            <div class="form-outline mb-4">
                <label class="form-label h5" for="form3Example3"></label>
                <input name='name' type="text" id="name" class="form-control form-control-lg"
                placeholder="Name" />
            </div>
            <!-- Email input -->
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-outline mb-4">
                <label class="form-label h5" for="form3Example3"></label>
                <input name='email' type="email" id="email" class="form-control form-control-lg"
                placeholder="Email address" />
            </div>
            
            <!-- Password input -->
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <span class='text-danger' id='passError'></span>
            <div class="form-outline mb-3">
                <label class="form-label h5" for="form3Example4"></label>
                <input name='password' type="password" id="pass1" class="form-control form-control-lg"
                placeholder="Password" />
            </div>
            <div class="form-outline mb-3">
                <label class="form-label h5" for="form3Example4"></label>
                <input  type="password" id="pass2" class="form-control form-control-lg"
                placeholder="Confirm passoword" />
            </div>
  
            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
              </div>
            </div>
  
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="login"
                  class="link-danger">Login</a></p>
            </div>
  
          </form>
        </div>
      </div>
    </div>
 
  </section>
  <script>
    function validateForm(){
        var name = document.querySelector('#name');
        var firstPass = document.querySelector('#pass1');
        var secondPass = document.querySelector('#pass2');
        var passError = document.querySelector('#passError');
        if(firstPass.value!=secondPass.value){
            firstPass.style.borderColor = ' red';
            secondPass.style.borderColor = ' red';
            passError.innerHTML = "Error password !!";
        }
        else {
            document.querySelector('form').submit();
        }
    }
  </script>