@extends('back.layout.template')

@push('css')
<style>
/* ─── Page ─── */
.ink-content{
    padding:40px 48px 80px;
    flex:1;
    min-width:0;
}

/* ─── Header ─── */
.ink-page-header{
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin-bottom:28px;
    padding-bottom:20px;
    border-bottom:1px solid var(--ink-border,#e9e7e1);
}

.ink-page-header-eyebrow{
    font-size:.6rem;
    font-weight:700;
    letter-spacing:.2em;
    text-transform:uppercase;
    color:#92400e;
    margin-bottom:4px;
}

.ink-page-title{
    font-family:Georgia,serif;
    font-size:1.6rem;
    font-weight:700;
    color:#1c1917;
    margin:0;
}

/* ─── Alert ─── */
.ink-alert{
    border-radius:10px;
    border-left:3px solid #dc2626;
    background:#fff5f5;
    color:#991b1b;
    padding:12px 16px;
    margin-bottom:20px;
    font-size:.85rem;
}

.ink-alert ul{
    margin:0;
    padding-left:18px;
}

/* ─── Table Card ─── */
.ink-table-card{
    background:#fff;
    border:1px solid #e9e7e1;
    border-radius:14px;
    overflow:hidden;
}

/* ─── Table ─── */
.ink-table{
    width:100%;
    border-collapse:collapse;
}

.ink-table thead th{
    background:#f8f7f4;
    color:#78716c;
    font-size:.68rem;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:.12em;
    padding:16px 20px;
    border-bottom:1px solid #e9e7e1;
}

.ink-table tbody td{
    padding:16px 20px;
    font-size:.88rem;
    color:#1c1917;
    border-bottom:1px solid #f3f1ed;
    vertical-align:middle;
}

.ink-table tbody tr:last-child td{
    border-bottom:none;
}

.ink-table tbody tr:hover td{
    background:#faf9f7;
}

/* ─── Action Button ─── */
.ink-action-group{
    display:flex;
    justify-content:center;
}

.ink-action-btn{
    display:inline-flex;
    align-items:center;
    gap:5px;
    font-size:.75rem;
    font-weight:600;
    padding:6px 12px;
    border-radius:8px;
    border:1px solid #e9e7e1;
    text-decoration:none;
    transition:.2s;
    cursor:pointer;
}

.ink-action-edit{
    background:#f0ede7;
    color:#1c1917;
}

.ink-action-edit:hover{
    background:#e7e1d8;
    border-color:#d6d0c7;
}

/* ─── Pagination ─── */
.ink-pagination{
    margin-top:20px;
}

.ink-pagination .pagination{
    gap:6px;
}

.ink-pagination .page-link{
    border-radius:8px !important;
    border:1px solid #e9e7e1;
    color:#1c1917;
    font-size:.82rem;
    padding:6px 12px;
}

.ink-pagination .page-item.active .page-link{
    background:#92400e;
    border-color:#92400e;
    color:#fff;
}

.ink-pagination .page-link:hover{
    border-color:#92400e;
    color:#92400e;
    background:#fff;
}
</style>
@endpush

@section('title', 'Setting - Admin')

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 ink-content">

    {{-- Header --}}
    <div class="ink-page-header">

        <div>
            <p class="ink-page-header-eyebrow">
                Website Management
            </p>

            <h1 class="ink-page-title">
                Settings
            </h1>
        </div>

    </div>

    {{-- Errors --}}
    @if ($errors->any())
        <div class="ink-alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Alert --}}
    <div class="swal" data-swal="{{ session('success') }}"></div>

    {{-- Table --}}
    <div class="ink-table-card">

        <table class="ink-table">

            <thead>
                <tr>
                    <th width="8%">No</th>
                    <th>Name</th>
                    <th>Value</th>
                    <th width="15%" class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($config as $item => $key)

                <tr>

                    <td>
                        {{ $config->firstItem() + $item }}
                    </td>

                    <td>
                        {{ $key->name }}
                    </td>

                    <td>
                        {{ $key->value }}
                    </td>

                    <td>

                        <div class="ink-action-group">

                            <button
                                class="ink-action-btn ink-action-edit"
                                data-bs-toggle="modal"
                                data-bs-target="#modalUpdate{{$key->id}}"
                            >
                                Edit
                            </button>

                        </div>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    {{-- Pagination --}}
    <div class="ink-pagination">
        {{ $config->links() }}
    </div>

    {{-- Modal --}}
    @include('back.config.update-modal')

</main>

@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

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

</script>
@endpush
