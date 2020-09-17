<div class="section-padding-100">
    <div class="container">
        <div class="row">
            <!-- Single Portfoio Area -->
            <div class="col-12 col-md-10">
                <div class="single-portfolio-item mt-100 portfolio-item-3 wow fadeIn">
                    <div class="backend-content">
                        <img class="dots" src="<?= base_url(); ?>/img/core-img/dots.png" alt="" />
                        <h2>News</h2>
                    </div>

                    <!-- ***** Blog Area Start ***** -->
                    <section class="sonar-blog-area section-padding-100">
                        <!-- back end content -->
                        <div class="backEnd-content">
                            <img class="dots" src="<?= base_url(); ?>/img/core-img/dots.png" alt="">
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-9">
                                    <?php foreach ($aqmnewstop->data as $aqmnews) : ?>
                                        <!-- Single Blog Area -->
                                        <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="300ms">
                                            <!-- Post Thumbnail -->
                                            <div class="blog-post-thumbnail">
                                                <img src="<?= $aqmnews->image; ?>" alt="">
                                                <!-- Post Date -->
                                                <div class="post-date">
                                                    <a href="<?= base_url(); ?>/news/<?= $aqmnews->slug; ?>"><?= date("M d 'y", strtotime($aqmnews->created_at)); ?></a>
                                                </div>
                                            </div>
                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="<?= base_url(); ?>/news/<?= $aqmnews->slug; ?>" class="headline"><?= $aqmnews->title; ?></a>
                                                <p><?= $aqmnews->short_content; ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>

                                <div class="col-12 col-md-3">
                                    <div class="sonar-blog-sidebar-area">

                                        <!-- Search Widget -->
                                        <div class="ispu-form search-widget-area mb-50">
                                            <form action="news" method="get">
                                                <input type="search" name="keyword" value="<?= $_GET["keyword"]; ?>" style="border: none !important;border-bottom: 1px solid !important;border-color: #c0c0c0 !important" placeholder="Search">
                                                <button type="submit"><i class="ti-search"></i></button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>