<!-- View untuk Edit Testimoni -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit Testimoni</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('testimoni/update_testimoni/' . $testimoni->testimoni_id) ?>" method="POST" enctype="multipart/form-data">
                                <!-- Input hidden untuk testimoni_id -->
                                <input type="hidden" name="testimoni_id" value="<?= $testimoni->testimoni_id ?>">

                                <div class="mb-3">
                                    <label for="editTestimoniRate" class="form-label">Rate</label>
                                    <input type="number" class="form-control" id="editTestimoniRate" name="rate" value="<?= $testimoni->testimoni_rate ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="editTestimoniDesc" class="form-label">Description</label>
                                    <textarea class="form-control" id="editTestimoniDesc" name="desc" required><?= $testimoni->testimoni_desc ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="editTestimoniName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="editTestimoniName" name="name" value="<?= $testimoni->testimoni_name ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="editTestimoniPlace" class="form-label">Place</label>
                                    <input type="text" class="form-control" id="editTestimoniPlace" name="place" value="<?= $testimoni->testimoni_place ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="editTestimoniImage" class="form-label">Image</label>
                                    <img src="<?= base_url('assets/images/testimoni/' . $testimoni->testimoni_images) ?>" width="100" height="100" />
                                    <input type="file" class="form-control" id="editTestimoniImage" name="image">
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update Testimoni</button>
                                    <a href="<?= site_url('testimoni') ?>" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>