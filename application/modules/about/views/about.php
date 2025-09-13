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
                        <!-- Flash -->
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                        </div>

                        <!-- Search + Fallback rows/page -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <input id="searchKeyword" type="text" class="form-control"
                                    placeholder="Cari (judul / subjudul)..." autocomplete="off">
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
                                        <th>Judul</th>
                                        <th>Subjudul</th>
                                        <th width="180" class="hidden-phone">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($about)): ?>
                                        <?php $no = 1;
                                        foreach ($about as $r): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= htmlspecialchars($r['about_tittle']); ?></td>
                                                <td><?= htmlspecialchars($r['about_sub']); ?></td>
                                                <td class="hidden-phone">
                                                    <!-- Button to open modal for editing -->
                                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEdit" data-id="<?= $r['about_id'] ?>" data-tittle="<?= $r['about_tittle'] ?>" data-sub="<?= $r['about_sub'] ?>" data-img-header="<?= $r['about_img_header'] ?>" data-desc-1="<?= $r['about_desc_1'] ?>" data-desc-2="<?= $r['about_desc_2'] ?>" data-img-1="<?= $r['about_img_1'] ?>" data-desc-3="<?= $r['about_desc_3'] ?>" data-alamat="<?= $r['about_alamat'] ?>" data-whatsapp="<?= $r['about_whatsapp'] ?>" data-img-2="<?= $r['about_img_2'] ?>" data-desc-footer="<?= $r['about_desc_footer'] ?>">Edit</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Subjudul</th>
                                        <th class="hidden-phone">Aksi</th>
                                    </tr>
                                </tfoot>
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

<!-- Modal: Tambah -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= site_url('about/add'); ?>" method="post" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddTitle">Tambah About</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="add_tittle">Judul</label>
                    <input type="text" name="about_tittle" id="add_tittle" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="add_sub">Subjudul</label>
                    <input type="text" name="about_sub" id="add_sub" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="add_img_header">Image Header</label>
                    <input type="text" name="about_img_header" id="add_img_header" class="form-control">
                </div>
                <div class="form-group">
                    <label for="add_desc_1">Description 1</label>
                    <textarea name="about_desc_1" id="add_desc_1" class="form-control"></textarea>
                </div>
                <!-- Add more fields as needed -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal: Edit (auto-open if $row exists) -->
<?php if (!empty($about)): ?>
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= site_url('about/update'); ?>" method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditTitle">Edit About</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="about_id" id="edit_about_id">
                    <div class="form-group">
                        <label for="edit_tittle">Judul</label>
                        <input type="text" name="about_tittle" id="edit_tittle" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_sub">Subjudul</label>
                        <input type="text" name="about_sub" id="edit_sub" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_img_header">Image Header</label>
                        <input type="text" name="about_img_header" id="edit_img_header" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit_desc_1">Description 1</label>
                        <textarea name="about_desc_1" id="edit_desc_1" class="form-control"></textarea>
                    </div>
                    <!-- Add more fields as needed -->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>

<!-- Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-open modal edit
        <?php if (!empty($about)): ?>
            $('#modalEdit').modal('show');
        <?php endif; ?>

        // Handle modal data population for editing
        $('#modalEdit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            modal.find('#edit_about_id').val(button.data('id'));
            modal.find('#edit_tittle').val(button.data('tittle'));
            modal.find('#edit_sub').val(button.data('sub'));
            modal.find('#edit_img_header').val(button.data('img-header'));
            modal.find('#edit_desc_1').val(button.data('desc-1'));
            // Add more fields as needed
        });

        // Initialize DataTable and search functionality
        var $table = $('#dynamic-table');
        var hasDataTables = (typeof $.fn !== 'undefined' && typeof $.fn.DataTable !== 'undefined');
        var dt = null;

        if (hasDataTables) {
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
                }]
            });

            $('#searchKeyword').on('keyup change', function() {
                dt.search(this.value).draw();
            });

            $('#fallbackRowsPerPage').hide();
            $('#fallbackPager').hide();
        }
    });
</script>

</body>

</html>