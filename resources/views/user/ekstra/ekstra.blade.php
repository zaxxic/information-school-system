@extends('user.app')
@section('content')
    <main class="fix">

        <!-- breadcrumb-area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Ekstrakurikuler
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- blog-area -->
        <section class="blog-area pt-60 pb-60">
            <div class="container">
                <div class="author-inner-wrap">
                    <div class="row justify-content-center">
                        <div class="col-70">
                            <div class="weekly-post-item-wrap-three">
                                <div class="row">
                                    @foreach ($ekstras as $item)
                                        <div class="col-md-6">
                                            <div class="weekly-post-three">
                                                <div class="weekly-post-thumb">
                                                    <a href="{{ route('ekstra.shows', ['slug' => $item->slug]) }}">
                                                        <img src="{{ asset('storage/ekstra/' . $item->photo) }}"
                                                            alt="">

                                                    </a>

                                                </div>
                                                <div class="weekly-post-content">
                                                    <h2 class="post-title"><a
                                                            href="{{ route('ekstra.shows', ['slug' => $item->slug]) }}">
                                                            {{ $item->title }}
                                                        </a>

                                                    </h2>
                                                    <div class="blog-post-meta">
                                                        <ul class="list-wrap">
                                                            <i
                                                                class="flaticon-calendar"></i>{{ $item->created_at->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                                            <i
                                                                class="flaticon-history"></i>{{ $item->created_at->locale('id_ID')->diffForHumans(null, true) }}

                                                        </ul>
                                                    </div>
                                                    <p>{{ substr($item->paragraf1, 0, 80) }}

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>


                            <div class="pagination-wrap mt-30">
                                <div class="col-md-12">
                                    <ul class="pagination justify-content-center">
                                        @if ($ekstras->currentPage() > 1)
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $ekstras->previousPageUrl() }}"
                                                    aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                        @endif

                                        @for ($i = 1; $i <= $ekstras->lastPage(); $i++)
                                            <li class="page-item {{ $ekstras->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $ekstras->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        @if ($ekstras->currentPage() < $ekstras->lastPage())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $prestation->nextPageUrl() }}"
                                                    aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-30">
                            <div class="sidebar-wrap">
                                <div class="sidebar-widget sidebar-widget-two">
                                    <div class="widget-title mb-25">
                                        <h2 class="title">Pililh jenis ekstra</h2>
                                        <div class="section-title-line"></div>

                                    </div>
                                    <div class="sidebar-social-wrap">
                                        <div class="custom-list">
                                            <a href="{{ route('ekstrakurikuler') }}"
                                                class="{{ Route::currentRouteName() == 'ekstrakurikuler' ? 'aktif' : 'deaktif' }}">Tampilkan
                                                semua</a>
                                            @foreach ($ekstra as $item)
                                                @php
                                                    $isActive = request()->is('ekstrakurikuler/' . $item->name . '*');
                                                @endphp
                                                <a href="{{ route('ekstrakurikuler.show_index', ['name' => $item->name]) }}"
                                                    class="{{ $isActive ? 'aktif' : 'deaktif' }}">{{ $item->name }}</a>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                                @include('user.recents')
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
        <!-- blog-area-end -->

        <!-- newsletter-area -->

        <!-- newsletter-area-end -->

    </main>
@endsection
