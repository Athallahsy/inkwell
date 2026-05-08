@extends('back.layout.template')

@section('title', 'Dashboard - Admin')

@push('css')
<style>
    :root {
        --ink-bg: #f8f7f4;
        --ink-surface: #ffffff;
        --ink-border: #e9e7e1;
        --ink-text: #1c1917;
        --ink-muted: #78716c;
        --ink-accent: #c2410c;
        --ink-accent-hover: #9a330a;
        --ink-soft: #f0ede7;
    }

    .dash-wrap { padding: 32px 28px 56px; background: var(--ink-bg); min-height: 100vh; }

    /* Page header */
    .dash-page-header { margin-bottom: 28px; padding-bottom: 16px; border-bottom: 1px solid var(--ink-border); display: flex; align-items: flex-end; justify-content: space-between; }
    .dash-page-header h4 { font-family: Georgia, serif; font-size: 1.5rem; font-weight: 700; color: var(--ink-text); margin: 0; }
    .dash-page-header span { font-size: .75rem; color: var(--ink-muted); }

    /* Stat cards */
    .stat-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 28px; }
    .stat-card { background: var(--ink-surface); border: 1px solid var(--ink-border); border-radius: 10px; padding: 20px 22px; display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; transition: box-shadow .2s, transform .2s; }
    .stat-card:hover { box-shadow: 0 6px 20px -6px rgba(0,0,0,.1); transform: translateY(-2px); }
    .stat-label { font-size: .65rem; font-weight: 700; text-transform: uppercase; letter-spacing: .16em; color: var(--ink-muted); margin-bottom: 8px; }
    .stat-value { font-family: Georgia, serif; font-size: 2.2rem; font-weight: 700; color: var(--ink-text); line-height: 1; }
    .stat-sub { font-size: .72rem; color: var(--ink-muted); margin-top: 6px; }
    .stat-icon { width: 42px; height: 42px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .stat-icon svg { width: 20px; height: 20px; stroke-width: 1.75; }
    .stat-icon.orange { background: #fff4ef; color: var(--ink-accent); }
    .stat-icon.blue { background: #eff6ff; color: #2563eb; }
    .stat-icon.green { background: #f0fdf4; color: #16a34a; }
    .stat-icon.violet { background: #f5f3ff; color: #7c3aed; }

    /* Divider label — same as frontend */
    .ink-section-head { display: flex; align-items: center; gap: 14px; margin-bottom: 16px; }
    .ink-section-head h5 { font-family: Georgia, serif; font-size: 1rem; font-weight: 700; margin: 0; white-space: nowrap; color: var(--ink-text); }
    .ink-section-head .line { flex: 1; height: 1px; background: var(--ink-border); }
    .ink-section-head a { font-size: .75rem; color: var(--ink-accent); text-decoration: none; font-weight: 600; white-space: nowrap; }
    .ink-section-head a:hover { text-decoration: underline; }

    /* Tables */
    .dash-card { background: var(--ink-surface); border: 1px solid var(--ink-border); border-radius: 10px; overflow: hidden; }
    .dash-table { width: 100%; border-collapse: collapse; font-size: .84rem; }
    .dash-table th { font-size: .65rem; font-weight: 700; text-transform: uppercase; letter-spacing: .1em; color: var(--ink-muted); padding: 10px 20px; background: var(--ink-bg); border-bottom: 1px solid var(--ink-border); text-align: left; }
    .dash-table td { padding: 11px 20px; border-bottom: 1px solid #f5f4f0; color: var(--ink-text); vertical-align: middle; }
    .dash-table tr:last-child td { border-bottom: none; }
    .dash-table tr:hover td { background: var(--ink-bg); }
    .dash-text-truncate { max-width: 160px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: block; font-weight: 500; }
    .dash-chip { display: inline-block; font-size: .65rem; font-weight: 600; padding: 2px 9px; border-radius: 999px; background: var(--ink-soft); color: #57534e; letter-spacing: .04em; }
    .dash-chip.orange { background: #fff4ef; color: var(--ink-accent); }
    .dash-link { font-size: .76rem; color: var(--ink-accent); font-weight: 600; text-decoration: none; border-bottom: 1px solid transparent; transition: border-color .2s; }
    .dash-link:hover { border-bottom-color: var(--ink-accent); }

    /* Chart */
    .chart-card { background: var(--ink-surface); border: 1px solid var(--ink-border); border-radius: 10px; overflow: hidden; margin-top: 24px; }
    .chart-card canvas { max-height: 260px; }

    @media (max-width: 1024px) { .stat-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 576px) { .stat-grid { grid-template-columns: 1fr; } .dash-wrap { padding: 16px; } }
</style>
@endpush

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="dash-wrap">

    {{-- Page header --}}
    <div class="dash-page-header">
        <h4>Dashboard</h4>
        <span>{{ now()->format('d F Y') }}</span>
    </div>

    {{-- Stat cards --}}
    <div class="stat-grid">

        <div class="stat-card">
            <div>
                <div class="stat-label">Total Articles</div>
                <div class="stat-value">{{ $total_articles }}</div>
                <div class="stat-sub">Published articles</div>
            </div>
            <div class="stat-icon orange">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z"/>
                </svg>
            </div>
        </div>

        <div class="stat-card">
            <div>
                <div class="stat-label">Categories</div>
                <div class="stat-value">{{ $total_categories }}</div>
                <div class="stat-sub">Active categories</div>
            </div>
            <div class="stat-icon blue">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z"/>
                </svg>
            </div>
        </div>

        <div class="stat-card">
            <div>
                <div class="stat-label">Total Users</div>
                <div class="stat-value">{{ \App\Models\User::count() }}</div>
                <div class="stat-sub">Registered users</div>
            </div>
            <div class="stat-icon green">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
                </svg>
            </div>
        </div>

        <div class="stat-card">
            <div>
                <div class="stat-label">Total Views</div>
                <div class="stat-value">{{ \App\Models\Article::sum('views') }}</div>
                <div class="stat-sub">All time views</div>
            </div>
            <div class="stat-icon violet">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>
            </div>
        </div>

    </div>

    {{-- Tables --}}
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="ink-section-head">
                <h5>Latest Articles</h5>
                <span class="line"></span>
                <a href="{{ route('article.index') }}">View all →</a>
            </div>
            <div class="dash-card">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latest_articles as $item)
                        <tr>
                            <td style="color:#d1c9c0; font-size:.78rem;">{{ $loop->iteration }}</td>
                            <td><span class="dash-text-truncate">{{ $item->title }}</span></td>
                            <td><span class="dash-chip">{{ $item->category->name }}</span></td>
                            <td><a href="{{ url('article/'.$item->id) }}" class="dash-link">Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="ink-section-head">
                <h5>Popular Articles</h5>
                <span class="line"></span>
            </div>
            <div class="dash-card">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Views</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($popular_articles as $item)
                        <tr>
                            <td style="color:#d1c9c0; font-size:.78rem;">{{ $loop->iteration }}</td>
                            <td><span class="dash-text-truncate">{{ $item->title }}</span></td>
                            <td><span class="dash-chip orange">{{ $item->views }}x</span></td>
                            <td><a href="{{ url('article/'.$item->id) }}" class="dash-link">Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Chart --}}
    <div class="chart-card">
        <div style="padding: 16px 20px; border-bottom: 1px solid var(--ink-border);">
            <div class="ink-section-head" style="margin-bottom:0;">
                <h5>Articles per Category</h5>
                <span class="line"></span>
            </div>
        </div>
        <div style="padding: 20px 24px;">
            <canvas id="categoryChart"></canvas>
        </div>
    </div>

</div>
</main>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('categoryChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($categories->pluck('name')) !!},
            datasets: [{
                label: 'Articles',
                data: {!! json_encode($categories->pluck('articles_count')) !!},
                backgroundColor: 'rgba(194, 65, 12, 0.1)',
                borderColor: 'rgba(194, 65, 12, 0.85)',
                borderWidth: 2,
                borderRadius: 6,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1c1917',
                    titleColor: '#f9fafb',
                    bodyColor: '#d6d3d1',
                    padding: 10,
                    cornerRadius: 6,
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { font: { size: 11 }, color: '#78716c' }
                },
                y: {
                    beginAtZero: true,
                    grid: { color: '#f0ede7' },
                    ticks: { font: { size: 11 }, color: '#78716c', stepSize: 1 }
                }
            }
        }
    });
});
</script>
@endpush
@endsection 
