<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header d-flex justify-content-between align-items-center">
                        <span>Produk</span>
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

                        <div class="mb-3 d-flex flex-wrap gap-2">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                                <i class="fa fa-plus"></i> 
                            </button>
                        </div>

                        <!-- ========================= -->
                        <!-- UI: Search + Filters -->
                        <!-- ========================= -->
                        <div class="row mb-3">
                            <div class="col-md-4 mb-2">
                                <input id="searchKeyword" type="text" class="form-control"
                                    placeholder="Cari produk (teks bebas)..." autocomplete="off">
                            </div>
                            <div class="col-md-4 mb-2">
                                <select id="filterCategory" class="form-control">
                                    <option value="">Semua Kategori</option>
                                    <?php if (!empty($categories)): ?>
                                        <?php foreach ($categories as $c): ?>
                                            <option value="<?= htmlspecialchars($c['category_name']); ?>">
                                                <?= htmlspecialchars($c['category_name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-2 d-flex justify-content-between align-items-center">
                                <select id="filterFavorite" class="form-control mr-2">
                                    <option value="">Semua Status</option>
                                    <option value="yes">Favorit</option>
                                    <option value="no">Bukan Favorit</option>
                                </select>
                                <!-- Selector baris/halaman (fallback only) -->
                                <select id="fallbackRowsPerPage" class="form-control" style="max-width:160px; display:none;">
                                    <option value="5">5 / halaman</option>
                                    <option value="10" selected>10 / halaman</option>
                                    <option value="25">25 / halaman</option>
                                    <option value="50">50 / halaman</option>
                                    <option value="100">100 / halaman</option>
                                </select>
                            </div>
                        </div>

                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="60">#</th>
                                        <th>Gambar</th>
                                        <th>Kategori</th>
                                        <th class="hidden-phone">Favorit</th>
                                        <th class="hidden-phone" width="220">Aksi</th>
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
                                                            style="height:130px;width:130px;object-fit:cover;border-radius:6px;">
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
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="<?= site_url('products/delete/' . $p['product_id']); ?>"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Hapus produk ini?');">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                                
                            </table>

                            <!-- ===== Fallback pager (muncul hanya jika DataTables tidak ada) ===== -->
                            <div id="fallbackPager" class="mt-3 d-flex align-items-center justify-content-between" style="display:none;">
                                <div>
                                    <button id="btnPrev" class="btn btn-sm btn-light mr-2">&laquo; Prev</button>
                                    <span id="pageButtons"></span>
                                    <button id="btnNext" class="btn btn-sm btn-light ml-2">Next &raquo;</button>
                                </div>
                                <div class="text-muted small">
                                    <span id="rangeInfo">Menampilkan 0–0 dari 0</span>
                                </div>
                            </div>
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

                <!-- Kategori -->
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
<!-- Modal: Edit Produk (opsional auto-open) -->
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

                    <!-- Kategori -->
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
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
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
        <?php if (!empty($product)): ?>
            $('#modalEdit').modal('show');
        <?php endif; ?>

        var $table = $('#dynamic-table');
        var hasDataTables = (typeof $.fn !== 'undefined' && typeof $.fn.DataTable !== 'undefined');
        var dt = null;

        if (hasDataTables) {
            // === DataTables mode (paging & search built-in) ===
            dt = $table.DataTable({
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                order: [
                    [0, 'asc']
                ],
                autoWidth: false,
                columnDefs: [{
                    targets: [1, 4],
                    orderable: false
                }]
            });

            // Global search
            $('#searchKeyword').on('keyup change', function() {
                dt.search(this.value).draw();
            });

            // Filter kategori
            $('#filterCategory').on('change', function() {
                var val = this.value;
                dt.column(2).search(val ? '^' + $.fn.dataTable.util.escapeRegex(val) + '$' : '', true, false).draw();
            });

            // Filter favorit
            $('#filterFavorite').on('change', function() {
                var val = this.value;
                dt.column(3).search(val ? '^' + val + '$' : '', true, false).draw();
            });

            // Sembunyikan kontrol fallback
            $('#fallbackRowsPerPage').hide();
            $('#fallbackPager').hide();

        } else {
            // ===== Fallback mode (tanpa DataTables) : paging sama seperti view sebelumnya =====
            var $rows = $table.find('tbody tr');
            var rowsPerPage = parseInt($('#fallbackRowsPerPage').val() || '10', 10);
            var currentPage = 1;
            var filtered = []; // array index baris yg lolos filter

            $('#fallbackRowsPerPage').show();
            $('#fallbackPager').show();

            function recomputeFiltered() {
                filtered = [];
                var keyword = ($('#searchKeyword').val() || '').toLowerCase();
                var cat = ($('#filterCategory').val() || '').toLowerCase();
                var fav = ($('#filterFavorite').val() || '').toLowerCase();

                $rows.each(function(i) {
                    var $tds = $(this).find('td');
                    var textAll = $(this).text().toLowerCase();
                    var kategori = ($tds.eq(2).text() || '').toLowerCase();
                    var favorit = ($tds.eq(3).text() || '').toLowerCase();

                    var passKeyword = !keyword || textAll.indexOf(keyword) !== -1;
                    var passCat = !cat || kategori === cat;
                    var passFav = !fav || favorit.indexOf(fav) !== -1;

                    if (passKeyword && passCat && passFav) filtered.push(i);
                });
            }

            function renderPage() {
                var total = filtered.length;
                var totalPages = Math.max(1, Math.ceil(total / rowsPerPage));
                if (currentPage > totalPages) currentPage = totalPages;
                if (currentPage < 1) currentPage = 1;

                // tampilkan hanya baris pada halaman aktif
                $rows.hide();
                var start = (currentPage - 1) * rowsPerPage;
                var end = Math.min(start + rowsPerPage, total);
                for (var k = start; k < end; k++) $rows.eq(filtered[k]).show();

                // info range
                var rangeStart = total === 0 ? 0 : (start + 1);
                var rangeEnd = end;
                $('#rangeInfo').text('Menampilkan ' + rangeStart + '–' + rangeEnd + ' dari ' + total);

                // tombol pager (windowed 7)
                var $pageButtons = $('#pageButtons').empty();
                var windowSize = 7,
                    half = Math.floor(windowSize / 2);
                var startPage = Math.max(1, currentPage - half);
                var endPage = Math.min(totalPages, startPage + windowSize - 1);
                startPage = Math.max(1, endPage - windowSize + 1);

                function makeBtn(label, page, active) {
                    return $('<button class="btn btn-sm ' + (active ? 'btn-primary' : 'btn-light') + ' mr-1"></button>')
                        .text(label)
                        .on('click', function() {
                            currentPage = page;
                            renderPage();
                        });
                }

                for (var p = startPage; p <= endPage; p++) {
                    $pageButtons.append(makeBtn(p, p, p === currentPage));
                }

                // prev/next
                $('#btnPrev').prop('disabled', currentPage <= 1).off('click').on('click', function() {
                    if (currentPage > 1) {
                        currentPage--;
                        renderPage();
                    }
                });
                $('#btnNext').prop('disabled', currentPage >= totalPages).off('click').on('click', function() {
                    if (currentPage < totalPages) {
                        currentPage++;
                        renderPage();
                    }
                });
            }

            function refilterAndReset() {
                currentPage = 1;
                recomputeFiltered();
                renderPage();
            }

            // events
            $('#searchKeyword, #filterCategory, #filterFavorite').on('keyup change', refilterAndReset);
            $('#fallbackRowsPerPage').on('change', function() {
                rowsPerPage = parseInt(this.value, 10) || 10;
                currentPage = 1;
                renderPage();
            });

            // init
            refilterAndReset();
        }
    });
</script>