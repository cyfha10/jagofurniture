<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header d-flex justify-content-between align-items-center">
                        <span>Dynamic Table</span>
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                    </header>

                    <div class="card-body">
                        <!-- Flash messages -->
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                                <i class="fa fa-plus"></i> Tambah Kategori
                            </button>
                        </div>

                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                    <tr>
                                        <th width="60">#</th>
                                        <th>Nama Kategori</th>
                                        <th>Slug</th>
                                        <th width="180" class="hidden-phone">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($categories)): ?>
                                        <?php $no = 1;
                                        foreach ($categories as $c): ?>
                                            <tr class="gradeX">
                                                <td><?= $no++; ?></td>
                                                <td><?= htmlspecialchars($c['category_name'] ?? ''); ?></td>
                                                <td><code><?= htmlspecialchars($c['category_slug'] ?? ''); ?></code></td>
                                                <td class="hidden-phone">
                                                    <a href="<?= site_url('category/update/' . $c['category_id']); ?>" class="btn btn-sm btn-warning">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </a>
                                                    <a href="<?= site_url('category/delete/' . $c['category_id']); ?>"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Hapus kategori ini?');">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kategori</th>
                                        <th>Slug</th>
                                        <th class="hidden-phone">Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>

<!-- Modal: Tambah Kategori -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= site_url('category/add'); ?>" method="post" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddTitle">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- Nama -->
                <div class="form-group">
                    <label for="add_name">Nama Kategori</label>
                    <input type="text" name="category_name" id="add_name" class="form-control" required>
                </div>

                <!-- Slug -->
                <div class="form-group">
                    <label for="add_slug">Slug (opsional)</label>
                    <input type="text" name="category_slug" id="add_slug" class="form-control" placeholder="cth: alat-tulis">
                    <small class="text-muted">Biarkan kosong untuk dibuat otomatis dari nama.</small>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal: Edit Kategori -->
<?php if (!empty($category)): ?>
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= site_url('category/update_category/' . $category->category_id); ?>" method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditTitle">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Nama -->
                    <div class="form-group">
                        <label for="edit_name">Nama Kategori</label>
                        <input type="text" name="category_name" id="edit_name" class="form-control"
                            value="<?= htmlspecialchars($category->category_name); ?>" required>
                    </div>

                    <!-- Slug -->
                    <div class="form-group">
                        <label for="edit_slug">Slug (opsional)</label>
                        <input type="text" name="category_slug" id="edit_slug" class="form-control"
                            value="<?= htmlspecialchars($category->category_slug); ?>" placeholder="cth: alat-tulis">
                        <small class="text-muted">Biarkan kosong untuk dibuat otomatis dari nama.</small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>

<!-- Auto-open modal edit bila datang dari /category/update/{id} -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (!empty($category)): ?>
            $('#modalEdit').modal('show');
        <?php endif; ?>
    });
</script>