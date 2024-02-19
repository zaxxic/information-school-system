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
                                    <li class="breadcrumb-item active" aria-current="page">Kontak</li>

                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- contact-area -->
        <section class="contact-area pt-80 pb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-10">
                        <div class="blog-details-thumb">
                            <img src="{{ asset('storage/information/' . ($kontak->photo ?? '')) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="contact-info-wrap">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-6">
                            <div class="contact-info-item">

                                <div class="content">
                                    <h5 class="title">Lokasi</h5>
                                    <p>{{ $kontak->paragraf1 }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="contact-info-item">

                                <div class="content">
                                    <h5 class="title">E-mail</h5>
                                    <p>{{ $kontak->paragraf2 }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="contact-info-item">

                                <div class="content">
                                    <h5 class="title">Nomer Whatsapp</h5>
                                    <p>{{ $kontak->paragraf3 }} : <a target="blank"
                                            href="https://wa.me/{{ $kontak->paragraf4 }}">{{ $kontak->paragraf4 }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- contact-area-end -->

        <!-- contact-map -->

        <!-- contact-map-end -->

        <!-- newsletter-area -->
        <section class="newsletter-area-three">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="newsletter-social  justify-content-center">
                            <h4 class="title">Ikuti sosial media kami:</h4>
                            <ul class="list-wrap">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- newsletter-area-end -->

    </main>
@endsection
