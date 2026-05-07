@extends('back.layout.template')

@section('title', 'Dashboard - Admin')

@section('content')
     {{-- content --}}
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card text-bg-primary mb-3" style="max-width: 100%;">
                    <div class="card-header">Total Articles</div>
                    <div class="card-body">
                      <h4 class="card-title mb-4">{{$total_articles}} Articles</h4>
                      <p class="card-text">
                        <a href="{{route('article.index')}}" class="btn btn-light">view</a>
                      </p>
                    </div>
                  </div>
            </div>

            <div class="col-6">
                <div class="card text-bg-secondary mb-3" style="max-width: 100%;">
                    <div class="card-header">Total Categories</div>
                    <div class="card-body">
                      <h4 class="card-title mb-4">{{$total_categories}} Categories</h4>
                      <p class="card-text">
                        <a href="{{url('categories')}}" class="btn btn-light">view</a>
                    </p>
                    </div>
                  </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <h4>Latest Article</h4>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($latest_articles as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{url('article/'.$item->id)}}" class="btn btn-secondary btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>

            <div class="col-6">
                <h4>Popular Article</h4>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Views</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($popular_articles as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->views }} x</td>
                                <td class="text-center">
                                    <a href="{{url('article/'.$item->id)}}" class="btn btn-secondary btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="container mt-5">
                <h2>Category Statistics</h2>
                <canvas id="categoryChart" width="500" height="500"></canvas>
            </div>
        </div>
      </main>
      @push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('categoryChart').getContext('2d');
        const categoryChart = new Chart(ctx, {
            type: 'pie', // atau 'pie', 'line', sesuai kebutuhan
            data: {
                labels: {!! json_encode($categories->pluck('name')) !!}, // Label kategori
                datasets: [{
                    label: 'Number of Articles per Category',
                    data: {!! json_encode($categories->pluck('articles_count')) !!}, // Jumlah artikel di tiap kategori
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endpush
@endsection


