<section class="section-content">
    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-md-8">
                <article class="content-item">
                    <div class="entry-media">
                        <div class="post-title">
                            <h2><a href="javascript:;"><?php echo $post->title; ?></a></h2>
                            <div class="entry-date">
                                <ul>
                                    <li>
                                        <a href='#'><?php echo get_category_title($post->category_id); ?></a>
                                    </li>
                                    <li><?php echo date("d.m.Y", strtotime($post->createdAt)); ?></li>
                                    <li class="pull-right">
                                        <i class="fa fa-eye"></i> <?php echo ($post->display_count > 0) ? $post->display_count ." Görüntülenme" : "Görüntülenme Yok"; ?>
                                    </li>
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
                    </div>
                </article>
                <article class="content-item">
                    <div class="entry-media">
                        <div class="post-title">
                            <h2><a href="javascript:;">Diğer Yazılar</a></h2>
                        </div>
                        <div class="bubble-line"></div>
                        <div class="post-content related">
                            <div class="row">

                                <?php foreach($sidebar_posts as $sidebar_post) { ?>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="related-post">
                                            <?php if($sidebar_post->post_type == 1) { ?>
                                                <img src="/panel/uploads/posts/<?php echo $sidebar_post->img_url; ?>" alt="<?php echo $sidebar_post->title; ?>">
                                            <?php } else if($sidebar_post->post_type == 2) { ?>

                                                <iframe src="<?php echo $sidebar_post->video_url; ?>"
                                                        width="100%" height="140" frameborder="0" webkitallowfullscreen mozallowfullscreen
                                                        allowfullscreen>
                                                </iframe>

                                            <?php } ?>
                                            <h4><a href="post.php?id=<?php echo $sidebar_post->id; ?>"><?php echo $sidebar_post->title; ?></a></h4>
                                            <p><i class="fa fa-clock-o"></i> <?php echo date("d.m.Y", strtotime($sidebar_post->createdAt)); ?></p>
                                            <p><i class="fa fa-eye"></i> <?php echo ($sidebar_post->display_count > 0) ? $sidebar_post->display_count ." Görüntülenme" : "Görüntülenme Yok"; ?></p>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>

                    </div>
                </article>

                <article class="content-item">

                    <?php 
                        //include "././libraries/db.php";
                       //$comm = $db->query("SELECT * FROM comments where isActive = 1")->fetchAll(PDO::FETCH_OBJ);
                       $comm=get_post_comments($post->id);

                    ?>

                    <div class="entry-media">
                        <div class="post-title comment-title">
                            <h3><?php echo (sizeof($comm) > 0) ? sizeof($comm) ." Yorum"  : "Henüz bir yorum eklenmemiştir"; ?></h3>
                        </div>
                        <div class="bubble-line"></div>
                        <div id="comments" class="comments-area">
                            <div class="comments-wrapper">
                                <ol class="comment-list">

                                    <?php foreach($comm as $comment) { ?>

                                        <li class="comment" id="comment-6">

                                            <article>
                                                <div class="comment-avatar">
                                                    <img src="assets/images/member.png" alt="<?php echo $comment->name; ?>">
                                                </div>

                                                <div class="comment-body">
                                                    <div class="meta-data">
                                                        <span class="comment-author"><?php echo $comment->name; ?></span>
                                                        <span class="comment-date"> <?php echo date("d.m.Y H:i:s", strtotime($comment->createdAt)); ?> </span>
                                                    </div>
                                                    <div class="comment-content">
                                                        <p><?php echo $comment->comment; ?></p>
                                                    </div>

                                                </div>
                                            </article>

                                        </li><!-- #comment-## -->

                                    <?php } ?>
                                </ol><!-- .comment-list -->

                            </div>
                        </div>
                    </div>



                </article>

                <article class="content-item">
                    <div class="entry-media">
                        <div class="post-title">
                        <?if (isset($user)){?>
                            <h2>Yorumunuzu bırakın</h2>
                        <?}else{?>
                        	<h4>Yorumun bırakmak için lütfen üye girişi yapın</h4>
                        <?}?>
                        </div>
                        <?if (isset($user)){?>
                        <div class="bubble-line"></div>
                        <div class="post-content comment">
                            <form method="post" action="post.php?p=comment&id=<?php echo $post->id; ?>">
                                <div class="comment-form ">
                                    <p class="input-name"> Yorum</p>
                                    <textarea placeholder="" name="comment"></textarea>
                                </div>
                                <div class="comment-submit">
                                    <button class="button" type="submit">Gönder</button>
                                </div>
                            </form>
                        </div>
                        <?}?>
                    </div>
                </article>

            </div>

            <div class="col-sm-4 sidebar">
                <?php include("views/includes/right_sidebar.php"); ?>
            </div>
        </div>
    </div>
</section>