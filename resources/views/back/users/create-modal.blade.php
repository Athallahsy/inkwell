<div class="modal fade" id="modalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius:18px; overflow:hidden;">

            {{-- Header --}}
            <div class="modal-header border-0"
                 style="background:#92400e; padding:20px 24px;">

                <div>
                    <p style="margin:0; font-size:.68rem; letter-spacing:.14em; text-transform:uppercase; font-weight:700; color:#fdba74;">
                        User Management
                    </p>

                    <h1 class="modal-title fs-5"
                        style="font-family:Georgia,serif; color:white; margin-top:4px;">
                        Create User
                    </h1>
                </div>

                <button type="button"
                        class="btn-close btn-close-white shadow-none"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            {{-- Body --}}
            <div class="modal-body" style="padding:26px; background:#fcfbf9;">

                <form action="{{ url('users') }}" method="POST">
                    @csrf

                    {{-- Name --}}
                    <div class="mb-4">
                        <label for="name"
                               style="font-size:.74rem; font-weight:700; text-transform:uppercase; letter-spacing:.08em; color:#78716c; margin-bottom:8px; display:block;">
                            Name
                        </label>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="Enter full name"
                               style="border-radius:10px; border:1px solid #e7e5e4; padding:11px 14px; background:white;">

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email"
                               style="font-size:.74rem; font-weight:700; text-transform:uppercase; letter-spacing:.08em; color:#78716c; margin-bottom:8px; display:block;">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="example@mail.com"
                               style="border-radius:10px; border:1px solid #e7e5e4; padding:11px 14px; background:white;">

                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <label for="password"
                               style="font-size:.74rem; font-weight:700; text-transform:uppercase; letter-spacing:.08em; color:#78716c; margin-bottom:8px; display:block;">
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Enter password"
                               style="border-radius:10px; border:1px solid #e7e5e4; padding:11px 14px; background:white;">

                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-4">
                        <label for="confirm_password"
                               style="font-size:.74rem; font-weight:700; text-transform:uppercase; letter-spacing:.08em; color:#78716c; margin-bottom:8px; display:block;">
                            Confirm Password
                        </label>

                        <input type="password"
                               name="confirm_password"
                               id="confirm_password"
                               class="form-control @error('confirm_password') is-invalid @enderror"
                               placeholder="Repeat password"
                               style="border-radius:10px; border:1px solid #e7e5e4; padding:11px 14px; background:white;">

                        @error('confirm_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- Role --}}
                    @if (Auth::user()->isAdmin())
                    <div class="mb-4">
                        <label
                            style="font-size:.74rem; font-weight:700; text-transform:uppercase; letter-spacing:.08em; color:#78716c; margin-bottom:10px; display:block;">
                            Role
                        </label>

                        <div style="display:flex; gap:12px;">

                            <label style="flex:1; cursor:pointer;">
                                <input type="radio"
                                       name="role"
                                       value="admin"
                                       hidden>

                                <div style="padding:12px 14px; border:1px solid #e7e5e4; border-radius:10px; background:white; text-align:center; font-size:.85rem; font-weight:600; color:#1c1917;">
                                    Admin
                                </div>
                            </label>

                            <label style="flex:1; cursor:pointer;">
                                <input type="radio"
                                       name="role"
                                       value="user"
                                       hidden>

                                <div style="padding:12px 14px; border:1px solid #e7e5e4; border-radius:10px; background:white; text-align:center; font-size:.85rem; font-weight:600; color:#1c1917;">
                                    User
                                </div>
                            </label>

                        </div>

                        @error('role')
                        <div class="text-danger mt-2" style="font-size:.8rem;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @endif

                    {{-- Footer --}}
                    <div class="modal-footer border-0 px-0 pb-0 pt-2">

                        <button type="button"
                                class="btn"
                                data-bs-dismiss="modal"
                                style="background:#f5f5f4; color:#44403c; border-radius:10px; padding:10px 18px; font-size:.85rem; font-weight:600;">
                            Cancel
                        </button>

                        <button type="submit"
                                class="btn"
                                style="background:#92400e; color:white; border-radius:10px; padding:10px 20px; font-size:.85rem; font-weight:600;">
                            Save User
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
