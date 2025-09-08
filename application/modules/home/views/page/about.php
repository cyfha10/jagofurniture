<main id="content">
      <section class="d-flex flex-column bg-img-cover-center vh-100 pt-xxl-13 custom-height-sm"
         style="background-image: url('assets/images/<?php echo $about->about_img_header; ?>')">
        <div class="d-flex flex-column h-100 justify-content-center">
          <div class="container container-xxl">
            <h1 class="fs-60 mb-4"><?php echo $about->about_tittle; ?></h1>
            <p class="mb-0 mxw-435px"><?php echo $about->about_sub; ?></p>
          </div>
        </div>
      </section>
      <section class="pt-11 pt-lg-15">
        <div class="container">
          <!-- <div class="mxw-924 mx-auto mb-7">
            <h2 class="fs-30 fs-md-40 lh-15 text-center mb-0">Jago Furniture hadir untuk membantu Anda menciptakan furnitur yang benar-benar mencerminkan kepribadian dan kebutuhan ruang Anda.</h2>
          </div> -->
          <div class="mxw-830 mx-auto mb-8">
            <p class="fs-20 text-primary font-weight-500 mb-5"><?php echo $about->about_desc_1; ?></p>
            <p class="mb-1"><?php echo $about->about_desc_2; ?></p>
          </div>
          <img src="assets/images/<?php echo $about->about_img_1; ?>" alt="Image" class="mb-10">
          <div class="mxw-830 mx-auto">
            
            <p class="mb-0"><?php echo $about->about_desc_3; ?></div>
        </div>
      </section>
      
      
      <section class="py-11 py-lg-15">
        <div class="container">
          <div class="row no-gutters">
            <div class="col-lg-3 mb-8 mb-lg-0">
              <h2 class="fs-30 fs-md-40 lh-15 mb-6 pt-lg-5">Hubungi Kami</h2>
              <p class="font-weight-bold text-primary mb-4">Alamat Bisnis</p>
              <address class="mb-6"><?php echo $about->about_alamat; ?></address>
              <p class="font-weight-bold text-primary mb-3">Phone / WA</p>
              <p class="mb-0"><?php echo $about->about_whatsapp; ?></p>
              <!-- <p class="mb-7">hello@domain.com</p> -->
              <a href="https://wa.me/<?php echo $about->about_whatsapp; ?>" target="_blank" class="btn btn-primary">contact us</a>
            </div>
            <div class="col-lg-9">
              <div class="pl-lg-10">
                <img src="assets/images/<?php echo $about->about_img_2; ?>" alt="Image">
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>