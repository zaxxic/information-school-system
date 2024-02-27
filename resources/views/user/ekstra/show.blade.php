@extends('user.app')
@section('content')
    <!-- main-area -->
    <main class="fix">
        <!-- breadcrumb-area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item" aria-current="page">
                                        <a href="{{ route('ekstrakurikuler') }}">Ekstrakurikuler</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ $item->title }}
                                    </li>

                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- blog-details-area -->
        <section class="blog-details-area pt-60 pb-60">
            <div class="container">
                <div class="author-inner-wrap">
                    <div class="row justify-content-center">
                        <div class="col-70">
                            <div class="blog-details-wrap">
                                <div class="blog-details-content">
                                    <div class="blog-details-content-top">
                                        <h2 class="title">
                                            {{ $item->title }}
                                        </h2>
                                        <div class="bd-content-inner">
                                            <div class="blog-post-meta">
                                                <ul class="list-wrap">
                                                    <li>
                                                        <i class="flaticon-user"></i>by {{ $item->user->name }}
                                                    </li>
                                                    <li>
                                                        <i
                                                            class="flaticon-calendar"></i>{{ $item->created_at->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                                    </li>
                                                    <li>

                                                    </li>
                                                    <li><i
                                                            class="flaticon-history"></i>{{ $item->created_at->locale('id_ID')->diffForHumans(null, true) }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="blog-details-social">
                                                <ul class="list-wrap">
                                                    <li>
                                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="blog-details-thumb">

                                        <img src="{{ asset('storage/ekstra/' . $item->photo) }}" alt="">
                                    </div>
                                    <p class="first-info">
                                        {{ $item->paragraf1 }}
                                    </p>
                                    <p>
                                        {{ $item->paragraf2 }}
                                    </p>
                                    @if ($item->foto)
                                        <div class="blog-details-inner">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <div class="blog-details-inner-img">
                                                        <img src="{{ asset('storage/ekstra/' . $item->foto) }}"
                                                            alt="" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                    <p>
                                        {{ $item->paragraf3 }}
                                    </p>

                                    <p>
                                    </p>
                                    @foreach ($moreParagraf as $paragraf)
                                        <p>
                                            {{ $paragraf[0] }}
                                        </p>
                                    @endforeach
                                    {{-- <div class="blog-details-video">
                                        <img src="assets/img/blog/blog_details03.jpg" alt="" />
                                        <a href="https://www.youtube.com/watch?v=G_AEL-Xo5l8"
                                            class="paly-btn popup-video"><i class="fas fa-play"></i></a>
                                    </div> --}}
                                    @if ($item->video)
                                        <div class="  mb-2" style="width: 100%; height: 400px;">
                                            <video controls style="width: 100%; height: 400px; object-fit: contain;"
                                                id="photo">
                                                <source src="{{ asset('storage/ekstra/' . ($item->video ?? '')) }}"
                                                    type="video/mp4">

                                                Maaf, browser Anda tidak mendukung pemutaran video.
                                            </video>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-30">
                            <div class="sidebar-wrap">


                                <div class="sidebar-widget sidebar-widget-two">
                                    <div class="widget-title mb-25">
                                        <h2 class="title">Subscribe & Followers</h2>
                                        <div class="section-title-line"></div>
                                    </div>
                                    <div class="sidebar-social-wrap">
                                        <ul class="list-wrap">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i>facebook</a></li>
                                            <li><a href="#"><i class="fab fa-tiktok"></i>Tiktok</a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i>instagram</a></li>
                                            <li><a href="#"><i class="fab fa-youtube"></i>youtube</a></li>

                                        </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-details-area-end -->
    </main>
    <!-- main-area-end -->
@endsection
