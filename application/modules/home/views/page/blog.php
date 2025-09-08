<main id="content" style="margin-top: 50px;">
  <section class="pt-10 pb-11 pb-lg-15">
    <div class="container">
      <h2 class="fs-sm-40 mb-11 text-center">Blog</h2>
      <div class="row">

      	<?php foreach ($blog as $row_blog): ?>
        <div class="col-sm-6 col-lg-4 mb-8" data-animate="fadeInUp">
          <div class="card border-0">
            <a href="#" class="hover-shine card-img-top">
              <img src="assets/images/blog/<?php echo $row_blog['blog_img_thumbnails']; ?>">
            </a>
            <div class="card-body px-0 pt-6 pb-0">
              <p class="card-text fs-12 mb-2 text-muted lh-12 text-uppercase letter-spacing-05 font-weight-500"><?php echo $row_blog['blog_date']; ?></p>
              <h3 class="card-title mb-2 fs-20">
                <a href="#"><?php echo $row_blog['blog_tittle']; ?></a>
              </h3>
              <p class="card-text mb-4 font-weight-500"><?php echo $row_blog['blog_short']; ?></p>
              <a href="<?php echo $row_blog['blog_slug']; ?>" class="fs-14 font-weight-bold border-bottom border-light-dark text-uppercase letter-spacing-05 d-inline-block border-hover-primary">
                Lebih lanjut
              </a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

        
      </div>
      
    </div>
  </section>
</main>