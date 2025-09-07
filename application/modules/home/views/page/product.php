<main id="content">
	<br><br>
	<section class="py-10">
	  <div class="container">
	    <h1 class="fs-40 mb-1 text-capitalize text-center">Semua Produk</h1>
	  </div>
	</section>
	<section>
	  <div class="container container-xxl">
	    <div class="d-flex mb-7">
	      <div class="d-flex align-items-center text-primary font-weight-500" data-canvas="true"
	           data-canvas-options='{"container":".filter-canvas"}'>
	        <button type="button" class="border-0 pl-0 pr-2 fs-12 bg-transparent">
	          <i class="far fa-align-left"></i>
	        </button>
	        Filter
	      </div>
	      <div class="ml-auto">
	        <div class="dropdown">
	          <a href="#" class="dropdown-toggle fs-14" id="dropdownMenuButton" data-toggle="dropdown"
	                 aria-haspopup="true" aria-expanded="false">
	            Default Sorting
	          </a>
	          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="">
	            <a class="dropdown-item text-primary fs-14" href="#">Price high to low</a>
	            <a class="dropdown-item text-primary fs-14" href="#">Price low to high</a>
	            <a class="dropdown-item text-primary fs-14" href="#">Random</a>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="row mb-7 overflow-hidden">

	    	<?php foreach ($product as $row_product): ?>
	      <div class="col-sm-6 col-lg-3 mb-6" data-animate="fadeInUp">
	        <div class="card border-0 hover-change-content product">
	          <div style="background-image: url('assets/images/product/<?php echo $row_product['product_images']; ?>')" class="card-img ratio bg-img-cover-center ratio-1-1"></div>
	        </div>
	        <div class="card-img-overlay d-flex py-4 py-sm-5 pl-6 pr-4">
            <div class="d-flex flex-column">
              <a href="#" class="font-weight-bold mb-1 d-block lh-12"><?php echo $row_product['product_category_name']?></a>
            </div>
          </div>
	      </div>
	      <?php endforeach; ?>
	      
	    </div>

	    
	    <!-- <nav class="pb-11 pb-lg-14 overflow-hidden">
	      <ul class="pagination justify-content-center align-items-center mb-0">
	        <li class="page-item fs-12 d-none d-sm-block">
	          <a class="page-link" href="#" tabindex="-1"><i class="far fa-angle-double-left"></i></a>
	        </li>
	        <li class="page-item"><a class="page-link" href="#">1</a></li>
	        <li class="page-item active" aria-current="page"><a class="page-link" href="#">2</a></li>
	        <li class="page-item"><a class="page-link" href="#">3</a></li>
	        <li class="page-item"><a class="page-link" href="#">...</a></li>
	        <li class="page-item"><a class="page-link" href="#">6</a></li>
	        <li class="page-item fs-12 d-none d-sm-block">
	          <a class="page-link" href="#"><i class="far fa-angle-double-right"></i></a>
	        </li>
	      </ul>
	    </nav> -->
	  </div>
	</section>
</main>