<!-- Header Start -->
<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>

        </ul>
        <ul class="navbar-nav quick-links d-none d-lg-flex">

        </ul>
        <div class="d-block d-lg-none">
            <img src="{{ asset('storage/profile/logo.png') }}" class="dark-logo" width="180" alt="" />
            <img src="{{ asset('storage/profile/logo.png') }}" class="light-logo" width="180" alt="" />
        </div>
        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between">
                <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                    aria-controls="offcanvasWithBothOptions">
                    <i class="ti ti-align-justified fs-7"></i>
                </a>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">

                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    <img src="{{ asset('storage/profile/images.png') }}" class="rounded-circle"
                                        width="35" height="35" alt="" />
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="py-3 px-7 pb-0">
                                    <h5 class="mb-0 fs-5 fw-semibold">Profil Pengguna</h5>
                                </div>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    <img src="{{ asset('storage/profile/images.png') }}" class="rounded-circle"
                                        width="80" height="80" alt="" />
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3">{{ Auth::user()->name }}</h5>
                                        <span class="mb-1 d-block text-dark">Guru Kelas {{ Auth::user()->role }}</span>
                                        <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                            <i class="ti ti-mail fs-4"></i> {{ Auth::user()->email }}
                                        </p>
                                    </div>
                                </div>

                                <div class="d-grid py-4 px-7 pt-8">
                                    {{-- <div
                                        class="upgrade-plan bg-light-primary position-relative overflow-hidden rounded-4 p-4 mb-9">
                                        <div class="row">
                                            <form action="{{ route('change.password') }}" method="POST">
                                                @csrf
                                                <div class="col-12">
                                                    <div class="mb-2">
                                                        <label for="current_password">Password sekarang</label>
                                                        <input type="password" name="current_password"
                                                            id="current_password" class="form-control">

                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="new_password">Password baru</label>
                                                        <input type="password" name="new_password" id="new_password"
                                                            class="form-control">

                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="new_password_confirmation">Konfirmasi
                                                            password</label>
                                                        <input type="password" name="new_password_confirmation"
                                                            id="new_password_confirmation" class="form-control">
                                                    </div>
                                                    <div class="row px-5">
                                                        <button type="submit"
                                                            class="btn btn-primary mt-3">Kirim</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div> --}}
                                     <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                        class="btn btn-outline-primary">Log Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Header End -->
