<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header d-flex justify-content-between align-items-center">
                        <span>Social Media</span>
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
                                    placeholder="Cari (nama / link)..." autocomplete="off">
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
                                        <th>Nama</th>
                                        <th>Link</th>
                                        <th width="180" class="hidden-phone">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($rows)): ?>
                                        <?php $no = 1;
                                        foreach ($rows as $r): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= htmlspecialchars($r['socialmedia_name']); ?></td>
                                                <td class="text-truncate" style="max-width:360px;">
                                                    <a href="<?= htmlspecialchars($r['socialmedia_link']); ?>" target="_blank" rel="noopener">
                                                        <?= htmlspecialchars($r['socialmedia_link']); ?>
                                                    </a>
                                                </td>
                                                <td class="hidden-phone">
                                                    <a href="<?= site_url('socialmedia/update/' . $r['socialmedia_id']); ?>" class="btn btn-sm btn-warning">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="<?= site_url('socialmedia/delete/' . $r['socialmedia_id']); ?>"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Hapus data ini?');">
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
        <form action="<?= site_url('socialmedia/add'); ?>" method="post" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddTitle">Tambah Social Media</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="add_name">Nama</label>
                    <input type="text" name="socialmedia_name" id="add_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="add_link">Link</label>
                    <input type="url" name="socialmedia_link" id="add_link" class="form-control" placeholder="https://..." required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
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
            <form action="<?= site_url('socialmedia/update_socialmedia/' . $row->socialmedia_id); ?>" method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditTitle">Edit Social Media</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_name">Nama</label>
                        <input type="text" name="socialmedia_name" id="edit_name" class="form-control"
                            value="<?= htmlspecialchars($row->socialmedia_name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_link">Link</label>
                        <input type="url" name="socialmedia_link" id="edit_link" class="form-control"
                            value="<?= htmlspecialchars($row->socialmedia_link); ?>" required>
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
        // Auto-open modal edit
        <?php if (!empty($row)): ?>
            $('#modalEdit').modal('show');
        <?php endif; ?>

        var $table = $('#dynamic-table');
        var hasDataTables = (typeof $.fn !== 'undefined' && typeof $.fn.DataTable !== 'undefined');
        var dt = null;

        if (hasDataTables) {
            // DataTables mode
            dt = $table.DataTable({
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                order: [
                    [0, 'desc']
                ],
                autoWidth: false,
                columnDefs: [{
                        targets: [3],
                        orderable: false
                    } // aksi non-sort
                ]
            });

            $('#searchKeyword').on('keyup change', function() {
                dt.search(this.value).draw();
            });

            // Hide fallback controls
            $('#fallbackRowsPerPage').hide();
            $('#fallbackPager').hide();

        } else {
            // Fallback mode (tanpa DataTables)
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