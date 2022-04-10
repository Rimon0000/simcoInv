<div class="banner">
    <div class="my_container">
        <div class="slider-container has-scrollbar">

            @foreach($banners as $banner)
            <div class="slider-item">
                <img src="{{ $banner->slider_img }}" alt="{{ $banner->slider_alt }}" class="banner-img" />

                <div class="banner-content">
                    <p class="banner-subtitle">Trending item</p>

                    <h2 class="banner-title">Women's latest fashion sale</h2>

                    <p class="banner-text">starting at &dollar; <b>20</b>.00</p>

                    <a href="#" class="banner-btn">Shop now</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>