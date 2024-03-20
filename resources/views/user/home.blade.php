@extends('user.app')
@section('content')
    <main class="fix">

        <!-- coin-area -->
        <section class="coin-area">

        </section>
        <!-- coin-area-end -->

        <!-- banner-post-area -->
        <section class="banner-post-area-four pb-30">
            <div class="container custom-container">
                <div class="row">

                    @foreach ($announcement as $item)
                        <div class="col-lg-4">
                            <div class="banner-post-four">
                                <div class="banner-post-thumb-four">
                                    <a href="{{ route('announcement.show', ['slug' => $item->slug]) }}"><img
                                            src="{{ asset('storage/announcement/' . $item->photo) }}" alt=""></a>
                                </div>
                                <div class="banner-post-content-four">
                                    <a href="{{ Route('announcement') }}" class="post-tag">Pengumuman</a>
                                    <h2 class="post-title bold-underline"><a
                                            href="{{ route('announcement.show', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                    </h2>
                                    <div class="blog-post-meta white-blog-meta">
                                        <ul class="list-wrap">
                                            <li><i class="flaticon-user"></i>by {{ $item->user->role }}</li>
                                            <li><i
                                                    class="flaticon-calendar"></i>{{ $item->created_at->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                            </li>
                                            <li><i
                                                    class="flaticon-history"></i>{{ $item->created_at->locale('id_ID')->diffForHumans(null, true) }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <section class="recent-post-area-two pt-60 pb-60">
            <div class="container">
                <div class="recent-post-inner-wrap">
                    <div class="row justify-content-center">
                        <div class="col-100">
                            <div class="section-title-wrap mb-30">
                                <div class="section-title">
                                    <h2 class="title">Prestasi</h2>
                                </div>
                                <div class="view-all-btn">
                                    <a href="{{ Route('prestation') }}" class="link-btn">Lihat Semua
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" fill="none">
                                                <path
                                                    d="M1.07692 10L0 8.92308L7.38462 1.53846H0.769231V0H10V9.23077H8.46154V2.61538L1.07692 10Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M1.07692 10L0 8.92308L7.38462 1.53846H0.769231V0H10V9.23077H8.46154V2.61538L1.07692 10Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div class="section-title-line"></div>
                            </div>
                            <div class="popular-post-item-wrap">
                                <div class="row">
                                    @foreach ($prestation as $key => $item)
                                        @if ($key >= 3)
                                            <div class="col-lg-6">
                                                <div class="ta-overlay-post-two">
                                                    <div class="overlay-post-thumb-two">
                                                        <a href="{{ route('prestation.show', ['slug' => $item->slug]) }}"><img
                                                                src="{{ asset('storage/announcement/' . $item->photo) }}"
                                                                alt=""></a>
                                                    </div>
                                                    <div class="overlay-post-content-two">
                                                        <h2 class="post-title"><a
                                                                href="{{ route('prestation.show', ['slug' => $item->slug]) }}">
                                                                {{ $item->title }}</a></h2>
                                                        <div class="blog-post-meta white-blog-meta">
                                                            <ul class="list-wrap">
                                                                <li><i
                                                                        class="flaticon-calendar"></i>{{ $item->created_at->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                                                </li>
                                                                <li><i
                                                                        class="flaticon-history"></i>{{ $item->created_at->locale('id_ID')->diffForHumans(null, true) }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-lg-4">
                                                <div class="ta-overlay-post-two">
                                                    <div class="overlay-post-thumb-two">

                                                        <a href="{{ route('prestation.show', ['slug' => $item->slug]) }}"><img
                                                                src="{{ asset('storage/announcement/' . $item->photo) }}"
                                                                alt=""></a>
                                                    </div>
                                                    <div class="overlay-post-content-two">
                                                        <h2 class="post-title"><a
                                                                href="{{ route('prestation.show', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                                        </h2>
                                                        <div class="blog-post-meta white-blog-meta">
                                                            <ul class="list-wrap">
                                                                <li><i
                                                                        class="flaticon-history"></i>{{ $item->created_at->locale('id_ID')->diffForHumans(null, true) }}
                                                                </li>
                                                                <li><i
                                                                        class="flaticon-calendar"></i>{{ $item->created_at->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- recent-post-area-end -->

        <!-- trending-post-area -->

        <!-- trending-post-area-end -->

        <!-- ad-banner-area -->
        <div class="ad-banner-area pt-70">
            <div class="container">
                <div class="ad-banner-img">
                    <a href="#">
                        <img src="assets/img/images/advertisement11.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
        <!-- ad-banner-area-end -->

        <!-- mining-post-area -->
        <section class="mining-post-area pt-70 pb-70">
            <div class="container">
                <div class="mining-post-inner">
                    <div class="row justify-content-center">
                        <div class="col-100">
                            <div class="mining-post-wrap mb-40">
                                <div class="section-title-wrap mb-30">
                                    <div class="section-title">
                                        <h2 class="title">Kelas

                                        </h2>
                                    </div>
                                    <div class="section-title-line"></div>
                                </div>
                                <div class="row">
                                    @isset($class1)
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="featured-post-item healthy-post">
                                                <div class="featured-post-thumb">
                                                    <a
                                                        href="{{ route('class.show', ['id' => $class1->class_category_id, 'slug' => $class1->slug]) }}"><img
                                                            src="{{ asset('storage/kelas1/' . $class1->photo) }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="featured-post-content">
                                                    <a href="{{ Route('class1') }}" class="post-tag">Kelas 1</a>
                                                    <h2 class="post-title"><a
                                                            href="{{ route('class.show', ['id' => $class1->class_category_id, 'slug' => $class1->slug]) }}">{{ $class1->name }}</a>
                                                    </h2>
                                                    <div class="blog-post-meta">
                                                        <ul class="list-wrap">
                                                            <li><i class="flaticon-user"></i>by <a
                                                                    href="author.html">{{ $class1->user->role }}</a></li>
                                                            <li><i
                                                                    class="flaticon-calendar"></i>{{ $class1->created_at->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endisset
                                    @isset($class2)
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="featured-post-item healthy-post">
                                                <div class="featured-post-thumb">
                                                    <a
                                                        href="{{ route('class.show', ['id' => $class2->class_category_id, 'slug' => $class2->slug]) }}"><img
                                                            src="{{ asset('storage/kelas1/' . $class2->photo) }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="featured-post-content">
                                                    <a href="{{ Route('class2') }}" class="post-tag">kelas 2</a>
                                                    <h2 class="post-title"><a
                                                            href="{{ route('class.show', ['id' => $class2->class_category_id, 'slug' => $class2->slug]) }}">{{ $class2->name }}</a>
                                                    </h2>
                                                    <div class="blog-post-meta">
                                                        <ul class="list-wrap">
                                                            <li><i class="flaticon-user"></i>by <a
                                                                    href="author.html">{{ $class2->user->role }}</a></li>
                                                            <li><i
                                                                    class="flaticon-calendar"></i>{{ $class2->created_at->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endisset
                                    @isset($class3)
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="featured-post-item healthy-post">
                                                <div class="featured-post-thumb">
                                                    <a
                                                        href="{{ route('class.show', ['id' => $class3->class_category_id, 'slug' => $class3->slug]) }}"><img
                                                            src="{{ asset('storage/kelas1/' . $class3->photo) }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="featured-post-content">
                                                    <a href="{{ Route('class3') }}" class="post-tag">kelas 3</a>
                                                    <h2 class="post-title"><a
                                                            href="{{ route('class.show', ['id' => $class3->class_category_id, 'slug' => $class3->slug]) }}">{{ $class3->name }}</a>
                                                    </h2>
                                                    <div class="blog-post-meta">
                                                        <ul class="list-wrap">
                                                            <li><i class="flaticon-user"></i>by <a
                                                                    href="author.html">{{ $class3->user->role }}</a></li>
                                                            <li><i
                                                                    class="flaticon-calendar"></i>{{ $class3->created_at->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endisset
                                    @isset($class4)
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="featured-post-item healthy-post">
                                                <div class="featured-post-thumb">
                                                    <a
                                                        href="{{ route('class.show', ['id' => $class4->class_category_id, 'slug' => $class4->slug]) }}"><img
                                                            src="{{ asset('storage/kelas1/' . $class4->photo) }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="featured-post-content">
                                                    <a href="{{ Route('class4') }}" class="post-tag">kelas 4</a>
                                                    <h2 class="post-title"><a
                                                            href="{{ route('class.show', ['id' => $class4->class_category_id, 'slug' => $class4->slug]) }}">{{ $class4->name }}</a>
                                                    </h2>
                                                    <div class="blog-post-meta">
                                                        <ul class="list-wrap">
                                                            <li><i class="flaticon-user"></i>by <a
                                                                    href="author.html">{{ $class4->user->role }}</a></li>
                                                            <li><i
                                                                    class="flaticon-calendar"></i>{{ $class4->created_at->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endisset
                                    @isset($class5)
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="featured-post-item healthy-post">
                                                <div class="featured-post-thumb">
                                                    <a
                                                        href="{{ route('class.show', ['id' => $class5->class_category_id, 'slug' => $class5->slug]) }}"><img
                                                            src="{{ asset('storage/kelas1/' . $class5->photo) }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="featured-post-content">
                                                    <a href="{{ Route('class5') }}" class="post-tag">kelas 5</a>
                                                    <h2 class="post-title"><a
                                                            href="{{ route('class.show', ['id' => $class5->class_category_id, 'slug' => $class5->slug]) }}">{{ $class5->name }}</a>
                                                    </h2>
                                                    <div class="blog-post-meta">
                                                        <ul class="list-wrap">
                                                            <li><i class="flaticon-user"></i>by <a
                                                                    href="author.html">{{ $class5->user->role }}</a></li>
                                                            <li><i
                                                                    class="flaticon-calendar"></i>{{ $class5->created_at->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endisset
                                    @isset($class6)
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="featured-post-item healthy-post">
                                                <div class="featured-post-thumb">
                                                    <a
                                                        href="{{ route('class.show', ['id' => $class6->class_category_id, 'slug' => $class6->slug]) }}"><img
                                                            src="{{ asset('storage/kelas1/' . $class6->photo) }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="featured-post-content">
                                                    <a href="{{ Route('class6') }}" class="post-tag">kelas 6</a>
                                                    <h2 class="post-title"><a
                                                            href="{{ route('class.show', ['id' => $class6->class_category_id, 'slug' => $class6->slug]) }}">{{ $class6->name }}</a>
                                                    </h2>
                                                    <div class="blog-post-meta">
                                                        <ul class="list-wrap">
                                                            <li><i class="flaticon-user"></i>by <a
                                                                    href="author.html">{{ $class6->user->role }}</a></li>
                                                            <li><i
                                                                    class="flaticon-calendar"></i>{{ $class6->created_at->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endisset



                                </div>
                            </div>
                            <div class="ad-banner-area mb-70">
                                <div class="ad-banner-img ad-banner-img-two text-center">
                                    <a href="#">
                                        <img src="assets/img/images/advertisement12.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="section-title-wrap mb-30">
                                <div class="section-title">
                                    <h2 class="title">Ekstra</h2>
                                </div>
                                <div class="view-all-btn">

                                    <a href="x" class="link-btn">Lihat semua
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" fill="none">
                                                <path
                                                    d="M1.07692 10L0 8.92308L7.38462 1.53846H0.769231V0H10V9.23077H8.46154V2.61538L1.07692 10Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M1.07692 10L0 8.92308L7.38462 1.53846H0.769231V0H10V9.23077H8.46154V2.61538L1.07692 10Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div class="section-title-line"></div>
                            </div>
                            <div class="weekly-post-item-wrap-three">
                                <div class="row">
                                    @foreach ($ekstra as $item)
                                        <div class="col-md-6">
                                            <div class="weekly-post-three">
                                                <div class="weekly-post-thumb">
                                                    <a href="{{ route('ekstra.shows', ['slug' => $item->slug]) }}"><img
                                                            src="{{ asset('storage/ekstra/' . $item->photo) }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="weekly-post-content">
                                                    <h2 class="post-title"><a href="">{{ $item->title }}</a></h2>
                                                    <div class="blog-post-meta">
                                                        <ul class="list-wrap">
                                                            <li><i
                                                                    class="flaticon-calendar"></i>{{ $item->created_at->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                                            </li>
                                                            <li><i
                                                                    class="flaticon-history"></i>{{ $item->created_at->locale('id_ID')->diffForHumans(null, true) }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
