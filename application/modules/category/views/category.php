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
                            <h4 class="card-title mb-0">Manage Categories</h4>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add Category</button>

                            <!-- Table to display categories -->
                            <!-- Tabel untuk menampilkan kategori -->
                            <div id="table-search">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Category Slug</th> <!-- Tambahkan kolom untuk category_slug -->
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($category as $category): ?>
                                            <tr>
                                                <td><?= $category->category_id ?></td>
                                                <td><?= $category->category_name ?></td>
                                                <td><?= $category->category_slug ?></td> <!-- Tampilkan category_slug -->
                                                <td>
                                                    <button class="btn btn-warning btn-sm edit-category"
                                                        data-id="<?= $category->category_id ?>"
                                                        data-category_name="<?= $category->category_name ?>"
                                                        data-category_slug="<?= $category->category_slug ?>"
                                                        data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                                        Edit
                                                    </button>
                                                    <a href="<?= site_url('category/delete/' . $category->category_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- container-fluid -->
    </div><!-- End Page-content -->

    <!-- Modal untuk Menambahkan Category -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= site_url('category/add') ?>" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="categoryName" name="category_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="categorySlug" class="form-label">Category Slug</label> <!-- Tambahkan input untuk slug -->
                            <input type="text" class="form-control" id="categorySlug" name="category_slug" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal untuk Edit Category -->
    <!-- Modal untuk Edit Category -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= site_url('category/update_category/' . (isset($category->category_id) ? $category->category_id : '')) ?>" method="POST">
                    <!-- Input hidden untuk category_id -->
                    <input type="hidden" name="category_id" value="<?= isset($category->category_id) ? $category->category_id : '' ?>">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editCategoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="editCategoryName" name="category_name" value="<?= isset($category->category_name) ? $category->category_name : '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCategorySlug" class="form-label">Category Slug</label>
                            <input type="text" class="form-control" id="editCategorySlug" name="category_slug" value="<?= isset($category->category_slug) ? $category->category_slug : '' ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- <script>
        $('#editCategoryModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Tombol yang mengaktifkan modal
            var categoryId = button.data('category_id'); // Ambil category_id dari data
            var categoryName = button.data('category_name'); // Ambil category_name dari data
            var categorySlug = button.data('category_slug'); // Ambil category_slug dari data

            var modal = $(this);
            modal.find('.modal-body #categoryId').val(categoryId); // Isi input hidden dengan category_id
            modal.find('.modal-body #editCategoryName').val(categoryName); // Isi input dengan category_name
            modal.find('.modal-body #editCategorySlug').val(categorySlug); // Isi input dengan category_slug

            // Set action form untuk update berdasarkan category_id yang benar
            modal.find('form').attr('action', '<?= site_url('category/update_category/') ?>' + categoryId);
        });
    </script> -->

</div>