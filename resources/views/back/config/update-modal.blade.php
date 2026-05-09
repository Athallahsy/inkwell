@foreach ($config as $item)

<div
    class="modal fade"
    id="modalUpdate{{$item->id}}"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div
            class="modal-content"
            style="
                border:none;
                border-radius:16px;
                overflow:hidden;
            "
        >

            {{-- Header --}}
            <div
                class="modal-header"
                style="
                    background:#92400e;
                    border:none;
                    padding:18px 22px;
                "
            >

                <div>

                    <p
                        style="
                            margin:0;
                            font-size:.62rem;
                            letter-spacing:.18em;
                            text-transform:uppercase;
                            color:#fdba74;
                            font-weight:700;
                        "
                    >
                        Website Setting
                    </p>

                    <h1
                        class="modal-title"
                        style="
                            margin:4px 0 0;
                            font-size:1.1rem;
                            font-weight:700;
                            color:white;
                            font-family:Georgia,serif;
                        "
                    >
                        Update Setting
                    </h1>

                </div>

                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>

            </div>

            {{-- Body --}}
            <div
                class="modal-body"
                style="
                    padding:24px;
                    background:#fff;
                "
            >

                <form
                    action="{{ url('config/'.$item->id) }}"
                    method="post"
                    enctype="multipart/form-data"
                >

                    @method('PUT')
                    @csrf

                    {{-- Name --}}
                    <div class="mb-3">

                        <label
                            for="name"
                            style="
                                display:block;
                                margin-bottom:8px;
                                font-size:.74rem;
                                font-weight:700;
                                letter-spacing:.08em;
                                text-transform:uppercase;
                                color:#78716c;
                            "
                        >
                            Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            readonly
                            value="{{ old('name', $item->name) }}"

                            class="form-control @error('name') is-invalid @enderror"

                            style="
                                border-radius:10px;
                                border:1px solid #e7e5e4;
                                background:#f5f5f4;
                                padding:11px 14px;
                                font-size:.9rem;
                                color:#57534e;
                            "
                        >

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Value --}}
                    <div class="mb-3">

                        <label
                            for="value"
                            style="
                                display:block;
                                margin-bottom:8px;
                                font-size:.74rem;
                                font-weight:700;
                                letter-spacing:.08em;
                                text-transform:uppercase;
                                color:#78716c;
                            "
                        >
                            Value
                        </label>

                        <textarea
                            name="value"
                            id="value"
                            rows="5"

                            class="form-control @error('value') is-invalid @enderror"

                            style="
                                border-radius:10px;
                                border:1px solid #e7e5e4;
                                background:#fafaf9;
                                padding:12px 14px;
                                font-size:.9rem;
                                color:#1c1917;
                                resize:none;
                            "
                        >{{ old('value', $item->value) }}</textarea>

                        @error('value')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Logo --}}
                    <div class="mb-3">

                        <label
                            for="logo"
                            style="
                                display:block;
                                margin-bottom:8px;
                                font-size:.74rem;
                                font-weight:700;
                                letter-spacing:.08em;
                                text-transform:uppercase;
                                color:#78716c;
                            "
                        >
                            Logo (500 × 132)
                        </label>

                        <input
                            type="file"
                            name="logo"
                            id="logo"

                            class="form-control @error('logo') is-invalid @enderror"

                            style="
                                border-radius:10px;
                                border:1px solid #e7e5e4;
                                background:#fafaf9;
                                padding:10px 14px;
                                font-size:.88rem;
                            "
                        >

                        @error('logo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Footer --}}
                    <div
                        class="modal-footer"
                        style="
                            border:none;
                            padding:0;
                            margin-top:24px;
                            gap:10px;
                        "
                    >

                        <button
                            type="button"
                            data-bs-dismiss="modal"

                            style="
                                border:1px solid #d6d3d1;
                                background:#fff;
                                color:#57534e;
                                padding:10px 18px;
                                border-radius:10px;
                                font-size:.85rem;
                                font-weight:600;
                                transition:.2s;
                            "
                        >
                            Cancel
                        </button>

                        <button
                            type="submit"

                            style="
                                border:none;
                                background:#92400e;
                                color:#fff;
                                padding:10px 18px;
                                border-radius:10px;
                                font-size:.85rem;
                                font-weight:600;
                                transition:.2s;
                            "
                        >
                            Save Changes
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endforeach
