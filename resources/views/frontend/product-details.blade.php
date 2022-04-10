@extends('frontend.master_frontend')

@section('content')

<main>
  <!--- PRODUCT -->

  <div class="product-container">
    <div class="container">
      <div class="product-box">
        <!--- PRODUCT FEATURED -->
        <div class="product-featured">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="title text-center">Product Details</h2>
            </div>
          </div>
          <div class="showcase-wrapper">
            <div class="showcase-container">
              <div class="showcase">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="row">
                      <div class="small-container single-product">
                        <div class="main__row">
                          <div class="main__col-2">
                            <img id="ProductImg" src="{{ asset('frontend/assets/images/products/gallery-1.jpg') }}" alt="" width="100%" />

                            <div class="small-img-row p-2">
                              <div class="small-img-col">
                                <img class="small-img" src="{{ asset('frontend/assets/images/products/gallery-1.jpg') }}" alt="" width="100%" />
                              </div>
                              <div class="small-img-col">
                                <img class="small-img" src="{{ asset('frontend/assets/images/products/gallery-2.jpg') }}" alt="" width="100%" />
                              </div>
                              <div class="small-img-col">
                                <img class="small-img" src="{{ asset('frontend/assets/images/products/gallery-3.jpg') }}" alt="" width="100%" />
                              </div>
                              <div class="small-img-col">
                                <img class="small-img" src="{{ asset('frontend/assets/images/products/gallery-4.jpg') }}" alt="" width="100%" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br />
                    <div class="row">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/WwOuBcNhmUE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="showcase-content">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="showcase-rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star-outline"></ion-icon>
                            <ion-icon name="star-outline"></ion-icon>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <a href="#">
                            <h3 class="showcase-title">
                              shampoo, conditioner & facewash packs
                            </h3>
                          </a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <p class="showcase-desc">
                            Lorem ipsum dolor sit amet consectetur Lorem
                            ipsum dolor dolor sit amet consectetur Lorem
                            ipsum dolor
                          </p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="price-box">
                            <p class="price">$150.00</p>
                            <del>$200.00</del>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="showcase-status">
                            <div class="wrapper">
                              <p>already sold: <b>20</b></p>
                              <p>available: <b>40</b></p>
                            </div>
                            <div class="showcase-status-bar"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="countdown-box">
                            <p class="p-2">Product Color:</p>
                            <div class="countdown">
                              <div class="countdown-content">
                                <p class="display-number">Red</p>
                              </div>
                              <div class="countdown-content">
                                <p class="display-number">Blue</p>
                              </div>
                              <div class="countdown-content">
                                <p class="display-number">Green</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="countdown-box">
                            <p class="p-2">Product Size:</p>

                            <p class="display-number"></p>
                            <p class="display-number"></p>

                            <div class="countdown">
                              <div class="countdown-content">
                                <p class="display-number">Red</p>
                              </div>
                              <div class="countdown-content">
                                <p class="display-number">Blue</p>
                              </div>
                              <div class="countdown-content">
                                <p class="display-number">Green</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="countdown-box">
                            <p class="p-2">Product Quantity:</p>
                            <p class="display-number">
                              <input type="number" min="1" value="1" style="padding: 5px; width: 70px; border: 1px solid #FF8F9C; border-radius: 5px; margin-left: 10px; font-size: 15px;" />
                            </p>
                          </div>
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="countdown-box">
                            <p class="p-2">Brand: Other</p>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="countdown-box">
                            <p class="p-2">Product Origin: India</p>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="countdown-box">
                            <p class="p-2">Category: Sunnah Corner</p>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="countdown-box">
                            <p class="p-2">Subcategory: Ator</p>
                          </div>
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-lg-12">
                          <p>Social Media Links:</p>
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-lg-12">
                          <p>Share Social Links:</p>
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-lg-12">
                          <div>
                            <a href="#">
                              <p class="showcase-desc">
                                Tags: Rojoni Gondha attar 6ml , Rojoni
                                Gondha sweet fragrance, long lasting perfume
                              </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-lg-12">
                          <button class="btn btn-sm btn-danger">
                            add to cart
                          </button>
                          <button class="btn btn-sm btn-danger">
                            wish List
                          </button>
                          <button class="btn btn-sm btn-info">
                            favorite
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Product Details -->
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                    Long Details
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                    Warrenty
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                    FAQ
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                    Reviews
                  </button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="text-align: justify;
                      border-bottom: 1px solid #e1e1e1;
                      border-right: 1px solid #e1e1e1;
                      border-left: 1px solid #e1e1e1;
                      padding: 10px;">
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. Lorem Ipsum has been the industry's
                  standard dummy text ever since the 1500s, when an unknown
                  printer took a galley of type and scrambled it to make a
                  type specimen book. It has survived not only five
                  centuries, but also the leap into electronic typesetting,
                  remaining essentially unchanged. It was popularised in the
                  1960s with the release of Letraset sheets containing Lorem
                  Ipsum passages, and more recently with desktop publishing
                  software like Aldus PageMaker including versions of Lorem
                  Ipsum. Lorem Ipsum is simply dummy text of the printing
                  and typesetting industry. Lorem Ipsum has been the
                  industry's standard dummy text ever since the 1500s, when
                  an unknown printer took a galley of type and scrambled it
                  to make a type specimen book. It has survived not only
                  five centuries, but also the leap into electronic
                  typesetting, remaining essentially unchanged. It was
                  popularised in the 1960s with the release of Letraset
                  sheets containing Lorem Ipsum passages, and more recently
                  with desktop publishing software like Aldus PageMaker
                  including versions of Lorem Ipsum. Lorem Ipsum is simply
                  dummy text of the printing and typesetting industry. Lorem
                  Ipsum has been the industry's standard dummy text ever
                  since the 1500s, when an unknown printer took a galley of
                  type and scrambled it to make a type specimen book. It has
                  survived not only five centuries, but also the leap into
                  electronic typesetting, remaining essentially unchanged.
                  It was popularised in the 1960s with the release of
                  Letraset sheets containing Lorem Ipsum passages, and more
                  recently with desktop publishing software like Aldus
                  PageMaker including versions of Lorem Ipsum. Lorem Ipsum
                  is simply dummy text of the printing and typesetting
                  industry. Lorem Ipsum has been the industry's standard
                  dummy text ever since the 1500s, when an unknown printer
                  took a galley of type and scrambled it to make a type
                  specimen book. It has survived not only five centuries,
                  but also the leap into electronic typesetting, remaining
                  essentially unchanged. It was popularised in the 1960s
                  with the release of Letraset sheets containing Lorem Ipsum
                  passages, and more recently with desktop publishing
                  software like Aldus PageMaker including versions of Lorem
                  Ipsum. Lorem Ipsum is simply dummy text of the printing
                  and typesetting industry. Lorem Ipsum has been the
                  industry's standard dummy text ever since the 1500s, when
                  an unknown printer took a galley of type and scrambled it
                  to make a type specimen book. It has survived not only
                  five centuries, but also the leap into electronic
                  typesetting, remaining essentially unchanged. It was
                  popularised in the 1960s with the release of Letraset
                  sheets containing Lorem Ipsum passages, and more recently
                  with desktop publishing software like Aldus PageMaker
                  including versions of Lorem Ipsum. Lorem Ipsum is simply
                  dummy text of the printing and typesetting industry. Lorem
                  Ipsum has been the industry's standard dummy text ever
                  since the 1500s, when an unknown printer took a galley of
                  type and scrambled it to make a type specimen book. It has
                  survived not only five centuries, but also the leap into
                  electronic typesetting, remaining essentially unchanged.
                  It was popularised in the 1960s with the release of
                  Letraset sheets containing Lorem Ipsum passages, and more
                  recently with desktop publishing software like Aldus
                  PageMaker including versions of Lorem Ipsum. Lorem Ipsum
                  is simply dummy text of the printing and typesetting
                  industry. Lorem Ipsum has been the industry's standard
                  dummy text ever since the 1500s, when an unknown printer
                  took a galley of type and scrambled it to make a type
                  specimen book. It has survived not only five centuries,
                  but also the leap into electronic typesetting, remaining
                  essentially unchanged. It was popularised in the 1960s
                  with the release of Letraset sheets containing Lorem Ipsum
                  passages, and more recently with desktop publishing
                  software like Aldus PageMaker including versions of Lorem
                  Ipsum. Lorem Ipsum is simply dummy text of the printing
                  and typesetting industry. Lorem Ipsum has been the
                  industry's standard dummy text ever since the 1500s, when
                  an unknown printer took a galley of type and scrambled it
                  to make a type specimen book. It has survived not only
                  five centuries, but also the leap into electronic
                  typesetting, remaining essentially unchanged. It was
                  popularised in the 1960s with the release of Letraset
                  sheets containing Lorem Ipsum passages, and more recently
                  with desktop publishing software like Aldus PageMaker
                  including versions of Lorem Ipsum. Lorem Ipsum is simply
                  dummy text of the printing and typesetting industry. Lorem
                  Ipsum has been the industry's standard dummy text ever
                  since the 1500s, when an unknown printer took a galley of
                  type and scrambled it to make a type specimen book. It has
                  survived not only five centuries, but also the leap into
                  electronic typesetting, remaining essentially unchanged.
                  It was popularised in the 1960s with the release of
                  Letraset sheets containing Lorem Ipsum passages, and more
                  recently with desktop publishing software like Aldus
                  PageMaker including versions of Lorem Ipsum. Lorem Ipsum
                  is simply dummy text of the printing and typesetting
                  industry. Lorem Ipsum has been the industry's standard
                  dummy text ever since the 1500s, when an unknown printer
                  took a galley of type and scrambled it to make a type
                  specimen book. It has survived not only five centuries,
                  but also the leap into electronic typesetting, remaining
                  essentially unchanged. It was popularised in the 1960s
                  with the release of Letraset sheets containing Lorem Ipsum
                  passages, and more recently with desktop publishing
                  software like Aldus PageMaker including versions of Lorem
                  Ipsum.
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="text-align: justify;
                      border-bottom: 1px solid #e1e1e1;
                      border-right: 1px solid #e1e1e1;
                      border-left: 1px solid #e1e1e1;
                      padding: 10px;">
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. Lorem Ipsum has been the industry's
                  standard dummy text ever since the 1500s, when an unknown
                  printer took a galley of type and scrambled it to make a
                  type specimen book. It has survived not only five
                  centuries, but also the leap into electronic typesetting,
                  remaining essentially unchanged. It was popularised in the
                  1960s with the release of Letraset sheets containing Lorem
                  Ipsum passages, and more recently with desktop publishing
                  software like Aldus PageMaker including versions of Lorem
                  Ipsum.
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab" style="text-align: justify;
                      border-bottom: 1px solid #e1e1e1;
                      border-right: 1px solid #e1e1e1;
                      border-left: 1px solid #e1e1e1;
                      padding: 10px;">
                  <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                          Accordion Item #1
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                          <strong>This is the first item's accordion
                            body.</strong>
                          It is shown by default, until the collapse plugin
                          adds the appropriate classes that we use to style
                          each element. These classes control the overall
                          appearance, as well as the showing and hiding via
                          CSS transitions. You can modify any of this with
                          custom CSS or overriding our default variables.
                          It's also worth noting that just about any HTML
                          can go within the <code>.accordion-body</code>,
                          though the transition does limit overflow.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                          Accordion Item #2
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                          <strong>This is the second item's accordion
                            body.</strong>
                          It is hidden by default, until the collapse plugin
                          adds the appropriate classes that we use to style
                          each element. These classes control the overall
                          appearance, as well as the showing and hiding via
                          CSS transitions. You can modify any of this with
                          custom CSS or overriding our default variables.
                          It's also worth noting that just about any HTML
                          can go within the <code>.accordion-body</code>,
                          though the transition does limit overflow.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                          Accordion Item #3
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                          <strong>This is the third item's accordion
                            body.</strong>
                          It is hidden by default, until the collapse plugin
                          adds the appropriate classes that we use to style
                          each element. These classes control the overall
                          appearance, as well as the showing and hiding via
                          CSS transitions. You can modify any of this with
                          custom CSS or overriding our default variables.
                          It's also worth noting that just about any HTML
                          can go within the <code>.accordion-body</code>,
                          though the transition does limit overflow.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--- PRODUCT GRID -->
        <br /><br />
        @include('frontend.components.featured_product.featured_product')
      </div>
    </div>
  </div>

  <!--- BLOG -->
  @include('frontend.components.blog.featured_blog')
  <!--- BLOG -->

  <script>
    //For Product gallery
    var ProductImg = document.getElementById("ProductImg");
    var SmallImg = document.getElementsByClassName("small-img");

    SmallImg[0].onclick = function() {
      ProductImg.src = SmallImg[0].src;
    };
    SmallImg[1].onclick = function() {
      ProductImg.src = SmallImg[1].src;
    };
    SmallImg[2].onclick = function() {
      ProductImg.src = SmallImg[2].src;
    };
    SmallImg[3].onclick = function() {
      ProductImg.src = SmallImg[3].src;
    };
  </script>
</main>


@endsection