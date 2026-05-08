@foreach ($categories as $item)

<div class="modal fade"
     id="modalUpdate{{$item->id}}"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="modalUpdateLabel{{$item->id}}"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 shadow-sm"
             style="border-radius: 16px; overflow: hidden;">

            {{-- Header --}}
            <div class="modal-header border-0 px-4 py-3"
                 style="background: #92400e;">

                <div>

                    <p class="mb-1 text-uppercase fw-bold"
                       style="
                            font-size: .62rem;
                            letter-spacing: .18em;
                            color: rgba(255,255,255,.7);
                       ">
                        Content Management
                    </p>

                    <h1 class="modal-title fs-5 text-white fw-semibold"
                        id="modalUpdateLabel{{$item->id}}">
                        Update Category
                    </h1>

                </div>

                <button type="button"
                        class="btn-close btn-close-white shadow-none"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>

            </div>

            {{-- Body --}}
            <div class="modal-body p-4">

                <form action="{{ url('categories/'.$item->id) }}"
                      method="POST">

                    @method('PUT')
                    @csrf

                    <div class="mb-4">

                        <label for="name"
                               class="form-label fw-semibold mb-2"
                               style="
                                    font-size: .86rem;
                                    color: #44403c;
                               ">
                            Category Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $item->name) }}"
                            placeholder="Enter category name"
                            style="
                                border-radius: 10px;
                                border: 1px solid #e7e5e4;
                                padding: 11px 14px;
                                font-size: .88rem;
                                background: #fafaf9;
                                box-shadow: none;
                            "
                        >

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Footer --}}
                    <div class="d-flex justify-content-end gap-2">

                        <button
                            type="button"
                            class="btn"
                            data-bs-dismiss="modal"
                            style="
                                background: #f5f5f4;
                                color: #57534e;
                                border-radius: 9px;
                                padding: 9px 16px;
                                font-size: .83rem;
                                font-weight: 600;
                            "
                        >
                            Cancel
                        </button>

                        <button
                            type="submit"
                            class="btn text-white"
                            style="
                                background: #92400e;
                                border-radius: 9px;
                                padding: 9px 18px;
                                font-size: .83rem;
                                font-weight: 600;
                            "
                        >
                            Update Category
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endforeach
