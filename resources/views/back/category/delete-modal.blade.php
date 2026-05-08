@foreach ($categories as $item)

<div class="modal fade"
     id="modalDelete{{$item->id}}"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="modalDeleteLabel{{$item->id}}"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 shadow-sm"
             style="border-radius: 16px; overflow: hidden;">

            {{-- Header --}}
            <div class="modal-header border-0 px-4 py-3"
                 style="background: #dc2626;">

                <div>

                    <p class="mb-1 text-uppercase fw-bold"
                       style="
                            font-size: .62rem;
                            letter-spacing: .18em;
                            color: rgba(255,255,255,.7);
                       ">
                        Danger Zone
                    </p>

                    <h1 class="modal-title fs-5 text-white fw-semibold"
                        id="modalDeleteLabel{{$item->id}}">
                        Delete Category
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

                    @method('DELETE')
                    @csrf

                    <div class="mb-4">

                        <div
                            style="
                                background: #fef2f2;
                                border: 1px solid #fecaca;
                                border-radius: 12px;
                                padding: 18px;
                            "
                        >

                            <p class="mb-1 fw-semibold"
                               style="
                                    color: #991b1b;
                                    font-size: .92rem;
                               ">
                                Are you sure?
                            </p>

                            <p class="mb-0"
                               style="
                                    color: #7f1d1d;
                                    font-size: .84rem;
                                    line-height: 1.6;
                               ">
                                You are about to delete category
                                <b>{{ $item->name }}</b>.
                                This action cannot be undone.
                            </p>

                        </div>

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
                                background: #dc2626;
                                border-radius: 9px;
                                padding: 9px 18px;
                                font-size: .83rem;
                                font-weight: 600;
                            "
                        >
                            Delete Category
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endforeach
