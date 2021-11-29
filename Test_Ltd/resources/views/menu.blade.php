@include('header')

<!-- ======= Menu Section ======= -->
<section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Menu</h2>
            <p>Check Our Tasty Menu</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="menu-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-starters">Starters</li>
                    <li data-filter=".filter-salads">Salads</li>
                    <li data-filter=".filter-specialty">Specialty</li>
                </ul>
            </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
            <!-- Get menu from database -->
            <?php
            if (count($Menu) > 0) {
                $i = 0;
                for($i;$i<count($Menu);$i++)
                {
                    ?>
                    <div class="col-lg-6 menu-item filter-{{$Menu[$i]["Type"]}}">
                        <img src="{{$Menu[$i]["ImageUrl"]}}" class="menu-img" alt="">
                        <div class="menu-content">
                            <a href="#">{{$Menu[$i]["FoodName"]}}</a><span>${{$Menu[$i]["Price"]}}</span>
                        </div>
                        <div class="menu-ingredients">
                            {{$Menu[$i]["Ingredients"]}}
                        </div>
                    </div>
            <?php
                }
            } else {
            ?>
                <p>The menu is not avaible at the moment. Please try again later, and thank you for your patience.</p>
            <?php
            }
            ?>

        </div>

    </div>
</section><!-- End Menu Section -->

@include('footer')
