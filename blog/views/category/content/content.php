<section class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-8">

                <?php foreach ($posts as $post) { ?>

                    <article class="content-item">
                    <div class="entry-media">
                        <div class="post-title">
                            <h2><a href="#"><?php echo $post->title; ?></a></h2>
                            <div class="entry-date">
                                <ul>
                                    <li>
                                        <a href='#'><?php echo get_category_title($post->category_id); ?></a>
                                    </li>
                                    <li><?php echo date("d.m.Y", strtotime($post->createdAt)); ?></li>
<!--                                    <li>23 comment</li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="bubble-line"></div>
                        <div class="post-content">

                            <?php if($post->post_type == 1) { ?>
                                <img src="/panel/uploads/posts/<?php echo $post->img_url; ?>" alt="<?php echo $post->title; ?>">
                            <?php } else if($post->post_type == 2) { ?>

                                <iframe src="<?php echo $post->video_url; ?>"
                                        width="100%" height="300" frameborder="0" webkitallowfullscreen mozallowfullscreen
                                        allowfullscreen>
                                </iframe>

                            <?php } ?>
                            <p>
                                <?php echo get_short_str($post->description, 300); ?>
                            </p>
                        </div>
                        <div class="bubble-line"></div>
                        <div class="post-footer">
                            <div class="row">
                                <div class="col-sm-5">
                                    <a href="post.php?id=<?php echo $post->id; ?>" class="button">Devamını Oku</a>
                                </div>
<!--                                <div class="col-sm-7 text-right">-->
<!--                                    <div class="content-social">-->
<!--                                        <a href="javascript:;"><i class="fa fa-facebook"></i><span>Facebook</span></a>-->
<!--                                        <a href="javascript:;"><i class="fa fa-twitter"></i><span>Twitter</span></a>-->
<!--                                        <a href="javascript:;"><i class="fa fa-pinterest"></i><span>Pinterest</span></a>-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </article>

                <?php } ?>


            </div>

            <div class="col-sm-4 sidebar">
                <?php include("views/includes/right_sidebar.php"); ?>
            </div>
        </div>
    </div>
</section>