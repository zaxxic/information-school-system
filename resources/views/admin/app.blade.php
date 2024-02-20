<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jul 2023 01:56:39 GMT -->

<head>
    <!--  Title -->
    <title>Mordenize</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    @yield('link')
    <link rel="shortcut icon" type="image/png"
        href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('asset/admin/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@latest/dist/sweetalert2.all.min.js"></script>

    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('asset/admin/dist/css/style.min.css') }}" />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
            alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
            alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="index-2.html" class="text-nowrap logo-img">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/dark-logo.svg"
                            class="dark-logo" width="180" alt="" />
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/light-logo.svg"
                            class="light-logo" width="180" alt="" />
                    </a>
                    <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8 text-muted"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                    <ul id="sidebarnav">
                        <!-- ============================= -->
                        <!-- Home -->
                        <!-- ============================= -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <!-- =================== -->
                        <!-- Dashboard -->
                        <!-- =================== -->
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Route::currentRouteName() == 'admin.home' ? 'active' : '' }}"
                                href="{{ Route('admin.home') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-home"></i>
                                </span>
                                <span class="hide-menu">Home</span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow {{ Route::currentRouteNamed('kelas1.index', 'kelas2.index', 'kelas3.index', 'kelas4.index', 'kelas5.index', 'kelas6.index', 'kelas1.edit', 'kelas1.create') ? 'active' : '' }}"
                                href="#" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-list-details"></i>
                                </span>
                                <span class="hide-menu">Kelas</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ Route('kelas1.index') }}"
                                        class="sidebar-link  {{ Route::currentRouteName() == 'kelas1.index' ? 'active' : '' }}">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">MI Kelas 1</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ Route('kelas2.index') }}"
                                        class="sidebar-link  {{ Route::currentRouteName() == 'kelas2.index' ? 'active' : '' }}">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">MI Kelas 2</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ Route('kelas3.index') }}"
                                        class="sidebar-link  {{ Route::currentRouteName() == 'kelas3.index' ? 'active' : '' }}">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">MI Kelas 3</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ Route('kelas4.index') }}"
                                        class="sidebar-link  {{ Route::currentRouteName() == 'kelas4.index' ? 'active' : '' }}">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">MI Kelas 4</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ Route('kelas5.index') }}"
                                        class="sidebar-link  {{ Route::currentRouteName() == 'kelas5.index' ? 'active' : '' }}">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">MI Kelas 5</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ Route('kelas6.index') }}"
                                        class="sidebar-link  {{ Route::currentRouteName() == 'kelas6.index' ? 'active' : '' }}">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">MI Kelas 6</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link {{ in_array(Route::currentRouteName(), ['prestation.index', 'prestation.create','prestation.edit']) ? 'active' : '' }}"
                                href="{{ Route('prestation.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-text"></i>
                                </span>
                                <span class="hide-menu">Prestasi</span>
                            </a>
                        </li>
                        <li class="sidebar-item  {{ Route::currentRouteName() == 'ekstra.index' ? 'active' : '' }}">
                            <a class="sidebar-link " href="{{ Route('ekstra.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-chart-donut-3"></i>
                                </span>
                                <span class="hide-menu">ekstrakurikuler</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Route::currentRouteName() == 'announcement.index' ? 'active' : '' }} "
                                href="{{ Route('announcement.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-confetti"></i>
                                </span>
                                <span class="hide-menu">Pengumuman</span>
                            </a>
                        </li>
                        @if (Auth::user()->role == 'Admin')
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow {{ Route::currentRouteNamed('sambutan.admin', 'visi.admin', 'sejarah.admin', 'contact.admin') ? 'active' : '' }}"
                                    href="#" aria-expanded="false">
                                    <span class="d-flex">
                                        <i class="ti ti-list-details"></i>
                                    </span>
                                    <span class="hide-menu">MI Al-Aziz</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item ">
                                        <a href="{{ Route('sambutan.admin') }}"
                                            class="sidebar-link {{ Route::currentRouteName() == 'sambutan.admin' ? 'active' : '' }}">
                                            <div class="round-16 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-circle"></i>
                                            </div>
                                            <span class="hide-menu">Sambutan</span>
                                        </a>
                                    </li>

                                    <li class="sidebar-item">
                                        <a href="{{ Route('visi.admin') }}"
                                            class="sidebar-link {{ Route::currentRouteName() == 'visi.admin' ? 'active' : '' }}">
                                            <div class="round-16 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-circle"></i>
                                            </div>
                                            <span class="hide-menu">Visi-Misi</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ Route('history.admin') }}"
                                            class="sidebar-link {{ Route::currentRouteName() == 'history.admin' ? 'active' : '' }}">
                                            <div class="round-16 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-circle"></i>
                                            </div>
                                            <span class="hide-menu">Sejarah</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ Route('contact.admin') }}"
                                            class="sidebar-link {{ Route::currentRouteName() == 'contact.admin' ? 'active' : '' }}">
                                            <div class="round-16 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-circle"></i>
                                            </div>
                                            <span class="hide-menu">Kontak</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ Route('ekstrakurikuler.index') }}"
                                            class="sidebar-link {{ Route::currentRouteName() == 'ekstrakurikuler.index' ? 'active' : '' }}">
                                            <div class="round-16 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-circle"></i>
                                            </div>
                                            <span class="hide-menu">Jenis Ekstra</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Route::currentRouteName() == 'pengguna.index' ? 'active' : '' }}"
                                href="{{ Route('pengguna.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">Pengguna</span>
                            </a>
                        </li>

                </nav>
                <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
                    <div class="hstack gap-3">
                        <div class="john-img">
                            <img src="../../dist/images/profile/user-1.jpg" class="rounded-circle" width="40"
                                height="40" alt="">
                        </div>
                        <div class="john-title">
                            <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
                            <span class="fs-2 text-dark">Designer</span>
                        </div>
                        <a ;/ class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button"
                            aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-title="logout">
                            <i class="ti ti-power fs-6"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- Sidebar End -->
        <!-- Main wrapper -->
        <div class="body-wrapper">
            @include('admin.header')
            @yield('fluid')

            <!-- container-fluid over -->
        </div>
    </div>




    <!-- Customizer -->


    <link id="themeColors" rel="stylesheet" href="{{ asset('asset/admin/dist/css/style.min.css') }}" />

    <!-- Customizer -->
    <!-- Import Js Files -->
    <script src="{{ asset('asset/admin/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/admin/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('asset/admin/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- core files -->
    @yield('script')
    <script src="{{ asset('asset/admin/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('asset/admin/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('asset/admin/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('asset/admin/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('asset/admin/dist/js/custom.js') }}"></script>
    <script src="{{ asset('asset/admin/dist/libs/bootstrap-material-datetimepicker/node_modules/moment/moment.js') }}">
    </script>
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Success',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Terjadi kesalahan !!!',
                    icon: 'error',
                    html: `${Object.values(@json($errors->all())).join('<br>')}`,
                });
            });
        </script>
    @endif
    <!-- current page js files -->
    <script src="{{ asset('asset/admin/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('asset/admin/dist/js/dashboard2.js') }}"></script>
</body>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jul 2023 01:56:39 GMT -->

</html>
