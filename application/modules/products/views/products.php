<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Manage Products</h4>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>

                            <!-- Table to display products -->
                            <div id="table-search">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Product Image</th>
                                            <th>Featured</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($products as $product): ?>
                                            <tr>
                                                <td><?= $product->product_id ?></td>
                                                <td><?= $product->product_category_name ?></td>
                                                <td><img src="<?= base_url('assets/images/product/' . $product->product_images) ?>" width="100" height="100"></td>
                                                <td><?= $product->product_favorite == 'yes' ? 'Yes' : 'No' ?></td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm edit-product"
                                                        data-id="<?= $product->product_id ?>"
                                                        data-category="<?= $product->product_category_id ?>"
                                                        data-category_name="<?= $product->product_category_name ?>"
                                                        data-image="<?= $product->product_images ?>"
                                                        data-featured="<?= $product->product_favorite ?>"
                                                        data-bs-toggle="modal" data-bs-target="#editProductModal">
                                                        Edit
                                                    </button>
                                                    <a href="<?= site_url('products/delete/' . $product->product_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- Modal for Add Product -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= site_url('products/add') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <!-- Category -->
                        <div class="mb-3">
                            <label for="addProductCategory" class="form-label">Category</label>
                            <select class="form-control" id="addProductCategory" name="category" required>
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category->category_id ?>"><?= $category->category_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- Category Name -->
                        <div class="mb-3">
                            <label for="addProductCategoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="addProductCategoryName" name="category_name" required>
                        </div>
                        <!-- Product Image -->
                        <div class="mb-3">
                            <label for="addProductImage" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="addProductImage" name="image" required>
                        </div>
                        <!-- Featured -->
                        <div class="mb-3">
                            <label for="addProductFeatured" class="form-label">Featured</label>
                            <input type="checkbox" id="addProductFeatured" name="featured_status">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for Edit Product -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Form untuk mengedit produk -->
                <form action="<?= site_url('products/update_product/' . $product->product_id) ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $product->product_id ?>"> <!-- Hidden input untuk ID produk -->
                    <div class="modal-body">
                        <!-- Category -->
                        <div class="mb-3">
                            <label for="editProductCategory" class="form-label">Category</label>
                            <select class="form-control" id="editProductCategory" name="category" required>
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category->category_id ?>"
                                        <?= ($category->category_id == $product->product_category_id) ? 'selected' : '' ?>>
                                        <?= $category->category_name ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- Category Name -->
                        <div class="mb-3">
                            <label for="editProductCategoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="editProductCategoryName" name="category_name" value="<?= $product->product_category_name ?>" required>
                        </div>
                        <!-- Product Image -->
                        <div class="mb-3">
                            <label for="editProductImage" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="editProductImage" name="image">
                            <img src="<?= base_url('assets/images/product/' . $product->product_images) ?>" width="100" height="100" />
                        </div>
                        <!-- Featured -->
                        <div class="mb-3">
                            <label for="editProductFeatured" class="form-label">Featured</label>
                            <input type="checkbox" id="editProductFeatured" name="featured_status" <?= ($product->product_favorite == 'yes') ? 'checked' : '' ?>>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>