@extends('back.layout.template')

@section('title', 'List Users - Admin')

@section('content')
     {{-- content --}}
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Users</h1>
        </div>

        <div class="mt-3" >
            @if (Auth::user()->isAdmin())
            <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#modalCreate">Register</button>
            @endif

                @if ($errors->any())
                    <div class="my-3">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                {{-- alert --}}
                <div class="swal" data-swal="{{ session('success') }}"></div>


          <table class="table table-striped table-bordered text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Action</th>
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
                            <span class="badge bg-danger">Admin</span>
                        @else
                            <span class="badge bg-info">User</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <div class="text-center">
                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$item->id}}">Edit</button>
                            @if (Auth::user()->isAdmin() && Auth::user()->id !== $item->id)
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$item->id}}">Delete</button>
                            @endif
                        </div>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
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
            icon: 'success', 'showConfirmButton': false, 'timer': 1500,
            title: 'Success',
            text: swal
        });
    }
</script>
@endpush

