<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="/assets/css/variables.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/flex.css" rel="stylesheet">
    <link href="/assets/css/effect.css" rel="stylesheet">
    <link href="/assets/css/nav.css" rel="stylesheet">
    <link href="/assets/css/form.css" rel="stylesheet">
    <link href="/assets/css/product.css" rel="stylesheet">
</head>
<body>
<div class="overlay"></div>
    <!-- navbar-->
    <header class="bg-white">
        <nav id="nav">
            <div class="nav-center">
                <div class="nav-header">
                    <a class="navbar-brand" href="index.html"><span class="font-weight-bold text-uppercase text-dark logo">Shopaholic</span></a>
                </div>
                <input class="trigger" type="checkbox" id="hamburger">
                <div class="navbar-links effect-brackets">
                    <ul class="navbar-nav">
                        <li>
                            <a href="/" class="nav-link">Home</a>
                        </li>
                        <li>
                            <a href="/shop" class="nav-link">Shop</a>
                        </li>
                        <li>
                            <a href="/blog" class="nav-link">Blog</a>
                        </li>
                        <li>
                            <a href="/contact" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
                
                <ul class="navbar-tool effect-ease">
                    <li>
                        <a class="sidebar-toggle" href="#"><i class="fas fa-dolly-flatbed text-gray"></i><small class="text-gray count-items-in-cart"></small></a>
                    </li>
                    <li>
                        <a class="" href="#"><i class="far fa-heart"></i><small class="text-gray like-me"></small></a>
                    </li>
                    <li>
                        <a class="" href="#login"><i class="fas fa-user-alt text-gray"></i></a>
                    </li>
                </ul>
                
                <label for="hamburger">
                    <i class="nav-toggle fas fa-bars"></i>
                </label>
                
                
            </div>
          </nav>
    </header>

    <!-- aside -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <button class="close-btn"><i class="fas fa-times"></i></button>
            <h5 class="logo">Shopping Cart</h5>
        </div>

        <!-- cart items -->
        <div class="cart-items">
         
        </div>
        <!-- buttons -->
        <div class="cart-footer">
            <h3>your total : $<span class="cart-total">0</span></h3>
            <button class="clear-cart">Clear Cart</button>
        </div>

    </aside>
    <?php if ($_SERVER['REQUEST_URI']=='/'):?>

    <div class="container">
        <!--  -->
        <section class="pt-5 collections">
            <header class="text-center">
                <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
                <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
            </header>
            <div class="row categories">
               
            </div>
        </section>

        <section class="py-5">
            <header>
                <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
                <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
            </header>
            
            <div class="row showcase">
                
            </div>
        </section>

        <!-- SERVICES-->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <div class="d-inline-block">
                            <div class="media align-items-end">
                                <i class="far fa-heart"></i>
                                <div class="media-body text-left ml-3">
                                    <h6 class="text-uppercase mb-1">Free shipping</h6>
                                    <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <div class="d-inline-block">
                            <div class="media align-items-end">
                                <i class="far fa-heart"></i>
                                <div class="media-body text-left ml-3">
                                    <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                                    <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-inline-block">
                            <div class="media align-items-end">
                                <i class="far fa-heart"></i>
                                <div class="media-body text-left ml-3">
                                    <h6 class="text-uppercase mb-1">Festival offer</h6>
                                    <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- NEWSLETTER-->
        <section class="text-center border border-light p-5 my-3">
            <!-- Subscribe -->
            <h2 class="h4 mb-3">Let's be friends!</h2>
            <div class="text-center border border-light p-5">
                <form class="flex-form mb-5">
                    <label for="from">
                    <i class="fas fa-info-circle"></i>
                </label>
                    <input type="email" placeholder="Enter your email address">
                    <input type="submit" value="Subscribe">
                </form>
            </div>
            <p class="mt-3">Join our mailing list. We write rarely, but only the best content.</p>
            <p class="my-3">
                <a href="" target="_blank">See the last newsletter</a>
            </p>
        </section>

    </div>

    <?php elseif($_SERVER['REQUEST_URI']=='/about'):?>
        <h1>About Page</h1>
    <?php elseif($_SERVER['REQUEST_URI']=='/contact'):?>
        <h1>Contact Page</h1>
    <?php elseif($_SERVER['REQUEST_URI']=='/blog'):?>
        <h1>Blog Page</h1>
    <?php else:?>
     <h1>404</h1>
    <?php endif; ?>

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
    
    <script src="/assets/js/app2.js"></script>
    </body>
</html>
