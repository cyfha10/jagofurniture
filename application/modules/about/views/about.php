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
                        <form action="<?= site_url('about/update'); ?>" method="post" class="modal-content" enctype="multipart/form-data">
                            <input type="hidden" name="about_id" id="edit_about_id">

                            <div class="form-group">
                                <label for="edit_tittle"><strong>About Tittle</strong></label>
                                <input type="text" name="about_tittle" id="edit_tittle" class="form-control" value="<?= htmlspecialchars($about_row->about_tittle); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="about_sub"><strong>About Sub</strong></label>
                                <textarea name="about_sub" id="about_sub" class="form-control wysiwyg"><?= htmlspecialchars($about_row->about_sub); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="edit_desc_1"><strong>Description 1</strong></label>
                                <textarea name="about_desc_1" id="edit_desc_1" class="form-control wysiwyg"><?= htmlspecialchars($about_row->about_desc_1); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="edit_desc_2"><strong>Description 2</strong></label>
                                <textarea name="about_desc_2" id="edit_desc_2" class="form-control wysiwyg"><?= htmlspecialchars($about_row->about_desc_2); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="edit_desc_3"><strong>Description 3</strong></label>
                                <textarea name="about_desc_3" id="edit_desc_3" class="form-control wysiwyg"><?= htmlspecialchars($about_row->about_desc_3); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="about_alamat"><strong>Alamat</strong></label>
                                <textarea name="about_alamat" id="about_alamat" class="form-control wysiwyg"><?= htmlspecialchars($about_row->about_alamat); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="about_whatsapp"><strong>Nomor Whatsapp</strong></label>
                                <textarea name="about_whatsapp" id="about_whatsapp" class="form-control wysiwyg"><?= htmlspecialchars($about_row->about_whatsapp); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="about_desc_footer"><strong>Description Footer</strong></label>
                                <textarea name="about_desc_footer" id="about_desc_footer" class="form-control wysiwyg"><?= htmlspecialchars($about_row->about_desc_footer); ?></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
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
