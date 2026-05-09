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
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .18em;
    text-transform: uppercase;
    color: #92400e;
    margin-bottom: 4px;
}

.ink-page-title {
    font-family: Georgia, serif;
    font-size: 1.7rem;
    font-weight: 700;
    color: #1c1917;
    margin: 0;
}

/* ─── Buttons ─── */
.ink-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 8px 16px;
    border-radius: 8px;
    border: none;
    font-size: .82rem;
    font-weight: 600;
    text-decoration: none;
    transition: .2s ease;
    cursor: pointer;
}

.ink-btn-primary {
    background: #92400e;
    color: #fff;
}

.ink-btn-primary:hover {
    background: #78350f;
    color: #fff;
}

/* ─── Alert ─── */
.ink-alert {
    background: #fff7ed;
    border: 1px solid #fdba74;
    color: #9a3412;
    padding: 14px 18px;
    border-radius: 10px;
    margin-bottom: 20px;
    font-size: .85rem;
}

.ink-alert ul {
    margin: 0;
    padding-left: 18px;
}

/* ─── Table ─── */
.ink-table-card {
    background: #fff;
    border: 1px solid #e9e7e1;
    border-radius: 14px;
    overflow: hidden;
}

.ink-table {
    width: 100%;
    margin: 0;
    border-collapse: collapse;
}

.ink-table thead th {
    background: #f8f7f4;
    color: #78716c;
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .12em;
    text-transform: uppercase;
    padding: 14px 18px;
    border-bottom: 1px solid #e9e7e1;
}

.ink-table tbody td {
    padding: 16px 18px;
    font-size: .88rem;
    color: #1c1917;
    border-bottom: 1px solid #f3f1ed;
    vertical-align: middle;
}

.ink-table tbody tr:last-child td {
    border-bottom: none;
}

.ink-table tbody tr:hover td {
    background: #fcfbf9;
}

/* ─── Role Badge ─── */
.ink-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 5px 12px;
    border-radius: 999px;
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .08em;
    text-transform: uppercase;
}

.ink-badge-admin {
    background: #fef2f2;
    color: #b91c1c;
}

.ink-badge-user {
    background: #eff6ff;
    color: #1d4ed8;
}

/* ─── Action Buttons ─── */
.ink-action-group {
    display: flex;
    justify-content: center;
    gap: 8px;
}

.ink-action-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 7px 12px;
    border-radius: 8px;
    font-size: .76rem;
    font-weight: 600;
    border: 1px solid transparent;
    text-decoration: none;
    transition: .2s ease;
    cursor: pointer;
}

.ink-action-edit {
    background: #f5f5f4;
    color: #1c1917;
    border-color: #e7e5e4;
}

.ink-action-edit:hover {
    background: #e7e5e4;
    color: #1c1917;
}

.ink-action-delete {
    background: #fef2f2;
    color: #dc2626;
    border-color: #fecaca;
}

.ink-action-delete:hover {
    background: #fee2e2;
    color: #b91c1c;
}

.ink-action-btn svg {
    width: 14px;
    height: 14px;
    stroke: currentColor;
}
</style>
@endpush

@section('title', 'List Users - Admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 ink-content">

    {{-- Header --}}
    <div class="ink-page-header">
        <div>
            <p class="ink-page-header-eyebrow">Management</p>
            <h1 class="ink-page-title">Users</h1>
        </div>

        @if (Auth::user()->isAdmin())
        <button class="ink-btn ink-btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#modalCreate">
            Register User
        </button>
        @endif
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

    {{-- SweetAlert --}}
    <div class="swal" data-swal="{{ session('success') }}"></div>

    {{-- Table --}}
    <div class="ink-table-card">
        <table class="ink-table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="15%">Role</th>
                    <th width="20%">Created At</th>
                    <th width="18%">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->name }}</td>

                    <td>{{ $item->email }}</td>

                    <td>
                        @if ($item->role == 'admin')
                            <span class="ink-badge ink-badge-admin">Admin</span>
                        @else
                            <span class="ink-badge ink-badge-user">User</span>
                        @endif
                    </td>

                    <td>{{ $item->created_at }}</td>

                    <td>
                        <div class="ink-action-group">

                            {{-- Edit --}}
                            <button class="ink-action-btn ink-action-edit"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalUpdate{{$item->id}}">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="2">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/>
                                </svg>

                                Edit
                            </button>

                            {{-- Delete --}}
                            @if (Auth::user()->isAdmin() && Auth::user()->id !== $item->id)
                            <button class="ink-action-btn ink-action-delete"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalDelete{{$item->id}}">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="2">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M6 7.5h12m-10.5 0v10.125c0 .621.504 1.125 1.125 1.125h6.75c.621 0 1.125-.504 1.125-1.125V7.5M9.75 7.5V5.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V7.5"/>
                                </svg>

                                Delete
                            </button>
                            @endif

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    @include('back.users.create-modal')
    @include('back.users.delete-modal')
    @include('back.users.update-modal')

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
