<section class="section-content">
    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-md-8">
                <article class="content-item">
                    <div class="entry-media">
                        <div class="about-title">
                            <h2> <?php echo $settings->full_name; ?></h2>
                        </div>
                        <div class="bubble-line"></div>
                        <div class="post-content about">
                            <img src="/panel/uploads/<?php echo $settings->profile_image_url;?>" alt="<?php echo $settings->full_name;?>">
                            <p>
                                <?php echo $settings->about_me; ?>
                            </p>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-sm-4 sidebar">
                <?php include("views/includes/right_sidebar.php"); ?>
            </div>
        </div>
    </div>
</section>