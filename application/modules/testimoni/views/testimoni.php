<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header d-flex justify-content-between align-items-center">
                        <span>Testimoni</span>
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

                        <!-- Search + Filter Rate (opsional) -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <input id="searchKeyword" type="text" class="form-control"
                                    placeholder="Cari (nama / tempat / deskripsi / rate)..." autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-2 d-flex justify-content-end align-items-center">
                                <select id="filterRate" class="form-control mr-2" style="max-width:160px;">
                                    <option value="">Semua Rate</option>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                                <!-- Hanya untuk fallback -->
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
                                        <th>Deskripsi</th>
                                        <th>Nama</th>
                                        <th>Tempat</th>
                                        <th width="200" class="hidden-phone">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($testimonis)): ?>
                                        <?php $no = 1;
                                        foreach ($testimonis as $t): ?>
                                            <tr class="gradeX">
                                                <td><?= $no++; ?></td>
                                                <td>
                                                    <?php if (!empty($t['testimoni_images'])): ?>
                                                        <img src="<?= base_url('assets/images/testimoni/' . $t['testimoni_images']); ?>"
                                                            alt="img"
                                                            style="height:120px;width:120px;object-fit:cover;border-radius:6px;">
                                                    <?php else: ?>
                                                        <span class="text-muted">—</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= htmlspecialchars($t['testimoni_desc']); ?></td>
                                                <td><?= htmlspecialchars($t['testimoni_name']); ?></td>
                                                <td><?= htmlspecialchars($t['testimoni_place']); ?></td>
                                                <td class="hidden-phone">
                                                    <a href="<?= site_url('testimoni/update/' . $t['testimoni_id']); ?>"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa fa-pencil"></i> 
                                                    </a>
                                                    <a href="<?= site_url('testimoni/delete/' . $t['testimoni_id']); ?>"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Hapus testimoni ini?');">
                                                        <i class="fa fa-trash"></i> 
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                                
                            </table>

                            <!-- Fallback pager -->
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
<!-- Modal: Tambah Testimoni -->
<!-- ========================= -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= site_url('testimoni/add'); ?>" method="post" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddTitle">Tambah Testimoni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="add_rate">Rate</label>
                    <select name="testimoni_rate" id="add_rate" class="form-control" required>
                        <option value="">-- Pilih Rate --</option>
                        <option>5</option>
                        <option>4</option>
                        <option>3</option>
                        <option>2</option>
                        <option>1</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="add_desc">Deskripsi</label>
                    <textarea name="testimoni_desc" id="add_desc" class="form-control" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="add_name">Nama</label>
                    <input type="text" name="testimoni_name" id="add_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="add_place">Tempat</label>
                    <input type="text" name="testimoni_place" id="add_place" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="add_image">Gambar (opsional)</label>
                    <input type="file" name="image" id="add_image" class="form-control" accept="image/*">
                    <small class="text-muted">Maks 2 MB. Tipe: gif, jpg, png, jpeg, webp.</small>
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
<!-- Modal: Edit Testimoni (auto-open jika ada $testimoni) -->
<!-- ========================= -->
<?php if (!empty($testimoni)): ?>
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= site_url('testimoni/update_testimoni/' . $testimoni->testimoni_id); ?>" method="post" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditTitle">Edit Testimoni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_rate">Rate</label>
                        <select name="testimoni_rate" id="edit_rate" class="form-control" required>
                            <option value="">-- Pilih Rate --</option>
                            <?php for ($r = 5; $r >= 1; $r--): ?>
                                <option value="<?= $r; ?>" <?= ((string)$r === (string)$testimoni->testimoni_rate) ? 'selected' : ''; ?>><?= $r; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit_desc">Deskripsi</label>
                        <textarea name="testimoni_desc" id="edit_desc" class="form-control" rows="3" required><?= htmlspecialchars($testimoni->testimoni_desc); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="edit_name">Nama</label>
                        <input type="text" name="testimoni_name" id="edit_name" class="form-control"
                            value="<?= htmlspecialchars($testimoni->testimoni_name); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_place">Tempat</label>
                        <input type="text" name="testimoni_place" id="edit_place" class="form-control"
                            value="<?= htmlspecialchars($testimoni->testimoni_place); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_image">Gambar (opsional)</label>
                        <div class="d-flex align-items-center mb-2">
                            <?php if (!empty($testimoni->testimoni_images)): ?>
                                <img src="<?= base_url('assets/images/testimoni/' . $testimoni->testimoni_images); ?>"
                                    alt="current"
                                    style="height:48px;width:48px;object-fit:cover;border-radius:6px;margin-right:8px;">
                            <?php endif; ?>
                            <span class="text-muted small">Biarkan kosong jika tidak mengubah gambar.</span>
                        </div>
                        <input type="file" name="image" id="edit_image" class="form-control" accept="image/*">
                        <input type="hidden" name="existing_image" value="<?= htmlspecialchars($testimoni->testimoni_images); ?>">
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
        // buka edit modal otomatis jika ada
        <?php if (!empty($testimoni)): ?>
            $('#modalEdit').modal('show');
        <?php endif; ?>

        var $table = $('#dynamic-table');
        var hasDataTables = (typeof $.fn !== 'undefined' && typeof $.fn.DataTable !== 'undefined');
        var dt = null;

        if (hasDataTables) {
            // ===== DataTables mode =====
            dt = $table.DataTable({
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                order: [
                    [0, 'desc']
                ],
                autoWidth: false,
                columnDefs: [{
                        targets: [1, 6],
                        orderable: false
                    } // gambar & aksi non-sort
                ]
            });

            // global search
            $('#searchKeyword').on('keyup change', function() {
                dt.search(this.value).draw();
            });

            // filter rate (kolom index 2)
            $('#filterRate').on('change', function() {
                var val = this.value;
                dt.column(2).search(val ? '^' + $.fn.dataTable.util.escapeRegex(val) + '$' : '', true, false).draw();
            });

            // sembunyikan kontrol fallback
            $('#fallbackRowsPerPage').hide();
            $('#fallbackPager').hide();

        } else {
            // ===== Fallback mode =====
            var $rows = $table.find('tbody tr');
            var rowsPerPage = parseInt($('#fallbackRowsPerPage').val() || '10', 10);
            var currentPage = 1;
            var filteredIdx = [];

            $('#fallbackRowsPerPage').show();
            $('#fallbackPager').show();

            function recomputeFiltered() {
                filteredIdx = [];
                var keyword = ($('#searchKeyword').val() || '').toLowerCase();
                var rate = ($('#filterRate').val() || '').toLowerCase();

                $rows.each(function(i) {
                    var $tds = $(this).find('td');
                    var textAll = $(this).text().toLowerCase();
                    var rateVal = ($tds.eq(2).text() || '').toLowerCase();

                    var passKeyword = !keyword || textAll.indexOf(keyword) !== -1;
                    var passRate = !rate || rateVal === rate;

                    if (passKeyword && passRate) filteredIdx.push(i);
                });
            }

            function renderPage() {
                var total = filteredIdx.length;
                var totalPages = Math.max(1, Math.ceil(total / rowsPerPage));
                if (currentPage > totalPages) currentPage = totalPages;
                if (currentPage < 1) currentPage = 1;

                $rows.hide();
                var start = (currentPage - 1) * rowsPerPage;
                var end = Math.min(start + rowsPerPage, total);
                for (var k = start; k < end; k++) {
                    $rows.eq(filteredIdx[k]).show();
                }

                var rangeStart = total === 0 ? 0 : (start + 1);
                var rangeEnd = end;
                $('#rangeInfo').text('Menampilkan ' + rangeStart + '–' + rangeEnd + ' dari ' + total);

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

            $('#searchKeyword, #filterRate').on('keyup change', refilterAndReset);
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