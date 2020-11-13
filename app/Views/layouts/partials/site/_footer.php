<!-- Footer -->
<footer class="bg-dark text-white mt-3">
        <!-- container -->
        <div class="container py-4">
            <!-- row -->
            <div class="row py-5">
                <!-- 3 columns -->
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="text-uppercase">Customer services</h6>
                    <ul class="list-unstyled">
                        <li><a class="footer-link" href="#">Help &amp; Contact Us</a></li>
                        <li><a class="footer-link" href="#">Returns &amp; Refunds</a></li>
                        <li><a class="footer-link" href="#">Online Stores</a></li>
                        <li><a class="footer-link" href="#">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="text-uppercase">Company</h6>
                    <ul class="list-unstyled">
                        <li><a class="footer-link" href="#">What We Do</a></li>
                        <li><a class="footer-link" href="#">Available Services</a></li>
                        <li><a class="footer-link" href="#">Latest Posts</a></li>
                        <li><a class="footer-link" href="#">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="text-uppercase">Social media</h6>
                    <ul class="list-unstyled footer-socials social-icon">
                        <li><a class="footer-link twitter" href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a class="footer-link facebook" href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a class="footer-link instagram" href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a class="footer-link google-plus" href="#"><i class="fab fa-google-plus"></i> Google</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-top pt-4">
                <!-- 2 columns -->
                <div class="row">
                    <div class="col-lg-6">
                        <p class="small text-muted mb-0">&copy; 2020 All rights reserved.</p>
                    </div>
                    <div class="col-lg-6 text-lg-right">
                        <p class="text-white reset-anchor">Template designed by <a href="#">My Temple</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <div id="login" class="modal">
        <div class="dialog">
          <a href="#close" title="Close" class="close">X</a>
          <form class="text-center border border-light p-5 m-auto" action="#!">
      
              <h4 class="h4 mb-4">Sign in</h4>
      
              <!-- Email -->
              <input type="email" class="form-control mb-4" placeholder="E-mail">
      
              <!-- Password -->
              <input type="password" class="form-control mb-4" placeholder="Password">
      
              <div class="d-flex justify-content-around">
                  <div>
                      <!-- Remember me -->
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="formRemember">
                          <label class="custom-control-label" for="formRemember">Remember me</label>
                      </div>
                      <p class="my-1">
                          <!-- Forgot password -->
                          <a href="forgot.html">Forgot password?</a>
                      </p>
                  </div>
      
              </div>
      
              <!-- Sign in button -->
              <button class="btn btn-dark btn-block my-4" type="submit">Sign in</button>
      
              <!-- Register -->
              <p>Not a member?
                  <a href="#register">Register</a>
              </p>
      
      
          </form>
          </div>
    </div>

    <div id="register" class="modal">
        <div class="dialog">
          <a href="#close" title="Close" class="close">X</a>
          <!-- form register -->
          <form class="text-center border border-light p-5 m-auto" action="#!">

            <h4 class="h4 mb-4">Sign up</h4>

            <div class="row mb-4">
                <div class="col-6 mx-0">
                    <!-- First name -->
                    <input type="text" class="form-control" placeholder="First name" autofocus>
                </div>
                <div class="col-6 mx-0">
                    <!-- Last name -->
                    <input type="text" class="form-control" placeholder="Last name">
                </div>
            </div>

            <!-- E-mail -->
            <input type="email" class="form-control mb-4" placeholder="E-mail">

            <!-- Password -->
            <input type="password" class="form-control" placeholder="Password">
            <small class="form-text text-muted mb-4">
                At least 8 characters and 1 digit
            </small>
            <input type="password" class="form-control" placeholder="Confirm Password">
            <small class="form-text text-muted mb-4">
                Retype password again
            </small>

            <!-- Phone number -->
            <input type="tel" class="form-control" placeholder="Phone number">
            <small class="form-text text-muted mb-4">
                Optional - for two step authentication
            </small>

            <!-- Newsletter -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="registerFormNewsletter">
                <label class="custom-control-label" for="registerFormNewsletter">Subscribe to our
                    newsletter</label>
            </div>

            <!-- Sign up button -->
            <button class="btn btn-dark my-4 btn-block" type="submit">Register</button>
            <hr>
            <!-- Terms of service -->
            <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a>
            </p>
            <!-- Sign in -->
            <p>Already a member?
                <a href="#login">Sign in</a>
            </p>
        </form>
        <!-- Default form register -->
          </div>
    </div>