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
                            <h4 class="card-title mb-0">Manage Testimonials</h4>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTestimoniModal">Add Testimoni</button>

                            <!-- Table to display testimoni -->
                            <div id="table-search">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Rate</th>
                                            <th>Description</th>
                                            <th>Name</th>
                                            <th>Place</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($testimonis as $testimoni): ?>
                                            <tr>
                                                <td><?= $testimoni->testimoni_id ?></td>
                                                <td><img src="<?= base_url('assets/images/testimoni/' . $testimoni->testimoni_images) ?>" width="100" height="100"></td>
                                                <td><?= $testimoni->testimoni_rate ?></td>
                                                <td><?= $testimoni->testimoni_desc ?></td>
                                                <td><?= $testimoni->testimoni_name ?></td>
                                                <td><?= $testimoni->testimoni_place ?></td>
                                                <td>
                                                    <!-- Button to open Edit Modal -->
                                                    <button class="btn btn-warning btn-sm edit-testimoni"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editTestimoniModal"
                                                        data-id="<?= $testimoni->testimoni_id ?>"
                                                        data-rate="<?= $testimoni->testimoni_rate ?>"
                                                        data-desc="<?= $testimoni->testimoni_desc ?>"
                                                        data-name="<?= $testimoni->testimoni_name ?>"
                                                        data-place="<?= $testimoni->testimoni_place ?>"
                                                        data-image="<?= $testimoni->testimoni_images ?>">
                                                        Edit
                                                    </button>
                                                    <a href="<?= site_url('testimoni/delete/' . $testimoni->testimoni_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
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
</div>
<!-- ============================================================== -->
<!-- End right Content here -->
<!-- ============================================================== -->

<!-- Modal for Add Testimoni -->
<div class="modal fade" id="addTestimoniModal" tabindex="-1" aria-labelledby="addTestimoniModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTestimoniModalLabel">Add Testimoni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('testimoni/add') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="testimoniRate" class="form-label">Rate</label>
                        <input type="number" class="form-control" id="testimoniRate" name="rate" required>
                    </div>
                    <div class="mb-3">
                        <label for="testimoniDesc" class="form-label">Description</label>
                        <textarea class="form-control" id="testimoniDesc" name="desc" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="testimoniName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="testimoniName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="testimoniPlace" class="form-label">Place</label>
                        <input type="text" class="form-control" id="testimoniPlace" name="place" required>
                    </div>
                    <div class="mb-3">
                        <label for="testimoniImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="testimoniImage" name="image" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Testimoni</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Edit Testimoni -->
<div class="modal fade" id="editTestimoniModal" tabindex="-1" aria-labelledby="editTestimoniModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTestimoniModalLabel">Edit Testimoni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('testimoni/update_testimoni') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="testimoni_id" id="editTestimoniId">

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editTestimoniRate" class="form-label">Rate</label>
                        <input type="number" class="form-control" id="editTestimoniRate" name="rate" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTestimoniDesc" class="form-label">Description</label>
                        <textarea class="form-control" id="editTestimoniDesc" name="desc" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editTestimoniName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editTestimoniName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTestimoniPlace" class="form-label">Place</label>
                        <input type="text" class="form-control" id="editTestimoniPlace" name="place" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTestimoniImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="editTestimoniImage" name="image">
                        <img src="" id="editTestimoniImagePreview" width="100" height="100" style="display: none;" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Testimoni</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>