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
                                    <li class="breadcrumb-item"><a href="#">Mi Al-Aziz</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sejarah</li>
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
                <div class="author-inner-wrap blog-inner-wrap">
                    <div class="row justify-content-center">
                        <div class="col-70 order-0 order-xl-2">
                            <div class="blog-details-wrap">
                                <div class="blog-details-content">
                                    <div class="blog-details-content-top text-center">
                                        <h2 class="title mb-3">Sejarah MI Al-aziz</h2>

                                    </div>
                                    <div class="blog-details-thumb">
                                        <img src="{{ asset('storage/information/' . ($history->photo ?? '')) }}"
                                            alt="">
                                    </div>
                                    <p class="first-info">{{ $history->paragraf1 }}</p>
                                    <p>{{ $history->paragraf2 }}</p>
                                    <p>{{ $history->paragraf3 }}</p>
                                    <div class="blog-details-thumb">
                                        <img src="{{ asset('storage/information/' . ($history->photo2 ?? '')) }}" alt="">
                                    </div>
                                    <p>{{ $history->paragraf4}}</p>

                                    <p>{{ $history->paragraf5}}</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- blog-details-area-end -->

    </main>
@endsection
