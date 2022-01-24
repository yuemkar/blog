<div class="widget">
    <h3 class="widget-title">Hakkımda</h3>
    <div class="bubble-line"></div>

    <div class="widget-content">
        <img src="/panel/uploads/<?php echo $settings->profile_image_url; ?>" alt="<?php echo $settings->full_name; ?>">
        <p><?php echo get_short_str($settings->about_me, 400); ?> </p>
        <div class="widget-more">
            <a href="about.php" class="button">Hakkımda..</a>
        </div>
    </div>
</div>
<div class="widget">
    <h3 class="widget-title"> Kategoriler</h3>
    <div class="bubble-line"></div>
    <div class="widget-content">
        <ul>

            <?php foreach ($categories as $category) { ?>

                <li>
                    <a href="category.php?id=<?php echo $category->id; ?>"><?php echo $category->title; ?></a>
                </li>

            <?php } ?>

        </ul>
    </div>
</div>
<div class="widget">
    <h3 class="widget-title"> Son Eklenenler</h3>

    <div class="bubble-line"></div>
    <div class="widget-content">
        <?php foreach ($sidebar_posts as $post) { ?>

            <div class="widget-recent">

                <?php if($post->post_type == 1) { ?>
                    <img src="/panel/uploads/posts/<?php echo $post->img_url; ?>" alt="<?php echo $post->title; ?>">
                <?php } else if($post->post_type == 2) { ?>

                    <iframe src="<?php echo $post->video_url; ?>"
                            width="100%" height="150" frameborder="0" webkitallowfullscreen mozallowfullscreen
                            allowfullscreen>
                    </iframe>

                <?php } ?>
                <h4><a href="post.php?id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a></h4>
                <p>
                    <?php echo get_short_str($post->description); ?>
                </p>
            </div>

        <?php } ?>

    </div>
</div>