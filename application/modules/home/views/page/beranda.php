<main id="content">
    <section class="overflow-hidden">
      <div class="slick-slider"
        data-slick-options='{"slidesToShow": 1,"infinite":true,"autoplay":false,"dots":false,"arrows":false}'>

        <?php foreach ($banner1 as $row): ?>
        <div class="box">
          <div class="d-flex flex-column justify-content-center justify-content-lg-start bg-img-cover-center vh-100 pt-lg-17 custom-height-sm"
            style="background-image: url('assets/images/<?php echo $row['banner_images']; ?>')">
            <div class="d-flex flex-column justify-content-center justify-content-lg-start h-100">
              <div class="container container-xxl">

                <h1 class="mb-7 fs-40 fs-xxl-90 lh-1" data-animate="fadeInUp"><?php echo $row['banner_tittle']; ?></h1>
                <p class="text-primary font-weight-bold fs-20 mb-4" data-animate="fadeInUp"><?php echo $row['banner_sub']; ?></p>

                <?php if (!empty($row['banner_button'])) : ?>
                <div><a href="<?php echo $row['banner_buttonlink']; ?>" class="btn btn-primary text-uppercase letter-spacing-05"
                    data-animate="fadeInUp"><?php echo $row['banner_button']; ?></a>
                </div>
                <?php endif; ?>

              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>


      </div>
    </section>

    <section class="py-10">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-6 mb-md-0">
            <div class="media border-md-right justify-content-center align-items-center">
              <div class="w-52px mr-5">
                <img src="assets/images/icon-box-03.png" alt="100 Days Return">
              </div>
              <div class="media-body flex-unset">
                <h3 class="fs-20 mb-1">Gratis Pengiriman</h3>
                <p class="mb-0 font-weight-500 fs-15">Untuk Area Jabodetabek</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-6 mb-md-0">
            <div class="media border-md-right justify-content-center align-items-center">
              <div class="w-52px mr-5">
                <img src="assets/images/icon-box-02.png" alt="Lifetime Warranty">
              </div>
              <div class="media-body flex-unset">
                <h3 class="fs-20 mb-1">Proven High Quality</h3>
                <p class="mb-0 font-weight-500 fs-15">10+ Pengalaman di Industri</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-6 mb-md-0">
            <div class="media justify-content-center align-items-center">
              <div class="w-52px mr-5">
                <img src="assets/images/icon-box-01.png" alt="Custom Services">
              </div>
              <div class="media-body flex-unset">
                <h3 class="fs-20 mb-1">Gratis Konsultasi</h3>
                <p class="mb-0 font-weight-500 fs-15">Sesuai kebutuhan Anda.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-lg-12 py-11" id="bodyweb">
      <div class="container container-xxl">
        <div class="row mb-7 align-items-end">
          <div class="col-md-6">
            <h2 class="mb-0 fs-30 fs-md-40 mb-2">Produk</h2>
          </div>
          <div class="col-md-6 text-md-right ml-md-auto">
            <a href="product.html"
              class="fs-14 font-weight-bold border-bottom border-light-dark text-uppercase letter-spacing-05 d-inline-block border-hover-primary">Lihat
              Semua Produk
            </a>
          </div>
        </div>
        <div class="slick-slider custom-arrow-1"
          data-slick-options='{"slidesToShow": 3,"infinite":true,"autoplay":false,"dots":false,"arrows":true,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":2,"arrows":false,"dots":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true}}]}'>

          <?php foreach ($product as $row_product): ?>
          <div class="box" data-animate="fadeInUp">
            <div class="card border-0 hover-change-content product">
              <div style="background-image: url('assets/images/product/<?php echo $row_product['product_images']; ?>')"
                class="card-img ratio bg-img-cover-center ratio-1-1">
              </div>
              <div class="card-img-overlay d-flex py-4 py-sm-5 pl-6 pr-4">
                <div class="d-flex flex-column">
                  <a href="#" class="font-weight-bold mb-1 d-block lh-12"><?php echo $row_product['product_category_name']?></a>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

        </div>
      </div>
    </section>
    <section class="pb-11 pb-lg-15">
      <div class="container container-xxl">
        <div class="row">
          <div class="col-xl-6 mb-6 mb-xl-0" data-animate="fadeInUp">
            <div class="card border-0 banner banner-05">
              <div class="card-img bg-img-cover-center" style="background-image: url('assets/images/<?php echo $banner2->banner_images; ?>')"></div>
              <div class="card-img-overlay d-inline-flex flex-column align-items-center justify-content-center">
                <p class="card-text fs-20 text-white font-weight-bold mb-2">
                  <?php echo $banner2->banner_tittle; ?>
                </p>
                <h3 class="card-title fs-40 fs-md-56 mb-6 text-white"><?php echo $banner2->banner_sub; ?></h3>
                <div class="mb-8">
                  <a href="<?php echo $banner2->banner_buttonlink; ?>" target="_blank"
                    class="btn btn-white text-uppercase letter-spacing-05"><?php echo $banner2->banner_button; ?></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 mb-6 mb-xl-0" data-animate="fadeInUp">
            <div class="card border-0 banner banner-05">
              <div class="card-img bg-img-cover-center" style="background-image: url('assets/images/<?php echo $banner3->banner_images; ?>')"></div>
              <div class="card-img-overlay d-inline-flex flex-column align-items-center justify-content-center">
                <p class="card-text fs-20 text-white font-weight-bold mb-2">
                  <?php echo $banner3->banner_tittle; ?>
                </p>
                <h3 class="card-title fs-40 fs-md-56 mb-6 text-white"><?php echo $banner3->banner_sub; ?></h3>
                <div class="mb-8">
                  <a href="<?php echo $banner3->banner_buttonlink; ?>" target="_blank"
                    class="btn btn-white text-uppercase letter-spacing-05"><?php echo $banner3->banner_button; ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pb-lg-12 pb-11">
      <div class="container container-xxl">
        <div class="row mb-7 align-items-end">
          <div class="col-md-6">
            <h2 class="mb-0 fs-30 fs-md-40 mb-2">Produk Unggulan Lainnya</h2>
          </div>
          <div class="col-md-6 text-md-right ml-md-auto">
            <a href="product.html"
              class="fs-14 font-weight-bold border-bottom border-light-dark text-uppercase letter-spacing-05 d-inline-block border-hover-primary">Lihat
              Semua Produk</a>
          </div>
        </div>
	        <div class="slick-slider custom-arrow-1"
	          data-slick-options='{"slidesToShow": 3,"infinite":true,"autoplay":false,"dots":false,"arrows":true,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":2,"arrows":false,"dots":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true}}]}'>

	          <?php foreach ($product_fav as $row_product_fav): ?>
	          <div class="box" data-animate="fadeInUp">
	            <div class="card border-0 hover-change-content product">
	              <div style="background-image: url('assets/images/product/<?php echo $row_product_fav['product_images']?>')"
	                class="card-img ratio bg-img-cover-center ratio-1-1">
	              </div>
	              <div class="card-img-overlay d-flex py-4 py-sm-5 pl-6 pr-4">
	                <div class="d-flex flex-column">
	                  <a href="#" class="font-weight-bold mb-1 d-block lh-12"><?php echo $row_product_fav['product_category_name']?></a>
	                </div>
	              </div>
	            </div>
	          </div>
	          <?php endforeach; ?>

	        </div>
          
        </div>
      </div>
    </section>
    <section class="pb-11 pb-lg-15 border-bottom">
      <div class="container">
        <h2 class="mb-10 text-center fs-30 fs-md-40">Testimoni Pelanggan</h2>
        <div class="slick-slider custom-arrow-1"
          data-slick-options='{"slidesToShow": 3,"infinite":true,"autoplay":false,"dots":false,"arrows":true,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":2,"arrows":false,"dots":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true}}]}'>

          <?php foreach ($testimoni as $row_testimoni): ?>
          <div class="box" data-animate="fadeInUp">
            <div class="card border-0">
              <div class="card-body px-3 py-0 text-center">
                <div class="mxw-84px mb-6 mx-auto">
                  <img src="assets/images/testimoni/<?php echo $row_testimoni['testimoni_images']; ?>" alt="Sampson Totton">
                </div>
                <ul class="list-inline mb-4">
                  <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i></li>
                  <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i></li>
                  <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i></li>
                  <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i></li>
                  <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i></li>
                </ul>
                <p class="card-text mb-4 font-weight-500">“<?php echo $row_testimoni['testimoni_desc']; ?>“
                </p>
                <p class="card-text text-primary font-weight-bold mb-1 fs-15"><?php echo $row_testimoni['testimoni_name']; ?></p>
                <p class="card-text text-muted fs-13 text-uppercase letter-spacing-05 font-weight-500"><?php echo $row_testimoni['testimoni_place']; ?>
                </p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

        </div>
      </div>
    </section>
  </main>