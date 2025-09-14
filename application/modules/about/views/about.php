<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header d-flex justify-content-between align-items-center">
                        <span>About Page</span>
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                    </header>

                    <div class="card-body">
                        <form action="<?= site_url('about/update'); ?>" method="post" class="modal-content">
					                
					                    <input type="hidden" name="about_id" id="edit_about_id">
					                    <div class="form-group">
					                        <label for="edit_tittle"><strong>About Tittle</label>
					                        <input type="text" name="about_tittle" id="edit_tittle" class="form-control" value="<?= htmlspecialchars($about_row->about_tittle); ?>" required>
					                    </div>
					                    <div class="form-group">
					                        <label for="about_sub">About Sub</label>
					                        <textarea name="about_sub" id="about_sub" class="form-control"><?= htmlspecialchars($about_row->about_sub); ?></textarea>
					                    </div>
					                    <div class="form-group">
					                        <label for="edit_image"><strong>Image Header</strong></label>
					                        <div class="d-flex align-items-center mb-2">
					                            <?php if (!empty($about_row->about_img_header)): ?>
					                                <img src="<?= base_url('assets/images/' . $about_row->about_img_header); ?>"
					                                    alt="current"
					                                    style="height:48px;width:48px;object-fit:cover;border-radius:6px;margin-right:8px;">
					                            <?php endif; ?>
					                            <span class="text-muted small">Biarkan kosong jika tidak mengubah gambar.</span>
					                        </div>
					                        <input type="file" name="image" id="edit_image" class="form-control" accept="image/*">
					                        <input type="hidden" name="existing_image" value="<?= htmlspecialchars($about_row->about_img_header); ?>">
					                    </div>
					                    
					                    <div class="form-group">
					                        <label for="edit_desc_1"><strong>Description 1</strong></label>
					                        <textarea name="about_desc_1" id="edit_desc_1" class="form-control"><?= htmlspecialchars($about_row->about_desc_1); ?></textarea>
					                    </div>

					                    <div class="form-group">
					                        <label for="edit_desc_2"><strong>Description 2</strong></label>
					                        <textarea name="about_desc_2" id="edit_desc_2" class="form-control"><?= htmlspecialchars($about_row->about_desc_2); ?></textarea>
					                    </div>

					                    <div class="form-group">
					                        <label for="edit_image"><strong>Image 1</strong></label>
					                        <div class="d-flex align-items-center mb-2">
					                            <?php if (!empty($about_row->about_img_1)): ?>
					                                <img src="<?= base_url('assets/images/' . $about_row->about_img_1); ?>"
					                                    alt="current"
					                                    style="height:48px;width:48px;object-fit:cover;border-radius:6px;margin-right:8px;">
					                            <?php endif; ?>
					                            <span class="text-muted small">Biarkan kosong jika tidak mengubah gambar.</span>
					                        </div>
					                        <input type="file" name="image" id="edit_image" class="form-control" accept="image/*">
					                        <input type="hidden" name="existing_image" value="<?= htmlspecialchars($about_row->about_img_1); ?>">
					                    </div>

					                    <div class="form-group">
					                        <label for="edit_desc_3"><strong>Description 3</strong></label>
					                        <textarea name="about_desc_3" id="edit_desc_3" class="form-control"><?= htmlspecialchars($about_row->about_desc_3); ?></textarea>
					                    </div>
					                    <!-- Add more fields as needed -->

					                <div class="modal-footer">
					                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
					                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
					                </div>
					            </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>


</body>

</html>