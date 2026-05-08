@extends('back.layout.template')

@push('css')
<style>

/* ─── Page ─── */
.ink-content {
    padding: 40px 48px 80px;
    flex: 1;
    min-width: 0;
}

/* ─── Header ─── */
.ink-page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 28px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--ink-border, #e9e7e1);
}

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
    font-size: 1.7rem;
    font-weight: 700;
    color: var(--ink-text, #1c1917);
    margin: 0;
}

/* ─── Buttons ─── */
.ink-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: .84rem;
    font-weight: 600;
    padding: 10px 18px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    transition: .2s;
}

.ink-btn-primary {
    background: var(--ink-accent, #c2410c);
    color: #fff;
}

.ink-btn-primary:hover {
    background: #9a3412;
    color: #fff;
}

/* ─── Alerts ─── */
.ink-alert {
    border-radius: 10px;
    border-left: 3px solid;
    padding: 14px 16px;
    font-size: .85rem;
    margin-bottom: 24px;
}

.ink-alert-danger {
    background: #fff5f5;
    border-color: #dc2626;
    color: #991b1b;
}

.ink-alert-danger ul {
    margin: 0;
    padding-left: 18px;
}

/* ─── Table Card ─── */
.ink-table-card {
    background: #fff;
    border: 1px solid var(--ink-border, #e9e7e1);
    border-radius: 14px;
    overflow: hidden;
}

/* ─── Table ─── */
.ink-table {
    width: 100%;
    border-collapse: collapse;
}

.ink-table thead th {
    background: #f8f6f2;
    color: var(--ink-muted, #78716c);
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .14em;
    text-transform: uppercase;
    padding: 16px 20px;
    border-bottom: 1px solid var(--ink-border, #e9e7e1);
}

.ink-table tbody td {
    padding: 18px 20px;
    font-size: .88rem;
    color: var(--ink-text, #1c1917);
    border-bottom: 1px solid #f3f1ed;
}

.ink-table tbody tr:last-child td {
    border-bottom: none;
}

.ink-table tbody tr:hover td {
    background: #faf9f7;
}

/* ─── Action Buttons ─── */
.ink-action-group {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 4px;
}

.ink-action-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 58px;
    height: 36px;
    padding: 0 14px;
    border-radius: 6px;
    border: none;
    font-size: .78rem;
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
    transition: all .18s ease;
}

/* Edit */
.ink-action-edit {
    background: #0d6efd;
    color: #fff;
}

.ink-action-edit:hover {
    background: #0b5ed7;
    color: #fff;
}

/* Delete */
.ink-action-delete {
    background: #dc3545;
    color: #fff;
}

.ink-action-delete:hover {
    background: #bb2d3b;
    color: #fff;
}

/* ─── Responsive ─── */
@media (max-width: 768px) {

    .ink-content {
        padding: 24px 18px 60px;
    }

    .ink-page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 18px;
    }

    .ink-table-card {
        overflow-x: auto;
    }

    .ink-table {
        min-width: 700px;
    }
}

</style>
@endpush

@section('title', 'Categories - Admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 ink-content">

    {{-- Header --}}
    <div class="ink-page-header">

        <div>
            <p class="ink-page-header-eyebrow">
                Content Management
            </p>

            <h1 class="ink-page-title">
                Categories
            </h1>
        </div>

        <button
            class="ink-btn ink-btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalCreate"
        >
            Create Category
        </button>

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

    {{-- Sweet Alert --}}
    <div class="swal" data-swal="{{ session('success') }}"></div>
    <div class="swal-error" data-swal="{{ session('error') }}"></div>

    {{-- Table --}}
    <div class="ink-table-card">

        <table class="ink-table">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Created At</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($categories as $item)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $item->name }}
                        </td>

                        <td>
                            {{ $item->slug }}
                        </td>

                        <td>
                            {{ $item->created_at }}
                        </td>

                        <td>

                            <div class="ink-action-group">

    <button
        class="ink-action-btn ink-action-edit"
        data-bs-toggle="modal"
        data-bs-target="#modalUpdate{{$item->id}}"
    >
        Edit
    </button>

    <button
        class="ink-action-btn ink-action-delete"
        data-bs-toggle="modal"
        data-bs-target="#modalDelete{{$item->id}}"
    >
        Delete
    </button>

</div>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    {{-- Modal Create --}}
    @include('back.category.create-modal')

    {{-- Modal Update --}}
    @include('back.category.update-modal')

    {{-- Modal Delete --}}
    @include('back.category.delete-modal')

</main>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    // Success Alert
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

    // Error Alert
    const swalError = $('.swal-error').data('swal');

    if (swalError) {

        Swal.fire({
            icon: 'error',
            showConfirmButton: false,
            timer: 2500,
            title: 'Failed!',
            text: swalError
        });

    }

</script>
@endpush
