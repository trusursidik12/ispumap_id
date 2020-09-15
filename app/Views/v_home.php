<link rel='stylesheet' href='css/main-style.css' type='text/css' media='all' />

<!-- ***** Hero Area Start ***** -->
<section class="hero-area" id="home">
    <div class="hero-slides owl-carousel">
        <?php foreach ($header_provinces as $key => $province) : ?>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img slide-background-overlay" style="background-image: url(img/header/slide_<?= str_replace(" ", "_", $province["name"]); ?>.png);">
                <div class="container h-100">
                    <div class="row h-100 align-items-end">
                        <div class="col-12">
                            <div class="awesome-weather-wrap awecf awe_wide temp7 awe_with_stats awe-code-802 awe-desc-scattered-clouds" style=" color: #ffffff; ">
                                <div class="row">
                                    <div class="col-12" style="font-size:16px;font-weight:bolder;display: flex;">
                                        <img style="height:30px;width:30px;" src="img/ic_emote_<?= str_replace(" ", "_", strtolower($province["category"])); ?>.png">&nbsp;&nbsp;
                                        KATEGORI : <?= strtoupper($province["category"]); ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-3 btn">PM 10</div>
                                    <div class="col-2 btn btn-<?= $province["ispu"]->btn_class_pm10; ?>"><?= $province["ispu"]->pm10; ?></div>
                                    <div class="col-1"></div>
                                    <div class="col-3 btn">PM 25</div>
                                    <div class="col-2 btn btn-<?= $province["ispu"]->btn_class_pm25; ?>"><?= $province["ispu"]->pm25; ?></div>
                                    <div class="col-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-3 btn">O3</div>
                                    <div class="col-2 btn btn-<?= $province["ispu"]->btn_class_o3; ?>"><?= $province["ispu"]->o3; ?></div>
                                    <div class="col-1"></div>
                                    <div class="col-3 btn">SO2</div>
                                    <div class="col-2 btn btn-<?= $province["ispu"]->btn_class_so2; ?>"><?= $province["ispu"]->so2; ?></div>
                                    <div class="col-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-3 btn">NO2</div>
                                    <div class="col-2 btn btn-<?= $province["ispu"]->btn_class_no2; ?>"><?= $province["ispu"]->no2; ?></div>
                                    <div class="col-1"></div>
                                    <div class="col-3 btn">CO</div>
                                    <div class="col-2 btn btn-<?= $province["ispu"]->btn_class_co; ?>"><?= $province["ispu"]->co; ?></div>
                                    <div class="col-1"></div>
                                </div>
                            </div>

                            <div class="awesome-weather-wrap awecf awe_wide temp7 awe_with_stats awe-code-802 awe-desc-scattered-clouds" style="<?= ($_this->is_mobile()) ? "display:none;" : ""; ?>color: #ffffff; ">
                                <div class="row">
                                    <div class="col-2"><img style="height:30px;width:40px;" src="img/pressure.png"></div>
                                    <div class="col-3 btn"><?= ($province["data"]->pressure) ? $province["data"]->pressure : "0"; ?> mBar</div>
                                    <div class="col-1"></div>
                                    <div class="col-2"><img style="height:30px;width:40px;" src="img/temparature.png"></div>
                                    <div class="col-3 btn"><?= ($province["data"]->temperature) ? $province["data"]->temperature : "0"; ?> &#176;C</div>
                                    <div class="col-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-2"><img style="height:30px;width:40px;" src="img/wind_direction.png"></div>
                                    <div class="col-3 btn"><?= ($province["data"]->wd) ? $province["data"]->wd : "0"; ?> &#176;</div>
                                    <div class="col-1"></div>
                                    <div class="col-2"><img style="height:30px;width:40px;" src="img/wind_speed.png"></div>
                                    <div class="col-3 btn"><?= ($province["data"]->ws) ? $province["data"]->ws : "0"; ?> Km/h</div>
                                    <div class="col-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-2"><img style="height:30px;width:40px;" src="img/humidity.png"></div>
                                    <div class="col-3 btn"><?= ($province["data"]->humidity) ? $province["data"]->humidity : "0"; ?> %</div>
                                    <div class="col-1"></div>
                                    <div class="col-2"><img style="height:30px;width:40px;" src="img/rain_rate.png"></div>
                                    <div class="col-3 btn"><?= ($province["data"]->rain_intensity) ? $province["data"]->rain_intensity : "0"; ?> mm/jam</div>
                                    <div class="col-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-2"><img style="height:30px;width:40px;" src="img/solar_radiation.png"></div>
                                    <div class="col-3 btn"><?= ($province["data"]->sr) ? $province["data"]->sr : "0"; ?> watt/m2</div>
                                    <div class="col-7"></div>
                                </div>
                            </div>

                            <div class="hero-slides-content">
                                <h2><b><?= $province["name"]; ?></b></h2>
                                <div class="line" style="padding:0px;"></div>
                            </div>
                            <div style="padding:30px 40px 38px 50px;margin-top:40px;color: #ffffff; text-align:center;<?= ($_this->is_mobile()) ? "display:none;" : ""; ?>">
                                <button class="btn btn-info" onclick="$('html, body').animate({scrollTop: $('#map').offset().top}, 1000);">
                                    View More
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>
<!-- ***** Hero Area End ***** -->

<div id="map" class="section-padding-100">
    <div class="row">
        <div class="col-12">
            <?= $map["js"]; ?>
            <?= $map["html"]; ?>
        </div>
    </div>
</div>

<!-- ***** Apps Area Start ***** -->
<div id="apps" class="hero-area d-flex align-items-center">
    <!-- Back End Content -->
    <div class="backEnd-content">
        <img class="dots" src="img/core-img/dots.png" alt="" />
    </div>

    <!-- Hero Thumbnail -->
    <div class="hero-thumbnail aboutUs equalize bg-img" style="background-image: url(img/bg_apps_big.jpg)"></div>

    <!-- Hero Content -->
    <div class="hero-content aboutUs equalize">
        <div class="container-fluid h-100">
            <div class="row">
                <div class="col-12">
                    <div class="portfolio-title">
                        <h2>“Kini kamu bisa mengetahui polusi udara disekitarmu, ayo download aplikasi Ispumap.id”</h2>
                    </div>
                </div>
            </div>
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="line" style="padding:0px;"></div>
                    <a href="https://play.google.com/store/apps/details?id=com.ispumap" target="_blank" class="btn sonar-btn white-btn">Download Apps</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Apps Area End ***** -->

<!-- ***** Call to Action Area Start ***** -->
<div id="contact" class="sonar-call-to-action-area section-padding-100">
    <div class="backEnd-content">
        <h2>Contact Us</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="call-to-action-content wow fadeInUp" data-wow-delay="0.5s">
                    <h2>“Contributing to world sustainability through providing suitable air pollution measurement instruments; and providing accurate and recognized air quality instrument calibration services”</h2>
                    <h5>Let’s talk</h5>
                    <a href="#" class="btn sonar-btn mt-100">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Call to Action Area End ***** -->