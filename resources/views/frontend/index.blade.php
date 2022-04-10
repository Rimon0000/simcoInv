@extends('frontend.master_frontend')

@section('content')
<main>
  <!--- BANNER -->
  @include('frontend.components.home_page.banner.banner')
  <!--- BANNER -->

  <!--- CATEGORY START -->
  @include('frontend.components.home_page.category.category')
  <!--- CATEGORY END -->

  <!--- PRODUCT -->
  <div class="product-container">
    <div class="my_container">
      <!--- SIDEBAR START-->
      @include('frontend.components.home_page.sidebar.sidebar')
      <!--- SIDEBAR END-->

      <div class="product-box">
        <!--- PRODUCT MINIMAL -->
        @include('frontend.components.home_page.product_minimal.product_minimal')
        <!--- PRODUCT MINIMAL -->

        <!--- PRODUCT FEATURED -->
        @include('frontend.components.home_page.product_featured.product_featured')
        <!--- PRODUCT FEATURED -->

        <!--- PRODUCT GRID -->
        @include('frontend.components.product_grid.product_grid')
        <!--- PRODUCT GRID -->
      </div>
    </div>
  </div>
  <!--- PRODUCT -->

  <!--- TESTIMONIALS, CTA & SERVICE -->
  <div class="my_container">
    <div class="testimonials-box">
      <!--- TESTIMONIALS -->
      <div class="testimonial">
        <h2 class="title">testimonial</h2>

        <div class="testimonial-card">
          <img src="{{ asset('frontend/assets/images/testimonial-1.jpg') }}" alt="alan doe" class="testimonial-banner" width="80" height="80" />

          <p class="testimonial-name">Alan Doe</p>

          <p class="testimonial-title">CEO & Founder Invision</p>

          <img src="{{ asset('frontend/assets/images/icons/quotes.svg') }}" alt="quotation" class="quotation-img" width="26" />

          <p class="testimonial-desc">
            Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor dolor
            sit amet.
          </p>
        </div>
      </div>
      <!--- TESTIMONIALS -->

      <!--- CTA -->
      <div class="cta-container">
        <img src="{{ asset('frontend/assets/images/cta-banner.jpg') }}" alt="summer collection" class="cta-banner" />

        <a href="#" class="cta-content">
          <p class="discount">25% Discount</p>

          <h2 class="cta-title">Summer collection</h2>

          <p class="cta-text">Starting @ $10</p>

          <button class="cta-btn">Shop now</button>
        </a>
      </div>
      <!--- CTA -->

      <!--- SERVICE -->
      <div class="service">
        <h2 class="title">Our Services</h2>
        <div class="service-container">
          <a href="#" class="service-item">
            <div class="service-icon">
              <ion-icon name="boat-outline"></ion-icon>
            </div>

            <div class="service-content">
              <h3 class="service-title">Worldwide Delivery</h3>
              <p class="service-desc">For Order Over $100</p>
            </div>
          </a>

          <a href="#" class="service-item">
            <div class="service-icon">
              <ion-icon name="rocket-outline"></ion-icon>
            </div>

            <div class="service-content">
              <h3 class="service-title">Next Day delivery</h3>
              <p class="service-desc">UK Orders Only</p>
            </div>
          </a>

          <a href="#" class="service-item">
            <div class="service-icon">
              <ion-icon name="call-outline"></ion-icon>
            </div>

            <div class="service-content">
              <h3 class="service-title">Best Online Support</h3>
              <p class="service-desc">Hours: 8AM - 11PM</p>
            </div>
          </a>

          <a href="#" class="service-item">
            <div class="service-icon">
              <ion-icon name="arrow-undo-outline"></ion-icon>
            </div>

            <div class="service-content">
              <h3 class="service-title">Return Policy</h3>
              <p class="service-desc">Easy & Free Return</p>
            </div>
          </a>

          <a href="#" class="service-item">
            <div class="service-icon">
              <ion-icon name="ticket-outline"></ion-icon>
            </div>

            <div class="service-content">
              <h3 class="service-title">30% money back</h3>
              <p class="service-desc">For Order Over $100</p>
            </div>
          </a>
        </div>
      </div>
      <!--- SERVICE -->
    </div>
  </div>
  <!--- TESTIMONIALS, CTA & SERVICE -->


  <!--- BLOG -->
  @include('frontend.components.blog.blog')
  <!--- BLOG -->


</main>
@endsection