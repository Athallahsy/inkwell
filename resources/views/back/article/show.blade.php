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
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--ink-text, #1c1917);
    margin: 0;
}

/* ─── Card ─── */
.ink-card {
    background: #fff;
    border: 1px solid var(--ink-border, #e9e7e1);
    border-radius: 14px;
    overflow: hidden;
}

/* ─── Detail Table ─── */
.ink-detail-table {
    width: 100%;
    border-collapse: collapse;
}

.ink-detail-table tr:not(:last-child) {
    border-bottom: 1px solid #f1efeb;
}

.ink-detail-table th {
    width: 220px;
    padding: 20px 24px;
    vertical-align: top;
    background: #faf9f7;
    font-size: .72rem;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: var(--ink-muted, #78716c);
    font-weight: 700;
}

.ink-detail-table td {
    padding: 20px 24px;
    font-size: .9rem;
    color: var(--ink-text, #1c1917);
    line-height: 1.7;
}

/* ─── Description ─── */
.ink-description {
    line-height: 1.9;
}

.ink-description p:last-child {
    margin-bottom: 0;
}

/* ─── Image ─── */
.ink-image {
    width: 100%;
    max-width: 420px;
    border-radius: 14px;
    border: 1px solid var(--ink-border, #e9e7e1);
    transition: transform .2s ease;
}

.ink-image:hover {
    transform: scale(1.02);
}

/* ─── Badge ─── */
.ink-badge {
    display: inline-block;
    padding: 5px 12px;
    border-radius: 999px;
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .08em;
    text-transform: uppercase;
}

.ink-badge-published {
    background: #dcfce7;
    color: #166534;
}

.ink-badge-private {
    background: #fee2e2;
    color: #b91c1c;
}

/* ─── Button ─── */
.ink-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border: none;
    border-radius: 10px;
    padding: 11px 18px;
    font-size: .85rem;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    transition: .2s;
}

.ink-btn-secondary {
    background: #f5f5f4;
    color: #1c1917;
    border: 1px solid #e7e5e4;
}

.ink-btn-secondary:hover {
    background: #ebe8e2;
    color: #1c1917;
}

/* ─── Footer ─── */
.ink-footer-action {
    margin-top: 24px;
    display: flex;
    justify-content: flex-end;
}

/* ─── Responsive ─── */
@media (max-width: 768px) {

    .ink-content {
        padding: 24px 18px 60px;
    }

    .ink-detail-table,
    .ink-detail-table tbody,
    .ink-detail-table tr,
    .ink-detail-table td,
    .ink-detail-table th {
        display: block;
        width: 100%;
    }

    .ink-detail-table th {
        padding-bottom: 8px;
    }

    .ink-detail-table td {
        padding-top: 0;
    }
}
</style>
@endpush

@section('title', 'Detail Articles - Admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 ink-content">

    {{-- Header --}}
    <div class="ink-page-header">
        <div>
            <p class="ink-page-header-eyebrow">
                Content Management
            </p>

            <h1 class="ink-page-title">
                Detail Article
            </h1>
        </div>
    </div>

    {{-- Card --}}
    <div class="ink-card">

        <table class="ink-detail-table">

            {{-- Title --}}
            <tr>
                <th>Title</th>
                <td>
                    {{ $article->title }}
                </td>
            </tr>

            {{-- Category --}}
            <tr>
                <th>Category</th>
                <td>
                    {{ $article->category->name }}
                </td>
            </tr>

            {{-- Description --}}
            <tr>
                <th>Description</th>
                <td>
                    <div class="ink-description">
                        {!! $article->desc !!}
                    </div>
                </td>
            </tr>

            {{-- Image --}}
            <tr>
                <th>Image</th>
                <td>
                    <a
                        href="{{ asset('storage/back/'.$article->image) }}"
                        target="_blank"
                    >
                        <img
                            src="{{ asset('storage/back/'.$article->image) }}"
                            alt="{{ $article->title }}"
                            class="ink-image"
                        >
                    </a>
                </td>
            </tr>

            {{-- Views --}}
            <tr>
                <th>Views</th>
                <td>
                    {{ $article->views }}
                </td>
            </tr>

            {{-- Status --}}
            <tr>
                <th>Status</th>
                <td>
                    @if ($article->status == 1)
                        <span class="ink-badge ink-badge-published">
                            Published
                        </span>
                    @else
                        <span class="ink-badge ink-badge-private">
                            Private
                        </span>
                    @endif
                </td>
            </tr>

            {{-- Publish Date --}}
            <tr>
                <th>Publish Date</th>
                <td>
                    {{ $article->publish_date }}
                </td>
            </tr>

            {{-- Writer --}}
            <tr>
                <th>Writer</th>
                <td>
                    {{ $article->User->name }}
                </td>
            </tr>

        </table>

    </div>

    {{-- Button --}}
    <div class="ink-footer-action">
        <a href="{{ url('/article') }}" class="ink-btn ink-btn-secondary">
            Back
        </a>
    </div>

</main>
@endsection
