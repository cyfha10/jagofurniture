<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header d-flex justify-content-between align-items-center">
                        <span>Banner</span>
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                    </header>

                    <div class="card-body">
                        <!-- Flash -->
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                                <i class="fa fa-plus"></i> 
                            </button>
                        </div>

                        <!-- Search + Fallback rows/page -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <input id="searchKeyword" type="text" class="form-control"
                                    placeholder="Cari (judul / tombol / link)..." autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-2 d-flex justify-content-end">
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
                                        <th>Title</th>
                                        <th>Sub</th>
                                        <th>Image</th>
                                        <th>Button</th>
                                        <th>Link</th>
                                        <th>Category</th>
                                        <th width="200" class="hidden-phone">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($rows)): ?>
                                        <?php $no = 1;
                                        foreach ($rows as $r): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= htmlspecialchars($r['banner_tittle']); ?></td>
                                                <td class="text-truncate" style="max-width:260px;"><?= htmlspecialchars($r['banner_sub']); ?></td>
                                                <td>
                                                    <?php if (!empty($r['banner_images'])): ?>
                                                        <img src="<?= base_url('assets/images/' . $r['banner_images']); ?>" alt="img" style="max-width:100px;height:auto;">
                                                    <?php else: ?>
                                                        <em>-</em>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= htmlspecialchars($r['banner_button']); ?></td>
                                                <td class="text-truncate" style="max-width:260px;">
                                                    <a href="<?= htmlspecialchars($r['banner_buttonlink']); ?>" target="_blank" rel="noopener">
                                                        <?= htmlspecialchars($r['banner_buttonlink']); ?>
                                                    </a>
                                                </td>
                                                <td><?= htmlspecialchars($r['banner_category']); ?></td>
                                                <td class="hidden-phone">
                                                    <a href="<?= site_url('banner/update/' . $r['banner_id']); ?>" class="btn btn-sm btn-warning">
                                                        <i class="fa fa-pencil"></i> 
                                                    </a>
                                                    <a href="<?= site_url('banner/delete/' . $r['banner_id']); ?>"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Hapus banner ini?');">
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
    </section>
</section>

<!-- ========================= -->
<!-- Modal: Tambah -->
<!-- ========================= -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= site_url('banner/add'); ?>" method="post" class="modal-content" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddTitle">Tambah Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="add_tittle">Title</label>
                    <input type="text" name="banner_tittle" id="add_tittle" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="add_sub">Banner Sub</label>
                    <textarea name="banner_sub" id="add_sub" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="add_images">Images</label>
                    <input type="file" name="banner_images" id="add_images" class="form-control" accept="image/*" required>
                    <small class="text-muted">jpg, jpeg, png, gif. Maks 4MB.</small>
                </div>
                <div class="form-group">
                    <label for="add_button">Banner Button</label>
                    <input type="text" name="banner_button" id="add_button" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="add_buttonlink">Banner Button Link</label>
                    <input type="url" name="banner_buttonlink" id="add_buttonlink" class="form-control" placeholder="https://..." required>
                </div>
                <div class="form-group">
                    <label for="add_category">Banner Category</label>
                    <select name="banner_category" id="add_category" class="form-control" required>
                        <option value="banner 1" selected>banner 1</option>
                    </select>
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
<!-- Modal: Edit (auto-open jika $row ada) -->
<!-- ========================= -->
<?php if (!empty($row)): ?>
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= site_url('banner/update_banner/' . $row->banner_id); ?>" method="post" class="modal-content" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditTitle">Edit Banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="old_banner_images" value="<?= htmlspecialchars($row->banner_images); ?>">

                    <div class="form-group">
                        <label for="edit_tittle">Title</label>
                        <input type="text" name="banner_tittle" id="edit_tittle" class="form-control"
                            value="<?= htmlspecialchars($row->banner_tittle); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_sub">Banner Sub</label>
                        <textarea name="banner_sub" id="edit_sub" class="form-control" rows="3" required><?= htmlspecialchars($row->banner_sub); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Current Image</label><br>
                        <?php if (!empty($row->banner_images)): ?>
                            <img src="<?= base_url('assets/images/' . $row->banner_images); ?>" alt="img" style="max-width:120px;height:auto;">
                        <?php else: ?>
                            <em>-</em>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="edit_images">Replace Image</label>
                        <input type="file" name="banner_images" id="edit_images" class="form-control" accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak diganti.</small>
                    </div>

                    <div class="form-group">
                        <label for="edit_button">Banner Button</label>
                        <input type="text" name="banner_button" id="edit_button" class="form-control"
                            value="<?= htmlspecialchars($row->banner_button); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_buttonlink">Banner Button Link</label>
                        <input type="url" name="banner_buttonlink" id="edit_buttonlink" class="form-control" placeholder="https://..."
                            value="<?= htmlspecialchars($row->banner_buttonlink); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_category">Banner Category</label>
                        <select name="banner_category" id="edit_category" class="form-control" required>
                            <option value="banner 1" <?= ($row->banner_category == 'banner 1' ? 'selected' : ''); ?>>banner 1</option>
                        </select>
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
        // Auto-open modal edit bila $row ada
        <?php if (!empty($row)): ?>
            $('#modalEdit').modal('show');
        <?php endif; ?>

        var $table = $('#dynamic-table');
        var hasDataTables = (typeof $.fn !== 'undefined' && typeof $.fn.DataTable !== 'undefined');
        var dt = null;

        if (hasDataTables) {
            // Mode DataTables
            dt = $table.DataTable({
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                order: [
                    [0, 'desc']
                ],
                autoWidth: false,
                columnDefs: [{
                    targets: [7],
                    orderable: false
                }] // kolom Aksi non-sort
            });

            $('#searchKeyword').on('keyup change', function() {
                dt.search(this.value).draw();
            });

            // Sembunyikan kontrol fallback
            $('#fallbackRowsPerPage').hide();
            $('#fallbackPager').hide();

        } else {
            // Fallback mode (tanpa DataTables) -> paging & search manual
            var $rows = $table.find('tbody tr');
            var rowsPerPage = parseInt($('#fallbackRowsPerPage').val() || '10', 10);
            var currentPage = 1;
            var filteredIdx = [];

            $('#fallbackRowsPerPage').show();
            $('#fallbackPager').show();

            function recomputeFiltered() {
                filteredIdx = [];
                var keyword = ($('#searchKeyword').val() || '').toLowerCase();
                $rows.each(function(i) {
                    var textAll = $(this).text().toLowerCase();
                    var pass = !keyword || textAll.indexOf(keyword) !== -1;
                    if (pass) filteredIdx.push(i);
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

            $('#searchKeyword').on('keyup change', refilterAndReset);
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