@extends('back.layout.template')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endpush

@section('title', 'List Articles - Admin')

@section('content')
     {{-- content --}}
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Articles</h1>
        </div>

        <div class="mt-3" >
            <a href="{{ url('/article/create') }}" class="btn btn-success mb-2">create</a>

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

          <table class="table table-striped table-bordered" id="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th class="text-start">Views</th>
                <th>Status</th>
                <th class="text-start">Publish date</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>

            </tbody>
          </table>
        </div>
      </main>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- alert --}}
<script>
    const swal = $('.swal').data('swal');

    if (swal) {
        Swal.fire({
            icon: 'success', 'showConfirmButton': false, 'timer': 1500,
            title: 'Success',
            text: swal
        });
    }

    function deleteArticle(element) {
    const articleId = element.getAttribute('data-id'); // Mengambil ID artikel dari data-id

    // Menampilkan konfirmasi menggunakan SweetAlert2
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this article?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika user mengonfirmasi, kirimkan permintaan delete ke server
            $.ajax({
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                type: 'DELETE',
                url: '/article/' + articleId, // Gunakan articleId
                dataType: 'json',
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500,
                        title: 'Success',
                        text: 'Article deleted successfully'
                    }).then(() => {
                        window.location.href = '/article'; // Redirect ke halaman artikel setelah delete
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There was an error deleting the article.'
                    });
                    console.error(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
    });
}

</script>

{{-- script datatables --}}
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            processing: true,
            serverside: true,
            ajax: '{{ url()->current() }}',
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'category_id',
                    name: 'category_id'
                },
                {
                    data: 'views',
                    name: 'views'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'publish_date',
                    name: 'publish_date'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });
    });
</script>
@endpush
