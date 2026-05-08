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
    padding: 32px;
}

/* ─── Form ─── */
.ink-form-group {
    margin-bottom: 22px;
}

.ink-label {
    display: inline-block;
    margin-bottom: 8px;
    font-size: .82rem;
    font-weight: 600;
    color: var(--ink-text, #1c1917);
}

.ink-input,
.ink-select,
.ink-textarea {
    width: 100%;
    border: 1px solid var(--ink-border, #e9e7e1);
    background: var(--ink-soft, #f8f6f2);
    border-radius: 10px;
    padding: 11px 14px;
    font-size: .9rem;
    color: var(--ink-text, #1c1917);
    transition: all .2s ease;
    outline: none;
}

.ink-input:focus,
.ink-select:focus,
.ink-textarea:focus {
    border-color: var(--ink-accent, #c2410c);
    background: #fff;
    box-shadow: 0 0 0 3px rgba(194, 65, 12, .08);
}

.ink-textarea {
    min-height: 180px;
    resize: vertical;
}

/* ─── Upload ─── */
.ink-upload-wrapper {
    border: 2px dashed #ddd6ce;
    border-radius: 12px;
    padding: 24px;
    background: #faf9f7;
    transition: .2s;
}

.ink-upload-wrapper:hover {
    border-color: var(--ink-accent, #c2410c);
}

.image-preview {
    display: block;
    margin-top: 18px;
    width: 220px;
    border-radius: 12px;
    border: 1px solid var(--ink-border, #e9e7e1);
}

/* ─── Image Text ─── */
.ink-image-note {
    display: inline-block;
    margin-top: 14px;
    margin-bottom: 8px;
    font-size: .75rem;
    color: var(--ink-muted, #78716c);
}

/* ─── Alert ─── */
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

/* ─── Button ─── */
.ink-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border: none;
    border-radius: 10px;
    padding: 11px 20px;
    font-size: .85rem;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: .2s;
}

.ink-btn:active {
    transform: scale(.97);
}

.ink-btn-primary {
    background: var(--ink-accent, #c2410c);
    color: #fff;
}

.ink-btn-primary:hover {
    background: #9a3412;
    color: #fff;
}

/* ─── CKEditor ─── */
.ck-editor__editable {
    min-height: 250px;
}

/* ─── Responsive ─── */
@media (max-width: 768px) {
    .ink-content {
        padding: 24px 18px 60px;
    }

    .ink-card {
        padding: 22px;
    }
}
</style>
@endpush

@section('title', 'Update Articles - Admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 ink-content">

    {{-- Header --}}
    <div class="ink-page-header">
        <div>
            <p class="ink-page-header-eyebrow">
                Content Management
            </p>

            <h1 class="ink-page-title">
                Update Article
            </h1>
        </div>
    </div>

    {{-- Error --}}
    @if ($errors->any())
        <div class="ink-alert ink-alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Card --}}
    <div class="ink-card">

        <form action="{{ url('article/'.$article->id) }}" method="post" enctype="multipart/form-data">

            @method('PUT')
            @csrf

            <input type="hidden" name="old_image" value="{{ $article->image }}">

            <div class="row">

                {{-- Title --}}
                <div class="col-md-6">
                    <div class="ink-form-group">

                        <label for="title" class="ink-label">
                            Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="ink-input"
                            value="{{ old('title', $article->title) }}"
                            placeholder="Enter article title"
                        >

                    </div>
                </div>

                {{-- Category --}}
                <div class="col-md-6">
                    <div class="ink-form-group">

                        <label for="category_id" class="ink-label">
                            Category
                        </label>

                        <select
                            name="category_id"
                            id="category_id"
                            class="ink-select"
                        >

                            @foreach ($categories as $item)

                                @if ($item->id == $article->category_id)

                                    <option value="{{ $item->id }}" selected>
                                        {{ $item->name }}
                                    </option>

                                @else

                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>

                                @endif

                            @endforeach

                        </select>

                    </div>
                </div>

            </div>

            {{-- Description --}}
            <div class="ink-form-group">

                <label for="desc" class="ink-label">
                    Description
                </label>

                <textarea
                    name="desc"
                    id="desc"
                    class="ink-textarea"
                >{{ old('desc', $article->desc) }}</textarea>

            </div>

            {{-- Image --}}
            <div class="ink-form-group">

                <label for="image" class="ink-label">
                    Image (Max 2MB)
                </label>

                <div class="ink-upload-wrapper">

                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="ink-input"
                    >

                    <small class="ink-image-note">
                        Current image preview
                    </small>

                    <br>

                    <img
                        src="{{ asset('storage/back/'.$article->image) }}"
                        class="image-preview"
                    >

                </div>

            </div>

            {{-- Status --}}
            <div class="row">

                <div class="col-md-6">

                    <div class="ink-form-group">

                        <label for="status" class="ink-label">
                            Status
                        </label>

                        <select
                            name="status"
                            id="status"
                            class="ink-select"
                        >

                            <option value="" hidden>
                                -- choose status --
                            </option>

                            <option
                                value="1"
                                {{ $article->status == 1 ? 'selected' : null }}
                            >
                                Publish
                            </option>

                            <option
                                value="0"
                                {{ $article->status == 0 ? 'selected' : null }}
                            >
                                Private
                            </option>

                        </select>

                    </div>

                </div>

            </div>

            {{-- Button --}}
            <div class="d-flex justify-content-end mt-4">

                <button
                    type="submit"
                    class="ink-btn ink-btn-primary"
                >
                    Update Article
                </button>

            </div>

        </form>

    </div>

</main>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}',
        clipboard_handleImages: false
    };

    // CKEditor
    CKEDITOR.replace('desc', options);

    // Image Preview
    $("#image").change(function () {
        previewImage(this);
    });

    function previewImage(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {

                $('.image-preview')
                    .attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);

        }
    }
</script>
@endpush
