<!-- HERO SECTION-->
<section class="hero pb-3 d-flex align-items-center">
    <article class="container slider">
        <div class="slides">
            <div class="overflow">
                <div class="items">
                    <article class="slide"><img src="/assets/images/slider/1.jpg">

                    </article>
                    <article class="slide"><img src="/assets/images/slider/2.jpg">
                        <div class="row px-4 px-lg-5">
                            <div class="slide2 col-lg-6">
                                <p class="text-muted small text-uppercase mb-2">New Inspiration 2020</p>
                                <h1 class="h2 text-uppercase mb-3">20% off on new season</h1>
                                <a class="btn btn-browse" href="shop.html">
                                    <span>Browse collections</span>
                                </a>
                            </div>
                        </div>
                    </article>
                    <article class="slide"><img src="/assets/images/slider/3.jpg"></article>
                    <article class="slide"><img src="/assets/images/slider/4.jpg">
                        <div class="row px-4 px-lg-5">
                            <div class="slide2 col-lg-6">
                                <p class="text-muted small text-uppercase mb-2">New Inspiration 2020</p>
                                <h1 class="h2 text-uppercase mb-3">20% off on new season</h1>
                                <a class="btn btn-browse" href="shop.html">
                                    <span>Browse collections</span>
                                </a>
                            </div>
                        </div>
                    </article>
                    <article class="slide"><img src="/assets/images/slider/5.jpg"></article>

                </div>
            </div>
        </div>
    </article>
</section>

<!--  -->
<section class="pt-5 collections">
    
    <header class="text-center">
        <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
        <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
    </header>
    <div class="over-row">
        <div class="categories row__inner">

        </div>
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

<script type="module">

import {CreateSlider,autoInit }from "https://cdn.skypack.dev/butter-slider@v1.1.1";

const bar = document.querySelector(".bar");

autoInit();

const mySlider = new CreateSlider({
  container: ".categories-slider",
  slider: ".categories-slides",
  getScrollPercent: e => {
    bar.style.width = `${e}%`;
  },
  dragSpeed: 1.5,
  smoothAmount: 0.2,
  hasTouchEvent: true 
});

</script>