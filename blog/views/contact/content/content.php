<section class="section-content">
    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-md-8">

                <article class="contact-media">
                    <h2 class="contact-media-title">İletişim</h2>
                    <div class="bubble-line"></div>
                    <div class="contact-content">
                        <img src="/panel/uploads/<?php echo $settings->profile_image_url;?>" alt="<?php echo $settings->full_name;?>">
                        <h3>Benimle iletişime geçmek için aşağıdaki formu doldurabilirsiniz[Şuanda Devre Dışı]</h3>
                        <p> Aklınıza gelen herhangi bir soru yada görüşü benimle paylaşırsanız çok sevinirim.
                        </p>

                        <div class="bubble-line"></div>

                        <div class="contact-row">
                            <form method="post" action="contact.php?p=send">
                                <div class="contact-form">
                                    <p>  Adınız ve Soyadınız (gerekli)	</p>
                                    <input type="text" name="name" placeholder="" required>
                                    <p> E-posta(gerekli) </p>
                                    <input type="text" name="email" placeholder="">
                                    <p>Konu</p>
                                    <input type="text" name="subject" placeholder="">
                                    <p> Mesaj</p>
                                    <textarea placeholder="" name="message"></textarea>
                                </div>
                                <div class="contact-submit">
                                    <button type="submit" class="button">Gönder</button>
                                </div>
                            </form>
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