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
                                    <li class="breadcrumb-item active">Kelas {{ request()->segment(2) }}
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
                                    @foreach ($classes as $item)
                                        <div class="col-md-6">
                                            <div class="weekly-post-three">
                                                <div class="weekly-post-thumb">
                                                    <a
                                                        href="{{ route('class.show', ['id' => $item->class_category_id, 'slug' => $item->slug]) }}">
                                                        <img src="{{ asset('storage/kelas1/' . $item->photo) }}"
                                                            alt="">
                                                    </a>

                                                </div>
                                                <div class="weekly-post-content">
                                                    <h2 class="post-title"><a
                                                            href="{{ route('class.show', ['id' => $item->class_category_id, 'slug' => $item->slug]) }}">
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
                                        @if ($classes->currentPage() > 1)
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $classes->previousPageUrl() }}"
                                                    aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                        @endif

                                        @for ($i = 1; $i <= $classes->lastPage(); $i++)
                                            <li class="page-item {{ $classes->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $classes->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        @if ($classes->currentPage() < $classes->lastPage())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $classes->nextPageUrl() }}"
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


                                @include('user.class.recent')
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
