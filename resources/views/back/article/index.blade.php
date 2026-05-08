@extends('back.layout.template')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
<style>
/* ─── Page ─── */
.ink-content {
    padding: 40px 48px 80px;
    flex: 1;
    min-width: 0;
}

/* ─── Page Header ─── */
.ink-page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 28px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--ink-border, #e9e7e1);
}
.ink-page-header-left {}
.ink-page-header-eyebrow {
    font-size: .6rem;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--ink-accent, #c2410c);
    margin-bottom: 4px;
}
.ink-page-title {
    font-family: Georgia, serif;
    font-size: 1.6rem;
    font-weight: 700;
    color: var(--ink-text, #1c1917);
    margin: 0;
    line-height: 1.2;
}

/* ─── Button ─── */
.ink-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-size: .82rem;
    font-weight: 600;
    padding: 9px 18px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    transition: background .2s, transform .15s;
}
.ink-btn:active { transform: scale(.97); }
.ink-btn-primary {
    background: var(--ink-accent, #c2410c);
    color: #fff;
}
.ink-btn-primary:hover {
    background: var(--ink-accent-hover, #9a330a);
    color: #fff;
}
.ink-btn-primary svg { width: 15px; height: 15px; stroke: #fff; }

/* ─── Alert ─── */
.ink-alert {
    border-radius: 10px;
    border-left: 3px solid;
    padding: 12px 16px;
    font-size: .85rem;
    margin-bottom: 20px;
}
.ink-alert-danger {
    background: #fff5f5;
    border-color: #dc2626;
    color: #991b1b;
}
.ink-alert-danger ul { margin: 0; padding-left: 16px; }

/* ─── Table Card ─── */
.ink-table-card {
    background: #fff;
    border: 1px solid var(--ink-border, #e9e7e1);
    border-radius: 12px;
    overflow: hidden;
}

/* ─── DataTables overrides ─── */
.ink-table-card .dataTables_wrapper {
    padding: 0;
}
.ink-table-card .dataTables_wrapper .dataTables_length { padding: 20px 24px 12px !important; }
.ink-table-card .dataTables_wrapper .dataTables_filter { padding: 20px 24px 12px !important; }
.ink-table-card .dataTables_wrapper .dataTables_info   { padding: 16px 24px 20px !important; }
.ink-table-card .dataTables_wrapper .dataTables_paginate { padding: 16px 24px 20px !important; }

#dataTable.dataTable thead tr th:first-child,
#dataTable.dataTable tbody tr td:first-child { padding-left: 24px !important; }

#dataTable.dataTable thead tr th:last-child,
#dataTable.dataTable tbody tr td:last-child  { padding-right: 24px !important; }
.ink-table-card .dataTables_filter input {
    border: 1px solid var(--ink-border, #e9e7e1);
    border-radius: 8px;
    padding: 6px 12px;
    font-size: .83rem;
    color: var(--ink-text, #1c1917);
    background: var(--ink-soft, #f0ede7);
    outline: none;
    transition: border-color .2s;
}
.ink-table-card .dataTables_filter input:focus {
    border-color: var(--ink-accent, #c2410c);
    background: #fff;
}
.ink-table-card .dataTables_length select {
    border: 1px solid var(--ink-border, #e9e7e1);
    border-radius: 8px;
    padding: 5px 10px;
    font-size: .83rem;
    background: var(--ink-soft, #f0ede7);
    color: var(--ink-text, #1c1917);
}

/* Table itself */
#dataTable {
    border-collapse: separate !important;
    border-spacing: 0;
    width: 100% !important;
}
#dataTable thead tr th {
    background: var(--ink-soft, #f0ede7);
    color: var(--ink-muted, #78716c);
    font-size: .65rem;
    font-weight: 700;
    letter-spacing: .14em;
    text-transform: uppercase;
    padding: 12px 16px;
    border-bottom: 1px solid var(--ink-border, #e9e7e1);
    border-top: none;
    white-space: nowrap;
}
#dataTable tbody tr td {
    padding: 14px 16px;
    font-size: .85rem;
    color: var(--ink-text, #1c1917);
    border-bottom: 1px solid #f3f1ed;
    vertical-align: middle;
}
#dataTable tbody tr:last-child td { border-bottom: none; }
#dataTable tbody tr:hover td { background: #faf9f7; }

/* ─── Status badge ─── */
.ink-badge {
    display: inline-block;
    font-size: .65rem;
    font-weight: 700;
    letter-spacing: .08em;
    text-transform: uppercase;
    padding: 3px 10px;
    border-radius: 999px;
}
.ink-badge-published { background: #dcfce7; color: #166534; }
.ink-badge-draft     { background: #f3f1ed; color: #78716c; }

/* ─── Action buttons ─── */
.ink-action-group { display: flex; gap: 6px; }
.ink-action-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: .75rem;
    font-weight: 600;
    padding: 5px 11px;
    border-radius: 7px;
    border: 1px solid transparent;
    cursor: pointer;
    text-decoration: none;
    transition: background .18s, border-color .18s;
}
.ink-action-edit {
    background: var(--ink-soft, #f0ede7);
    color: var(--ink-text, #1c1917);
    border-color: var(--ink-border, #e9e7e1);
}
.ink-action-edit:hover {
    background: #e8e3db;
    color: var(--ink-text, #1c1917);
    border-color: #ccc8c0;
}
.ink-action-delete {
    background: #fff5f5;
    color: #dc2626;
    border-color: #fecaca;
}
.ink-action-delete:hover {
    background: #fee2e2;
    border-color: #fca5a5;
    color: #b91c1c;
}
.ink-action-btn svg { width: 13px; height: 13px; stroke: currentColor; }

/* Pagination */
.ink-table-card .page-link {
    color: var(--ink-text, #1c1917);
    border: 1px solid var(--ink-border, #e9e7e1);
    border-radius: 7px !important;
    font-size: .82rem;
    padding: 6px 12px;
    margin: 0 2px;
    transition: border-color .2s, color .2s;
}
.ink-table-card .page-link:hover {
    border-color: var(--ink-accent, #c2410c);
    color: var(--ink-accent, #c2410c);
    background: #fff;
}
.ink-table-card .page-item.active .page-link {
    background: var(--ink-accent, #c2410c);
    border-color: var(--ink-accent, #c2410c);
    color: #fff;
}
</style>
@endpush

@section('title', 'Articles')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 ink-content">

    {{-- Page Header --}}
    <div class="ink-page-header">
        <div class="ink-page-header-left">
            <p class="ink-page-header-eyebrow">Content Management</p>
            <h1 class="ink-page-title">Articles</h1>
        </div>
        <a href="{{ url('/article/create') }}" class="ink-btn ink-btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
            </svg>
            New Article
        </a>
    </div>

    {{-- Errors --}}
    @if ($errors->any())
    <div class="ink-alert ink-alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- SweetAlert trigger --}}
    <div class="swal" data-swal="{{ session('success') }}"></div>

    {{-- Table Card --}}
    <table id="dataTable" class="table" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Views</th>
                <th>Status</th>
                <th>Publish Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

</main>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // SweetAlert success toast
    const swal = $('.swal').data('swal');
    if (swal) {
        Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
            title: 'Success',
            text: swal
        });
    }

    // Delete handler
    function deleteArticle(element) {
        const articleId = element.getAttribute('data-id');
        Swal.fire({
            title: 'Delete this article?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#c2410c',
            cancelButtonColor: '#78716c',
            confirmButtonText: 'Yes, delete it',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
                    url: '/article/' + articleId,
                    dataType: 'json',
                    success: function () {
                        Swal.fire({ icon: 'success', showConfirmButton: false, timer: 1500, title: 'Deleted!', text: 'Article removed successfully.' })
                            .then(() => window.location.href = '/article');
                    },
                    error: function (xhr) {
                        Swal.fire({ icon: 'error', title: 'Error', text: 'Failed to delete article.' });
                        console.error(xhr.status, xhr.responseText);
                    }
                });
            }
        });
    }
</script>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url()->current() }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'title',       name: 'title' },
                { data: 'category_id', name: 'category_id' },
                { data: 'views',       name: 'views' },
                { data: 'status',      name: 'status' },
                { data: 'publish_date',name: 'publish_date' },
                { data: 'action',      name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush
