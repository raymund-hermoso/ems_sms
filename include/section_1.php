<section id="home-sec" class="">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <?php 
                $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

                if($page == 'index.php'){
                    echo '<div class="banner-content" style="background-image: url(img/banner/student-study.jpg);">';
                }
                else{
                    echo '<div class="banner-content" style="background-image: url(../img/banner/student-study.jpg);">';
                }
            ?>
                    <div class="container">
                        <h1 data-aos="zoom-in">OBSERVE PROTOCOL</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
            <?php 
                $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

                if($page == 'index.php'){
                    echo '<div class="banner-content" style="background-image: url(img/banner/student-study-2.jpg);">';
                }
                else{
                    echo '<div class="banner-content" style="background-image: url(../img/banner/student-study-2.jpg);">';
                }
            ?>
                    <div class="container">
                        <h1 data-aos="zoom-in">OBSERVE PROTOCOL</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
            <?php 
                $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

                if($page == 'index.php'){
                    echo '<div class="banner-content" style="background-image: url(img/banner/student-study-3.jpg);">';
                }
                else{
                    echo '<div class="banner-content" style="background-image: url(../img/banner/student-study-3.jpg);">';
                }
            ?>
                    <div class="container">
                        <h1 data-aos="zoom-in">OBSERVE PROTOCOL</h1>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>