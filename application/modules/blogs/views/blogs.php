<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header d-flex justify-content-between align-items-center">
                        <span>Blog Posts</span>
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                    </header>

                    <div class="card-body">
                        <!-- Flash messages -->
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <!-- Tombol Add -->
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                                <i class="fa fa-plus"></i> Add New Blog
                            </button>
                        </div>

                        <!-- Search functionality -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <form method="get" action="<?= site_url('blogs/index'); ?>">
                                    <input id="searchKeyword" type="text" name="search" class="form-control" placeholder="Search blog..." autocomplete="off" value="<?= isset($search_term) ? $search_term : ''; ?>">
                                    <button type="submit" class="btn btn-secondary mt-2">Search</button>
                                </form>
                            </div>
                        </div>

                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <?php if (!empty($blogs)): ?>
                                        <?php $no = 1;
                                        foreach ($blogs as $blog): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= htmlspecialchars($blog['blog_tittle']); ?></td>
                                                <td><?= htmlspecialchars($blog['blog_slug']); ?></td>
                                                <td><?= date('d-m-Y', strtotime($blog['blog_date'])); ?></td>
                                                <td>
                                                    <!-- Tabel: tombol Edit -->
                                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEdit"
                                                        data-id="<?= $blog['blog_id'] ?>"
                                                        data-slug="<?= htmlspecialchars($blog['blog_slug']) ?>"
                                                        data-title="<?= htmlspecialchars($blog['blog_tittle']) ?>"
                                                        data-date="<?= $blog['blog_date'] ?>"
                                                        data-thumbnail="<?= htmlspecialchars($blog['blog_img_thumbnails']) ?>"
                                                        data-header="<?= htmlspecialchars($blog['blog_img_header']) ?>"
                                                        data-short="<?= htmlspecialchars($blog['blog_short']) ?>"
                                                        data-desc="<?= htmlspecialchars($blog['blog_desc']) ?>">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </button>
                                                    <a href="<?= site_url('blogs/delete/' . $blog['blog_id']); ?>" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Delete this blog?');">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No blogs found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Fallback pager (manual paging) -->
                        <div id="fallbackPager" class="mt-3 d-flex align-items-center justify-content-between">
                            <div>
                                <!-- Pagination Buttons -->
                                <button id="btnPrev" class="btn btn-sm btn-light mr-2">&laquo; Prev</button>
                                <span id="pageButtons"></span>
                                <button id="btnNext" class="btn btn-sm btn-light ml-2">Next &raquo;</button>
                            </div>
                            <div class="text-muted small">
                                <span id="rangeInfo"></span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>

<!-- ========================= -->
<!-- Modal: Add Blog -->
<!-- ========================= -->
<!-- Modal ADD -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="formAdd" action="<?= site_url('blogs/add'); ?>" method="post" class="modal-content" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title">Add New Blog</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="blog_slug" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="blog_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="blog_tittle" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Thumbnail Image</label>
                    <input type="file" name="blog_img_thumbnails" class="form-control" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label>Header Image</label>
                    <input type="file" name="blog_img_header" class="form-control" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="blog_short" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="blog_desc" class="form-control" required></textarea>
                </div>
                <div id="addMsg" class="small text-danger d-none"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- ========================= -->
<!-- Modal: Edit Blog -->
<!-- ========================= -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="formEdit" action="#" method="post" class="modal-content" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title">Edit Blog</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- simpan ID tersembunyi kalau mau -->
                <input type="hidden" id="edit_id">
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="blog_slug" id="edit_blog_slug" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="blog_date" id="edit_blog_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="blog_tittle" id="edit_blog_tittle" class="form-control" required>
                </div>

                <!-- Preview info file lama -->
                <div class="form-group">
                    <label>Current Thumbnail</label>
                    <div id="thumbPreview" class="mb-2"></div>
                    <label>Replace Thumbnail</label>
                    <input type="file" name="blog_img_thumbnails" id="edit_blog_img_thumbnails" class="form-control" accept="image/*">
                </div>
                <div class="form-group">
                    <label>Current Header</label>
                    <div id="headerPreview" class="mb-2"></div>
                    <label>Replace Header</label>
                    <input type="file" name="blog_img_header" id="edit_blog_img_header" class="form-control" accept="image/*">
                </div>

                <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="blog_short" id="edit_blog_short" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="blog_desc" id="edit_blog_desc" class="form-control" required></textarea>
                </div>
                <div id="editMsg" class="small text-danger d-none"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<!-- ========================= -->
<!-- Scripts -->
<!-- ========================= -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ===== Modal EDIT isi data =====
        $('#modalEdit').on('show.bs.modal', function(event) {
            const btn = $(event.relatedTarget);
            const id = btn.data('id');
            const slug = btn.data('slug');
            const title = btn.data('title');
            const date = btn.data('date');
            const thumb = btn.data('thumbnail');
            const head = btn.data('header');
            const srt = btn.data('short');
            const desc = btn.data('desc');

            const modal = $(this);
            modal.find('#edit_id').val(id);
            modal.find('#edit_blog_slug').val(slug);
            modal.find('#edit_blog_tittle').val(title);
            modal.find('#edit_blog_date').val(date);
            modal.find('#edit_blog_short').val(srt);
            modal.find('#edit_blog_desc').val(desc);

            // Preview gambar lama (jangan set value pada input file!)
            const thumbPrev = thumb ? `<img src="<?= base_url(); ?>${thumb}" alt="thumb" style="max-width:120px; height:auto;">` :
                '<em>No thumbnail</em>';
            const headPrev = head ? `<img src="<?= base_url(); ?>${head}" alt="header" style="max-width:120px; height:auto;">` :
                '<em>No header</em>';
            modal.find('#thumbPreview').html(thumbPrev);
            modal.find('#headerPreview').html(headPrev);

            // set action untuk AJAX (dipakai di submit handler)
            $('#formEdit').data('action', '<?= site_url('blogs/edit/'); ?>' + id);
        });

        // ====== ADD via AJAX ======
        $('#formAdd').on('submit', function(e) {
            e.preventDefault();
            const url = $(this).attr('action'); // blogs/add
            const fd = new FormData(this);

            $.ajax({
                url: url,
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(res) {
                    if (res.status === 'success') {
                        location.reload(); // simple refresh table
                    } else {
                        $('#addMsg').removeClass('d-none').text(res.message || 'Failed to add blog.');
                    }
                },
                error: function(xhr) {
                    $('#addMsg').removeClass('d-none').text('Upload/submit error. Cek ukuran/tipe file & permission folder.');
                }
            });
        });

        // ====== EDIT via AJAX ======
        $('#formEdit').on('submit', function(e) {
            e.preventDefault();
            const url = $(this).data('action'); // blogs/edit/{id}
            const fd = new FormData(this);

            $.ajax({
                url: url,
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(res) {
                    if (res.status === 'success') {
                        location.reload();
                    } else {
                        $('#editMsg').removeClass('d-none').text(res.message || 'Failed to update blog.');
                    }
                },
                error: function() {
                    $('#editMsg').removeClass('d-none').text('Upload/submit error. Cek ukuran/tipe file & permission folder.');
                }
            });
        });

        // ====== Paging (client-side) ======
        const rowsPerPage = 10;
        let currentPage = 1;
        const rows = Array.from(document.querySelectorAll('#tableBody tr'));

        function renderPage() {
            const totalRows = rows.length;
            const totalPages = Math.max(1, Math.ceil(totalRows / rowsPerPage));
            const start = (currentPage - 1) * rowsPerPage;
            const end = Math.min(start + rowsPerPage, totalRows);

            rows.forEach((r, i) => r.style.display = (i >= start && i < end) ? '' : 'none');

            const rangeInfo = document.getElementById('rangeInfo');
            if (rangeInfo) rangeInfo.textContent = `Showing ${totalRows ? start + 1 : 0}–${end} of ${totalRows} blogs`;

            const prev = document.getElementById('btnPrev');
            const next = document.getElementById('btnNext');
            if (prev) prev.disabled = currentPage === 1;
            if (next) next.disabled = currentPage === totalPages;

            const container = document.getElementById('pageButtons');
            if (container) {
                container.innerHTML = '';
                const windowSize = 7,
                    half = Math.floor(windowSize / 2);
                let s = Math.max(1, currentPage - half);
                let e = Math.min(totalPages, s + windowSize - 1);
                s = Math.max(1, e - windowSize + 1);

                for (let p = s; p <= e; p++) {
                    const btn = document.createElement('button');
                    btn.className = 'btn btn-sm ' + (p === currentPage ? 'btn-primary' : 'btn-light') + ' mr-1';
                    btn.textContent = p;
                    btn.addEventListener('click', function() {
                        currentPage = p;
                        renderPage();
                    });
                    container.appendChild(btn);
                }
            }
        }
        const prev = document.getElementById('btnPrev');
        const next = document.getElementById('btnNext');
        if (prev) prev.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                renderPage();
            }
        });
        if (next) next.addEventListener('click', () => {
            const totalPages = Math.max(1, Math.ceil(rows.length / rowsPerPage));
            if (currentPage < totalPages) {
                currentPage++;
                renderPage();
            }
        });
        renderPage();

        // ====== Search sederhana (opsional) ======
        const search = document.getElementById('searchKeyword');
        if (search) {
            search.addEventListener('keyup', function() {
                const kw = this.value.toLowerCase();
                rows.forEach(row => {
                    const title = row.cells[1]?.textContent.toLowerCase() || '';
                    row.style.display = title.indexOf(kw) > -1 ? '' : 'none';
                });
            });
        }
    });
</script>