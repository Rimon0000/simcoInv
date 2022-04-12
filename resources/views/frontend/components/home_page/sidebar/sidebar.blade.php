<div class="sidebar has-scrollbar" data-mobile-menu>
    <div class="sidebar-category">
        <div class="sidebar-top">
            <h2 class="sidebar-title">Category</h2>

            <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>

        <div class="accordion" id="accordionPanelsStayOpenExample">

            @foreach($categories as $category)
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-heading_{{$category->id}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse_{{$category->id}}" aria-expanded="false" aria-controls="panelsStayOpen-collapse_{{$category->id}}">
                        <div class="menu-title-flex">
                            <img src="{{ $category->cat_img }}" alt="{{$category->cat_name}}" class="menu-title-img" width="20" height="20" />
                            <p class="menu-title">{{$category->cat_name}}</p>
                        </div>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapse_{{$category->id}}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading_{{$category->id}}">
                    <div class="accordion-body">

                        @foreach($subcategories as $subcategory)
                            @if($subcategory->cat_id ==  $category->id)
                            <li class="sidebar-submenu-category">
                                <a href="#" class="sidebar-submenu-title">
                                    <p class="product-name">{{ $subcategory->sub_cat_name }}</p>
                                    <data value="45" class="stock" title="Available Stock">45</data>
                                </a>
                            </li>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div class="product-showcase">
        <h3 class="showcase-heading">best sellers</h3>

        <div class="showcase-wrapper">
            <div class="showcase-container">
                <div class="showcase">
                    <a href="#" class="showcase-img-box">
                        <img src="{{ asset('frontend/assets/images/products/1.jpg') }}" alt="baby fabric shoes" width="75" height="75" class="showcase-img" />
                    </a>

                    <div class="showcase-content">
                        <a href="#">
                            <h4 class="showcase-title">baby fabric shoes</h4>
                        </a>

                        <div class="showcase-rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                        </div>

                        <div class="price-box">
                            <del>$5.00</del>
                            <p class="price">$4.00</p>
                        </div>
                    </div>
                </div>

                <div class="showcase">
                    <a href="#" class="showcase-img-box">
                        <img src="{{ asset('frontend/assets/images/products/2.jpg') }}" alt="men's hoodies t-shirt" class="showcase-img" width="75" height="75" />
                    </a>

                    <div class="showcase-content">
                        <a href="#">
                            <h4 class="showcase-title">men's hoodies t-shirt</h4>
                        </a>
                        <div class="showcase-rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star-half-outline"></ion-icon>
                        </div>

                        <div class="price-box">
                            <del>$17.00</del>
                            <p class="price">$7.00</p>
                        </div>
                    </div>
                </div>

                <div class="showcase">
                    <a href="#" class="showcase-img-box">
                        <img src="{{ asset('frontend/assets/images/products/3.jpg') }}" alt="girls t-shirt" class="showcase-img" width="75" height="75" />
                    </a>

                    <div class="showcase-content">
                        <a href="#">
                            <h4 class="showcase-title">girls t-shirt</h4>
                        </a>
                        <div class="showcase-rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star-half-outline"></ion-icon>
                        </div>

                        <div class="price-box">
                            <del>$5.00</del>
                            <p class="price">$3.00</p>
                        </div>
                    </div>
                </div>

                <div class="showcase">
                    <a href="#" class="showcase-img-box">
                        <img src="{{ asset('frontend/assets/images/products/4.jpg') }}" alt="woolen hat for men" class="showcase-img" width="75" height="75" />
                    </a>

                    <div class="showcase-content">
                        <a href="#">
                            <h4 class="showcase-title">woolen hat for men</h4>
                        </a>
                        <div class="showcase-rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                        </div>

                        <div class="price-box">
                            <del>$15.00</del>
                            <p class="price">$12.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>