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
                    <?php if (Helper::isGuest()) :?>
                    <li>
                        <a class="" href="#login"><i class="fas fa-user-alt text-gray"></i></a>
                    </li>
                    <?php else :?>
                        <li>
                            <a href="/profile" title="User Profile"><i class="fas fa-address-card"></i></a>
                        </li>
                        <li>
                            <a href="/logout" title="Sign Out"><i class="fas fa-sign-out-alt"></i></a>
                        </li>
                    <?php endif;?>
                </ul>
                
                <label for="hamburger">
                    <i class="nav-toggle fas fa-bars"></i>
                </label>
                
                
            </div>
          </nav>
    </header>