<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header d-flex justify-content-between align-items-center">
                        <span>Header Pages</span>
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

                        <!-- Search / Controls -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <input id="searchKeyword" type="text" class="form-control" placeholder="Cari (slug / page / title / keywords)..." autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-2 d-flex justify-content-end">
                                <!-- Hanya tampil di fallback -->
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
                                        <th>Logo</th>
                                        <th>Slug</th>
                                        <th>Page</th>
                                        <th>Title</th>
                                        <th>Keywords</th>
                                        <th width="160" class="hidden-phone">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($headers)): ?>
                                        <?php $no = 1;
                                        foreach ($headers as $h): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td>
                                                    <?php $logo = !empty($h['header_logo']) ? $h['header_logo'] : 'logo.png'; ?>
                                                    <img src="<?= base_url('assets/images/' . $logo); ?>" alt="logo" style="height:40px;width:40px;object-fit:cover;border-radius:6px;">
                                                </td>
                                                <td><code><?= htmlspecialchars($h['slug']); ?></code></td>
                                                <td><?= htmlspecialchars($h['header_page']); ?></td>
                                                <td><?= htmlspecialchars($h['header_tittle']); ?></td>
                                                <td class="text-truncate" style="max-width:240px;">
                                                    <?= htmlspecialchars($h['header_keywords']); ?>
                                                </td>
                                                <td class="hidden-phone">
                                                    <a href="<?= site_url('header/update/' . $h['header_id']); ?>" class="btn btn-sm btn-warning">
                                                        <i class="fa fa-pencil"></i> 
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
<!-- Modal: Edit Header (auto-open jika $header_row ada) -->
<!-- ========================= -->
<?php if (!empty($header_row)): ?>
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= site_url('header/update_header/' . $header_row->header_id); ?>" method="post" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditTitle">Edit Header</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="edit_slug">Slug</label>
                        <input type="text" name="slug" id="edit_slug" class="form-control" value="<?= htmlspecialchars($header_row->slug); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_page">Header Page</label>
                        <input type="text" name="header_page" id="edit_page" class="form-control" value="<?= htmlspecialchars($header_row->header_page); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_title">Title</label>
                        <input type="text" name="header_tittle" id="edit_title" class="form-control" value="<?= htmlspecialchars($header_row->header_tittle); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_desc">Description</label>
                        <textarea name="header_description" id="edit_desc" class="form-control" rows="3" required><?= htmlspecialchars($header_row->header_description); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="edit_keywords">Keywords</label>
                        <textarea name="header_keywords" id="edit_keywords" class="form-control" rows="2" required><?= htmlspecialchars($header_row->header_keywords); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="edit_logo">Logo (opsional)</label>
                        <div class="d-flex align-items-center mb-2">
                            <?php if (!empty($header_row->header_logo)): ?>
                                <img src="<?= base_url('assets/images/' . $header_row->header_logo); ?>" alt="current" style="height:48px;width:48px;object-fit:cover;border-radius:6px;margin-right:8px;">
                            <?php endif; ?>
                            <span class="text-muted small">Biarkan kosong jika tidak mengubah logo.</span>
                        </div>
                        <input type="file" name="logo" id="edit_logo" class="form-control" accept="image/*">
                        <input type="hidden" name="existing_logo" value="<?= htmlspecialchars($header_row->header_logo); ?>">
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
        // Auto-open modal edit jika datang dari Header::update($id)
        <?php if (!empty($header_row)): ?>
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
                        targets: [1, 6],
                        orderable: false
                    } // logo & aksi non-sort
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

            refilterAndReset();
        }
    });
</script>