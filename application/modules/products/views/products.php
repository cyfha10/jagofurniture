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
                                <i class="fa fa-plus"></i> Tambah Produk
                            </button>
                        </div>

                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                    <tr>
                                        <th width="60">#</th>
                                        <th>Gambar</th>
                                        <th>Kategori</th>
                                        <th class="hidden-phone">Favorit</th>
                                        <th class="hidden-phone" width="180">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($products)): ?>
                                        <?php $no = 1;
                                        foreach ($products as $p): ?>
                                            <tr class="gradeX">
                                                <td><?= $no++; ?></td>
                                                <td>
                                                    <?php if (!empty($p['product_images'])): ?>
                                                        <img src="<?= base_url('assets/images/product/' . $p['product_images']); ?>"
                                                            alt="img"
                                                            style="height:48px;width:48px;object-fit:cover;border-radius:6px;">
                                                    <?php else: ?>
                                                        <span class="text-muted">—</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= htmlspecialchars($p['product_category_name'] ?? ''); ?></td>
                                                <td class="center hidden-phone">
                                                    <?php if (($p['product_favorite'] ?? 'no') === 'yes'): ?>
                                                        <span class="badge badge-success">yes</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-secondary">no</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="center hidden-phone">
                                                    <a href="<?= site_url('products/update/' . $p['product_id']); ?>" class="btn btn-sm btn-warning">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </a>
                                                    <a href="<?= site_url('products/delete/' . $p['product_id']); ?>"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Hapus produk ini?');">
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
                                        <th>Gambar</th>
                                        <th>Kategori</th>
                                        <th class="hidden-phone">Favorit</th>
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

<!-- ========================= -->
<!-- Modal: Tambah Produk -->
<!-- ========================= -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= site_url('products/add'); ?>" method="post" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddTitle">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <!-- Kategori (ID saja; nama akan diisi otomatis di controller) -->
                <div class="form-group">
                    <label for="add_category">Kategori</label>
                    <select name="category" id="add_category" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $c): ?>
                                <option value="<?= $c['category_id']; ?>">
                                    <?= htmlspecialchars($c['category_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <!-- Gambar -->
                <div class="form-group">
                    <label for="add_image">Gambar</label>
                    <input type="file" name="image" id="add_image" class="form-control" accept="image/*">
                    <small class="text-muted">Maks 2 MB. Tipe: gif, jpg, png, jpeg, webp.</small>
                </div>

                <!-- Favorit -->
                <div class="form-group form-check">
                    <input type="checkbox" name="featured_status" id="add_favorite" class="form-check-input">
                    <label for="add_favorite" class="form-check-label">Tandai sebagai favorit</label>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- ========================= -->
<!-- Modal: Edit Produk -->
<!-- ========================= -->
<?php if (!empty($product)): ?>
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= site_url('products/update_product/' . $product->product_id); ?>" method="post" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditTitle">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <!-- Kategori (ID saja; nama akan diisi otomatis di controller) -->
                    <div class="form-group">
                        <label for="edit_category">Kategori</label>
                        <select name="category" id="edit_category" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php if (!empty($categories)): ?>
                                <?php foreach ($categories as $c): ?>
                                    <option value="<?= $c['category_id']; ?>"
                                        <?= ((string)$c['category_id'] === (string)$product->product_category_id) ? 'selected' : ''; ?>>
                                        <?= htmlspecialchars($c['category_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <!-- Gambar -->
                    <div class="form-group">
                        <label for="edit_image">Gambar</label>
                        <div class="d-flex align-items-center mb-2">
                            <?php if (!empty($product->product_images)): ?>
                                <img src="<?= base_url('assets/images/product/' . $product->product_images); ?>"
                                    alt="current"
                                    style="height:48px;width:48px;object-fit:cover;border-radius:6px;margin-right:8px;">
                            <?php endif; ?>
                            <span class="text-muted small">Biarkan kosong jika tidak mengubah gambar.</span>
                        </div>
                        <input type="file" name="image" id="edit_image" class="form-control" accept="image/*">
                        <input type="hidden" name="existing_image" value="<?= htmlspecialchars($product->product_images); ?>">
                    </div>

                    <!-- Favorit -->
                    <div class="form-group form-check">
                        <input type="checkbox" name="featured_status" id="edit_favorite" class="form-check-input"
                            <?= ($product->product_favorite === 'yes') ? 'checked' : ''; ?>>
                        <label for="edit_favorite" class="form-check-label">Tandai sebagai favorit</label>
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

<!-- ========================= -->
<!-- Scripts -->
<!-- ========================= -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Jika datang dari Products::update($id), buka modal edit otomatis
        <?php if (!empty($product)): ?>
            $('#modalEdit').modal('show');
        <?php endif; ?>
    });
</script>