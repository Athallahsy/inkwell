@foreach ($users as $item)
<div class="modal fade" id="modalDelete{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-sm" style="border-radius:16px; overflow:hidden;">

            {{-- Header --}}
            <div class="modal-header border-0"
                 style="background:#dc2626; padding:20px 24px;">
                <div>
                    <span style="display:block; font-size:.65rem; font-weight:700; letter-spacing:.18em; text-transform:uppercase; color:rgba(255,255,255,.7); margin-bottom:4px;">
                        User Management
                    </span>

                    <h1 class="modal-title fs-5"
                        style="font-family:Georgia,serif; color:#fff; font-weight:700; margin:0;">
                        Delete User
                    </h1>
                </div>

                <button type="button"
                        class="btn-close btn-close-white shadow-none"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>
            </div>

            {{-- Body --}}
            <div class="modal-body" style="padding:24px;">
                <form action="{{ url('users/'.$item->id) }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <div style="
                        background:#fff5f5;
                        border:1px solid #fecaca;
                        border-radius:12px;
                        padding:16px;
                        margin-bottom:20px;
                    ">
                        <p style="margin:0; color:#7f1d1d; font-size:.9rem; line-height:1.6;">
                            Are you sure you want to delete user
                            <strong>{{ $item->name }}</strong> ?
                        </p>
                    </div>

                    {{-- Footer --}}
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button"
                                class="btn"
                                data-bs-dismiss="modal"
                                style="
                                    background:#f5f5f4;
                                    color:#44403c;
                                    border:1px solid #e7e5e4;
                                    border-radius:10px;
                                    padding:10px 18px;
                                    font-size:.85rem;
                                    font-weight:600;
                                ">
                            Cancel
                        </button>

                        <button type="submit"
                                class="btn"
                                style="
                                    background:#dc2626;
                                    color:white;
                                    border:none;
                                    border-radius:10px;
                                    padding:10px 18px;
                                    font-size:.85rem;
                                    font-weight:600;
                                ">
                            Delete User
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endforeach
