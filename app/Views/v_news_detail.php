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
                                    <!-- Single Blog Area -->
                                    <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="300ms">
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <h2 class="headline"><b><?= $news->data->title; ?></b></h2><br>
                                        </div>
                                        <!-- Post Thumbnail -->
                                        <div class="blog-post-thumbnail">
                                            <img src="<?= $news->data->image; ?>" alt="">
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="<?= base_url(); ?>/news/<?= $news->data->slug; ?>"><?= date("M d 'y", strtotime($news->data->created_at)); ?></a>
                                            </div>
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <p><?= $news->data->content; ?></p>
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