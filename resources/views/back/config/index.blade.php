@extends('back.layout.template')

@section('title', 'Setting - Admin')

@section('content')
     {{-- content --}}
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Setting</h1>
        </div>

        <div class="mt-3" >

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
                <th>Value</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($config as $item => $key)
                <tr>
                    <td>{{ $config->firstItem() + $item }}</td>
                    <td>{{ $key->name }}</td>
                    <td>{{ $key->value }}</td>
                    <td>
                        <div class="text-center">
                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$key->id}}">Edit</button>
                        </div>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div>
            {{ $config->links() }}
          </div>
        </div>
        {{-- modal update --}}
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
            icon: 'success', 'showConfirmButton': false, 'timer': 1500,
            title: 'Success',
            text: swal
        });
    }
</script>
@endpush

