<div class="sidebar-widget sidebar-widget-two">
    {{-- @dd($recent) --}}

    <div class="widget-title mb-30">
        <h6 class="title">Berita terbaru</h6>
        <div class="section-title-line"></div>
    </div>
    <div class="hot-post-wrap">
        @foreach ($recents as $key => $item)
            @if ($key == 0)
                <div class="hot-post-item">
                    <div class="hot-post-thumb">
                        <a href="{{ route('ekstra.shows', ['slug' => $item->slug]) }}"><img src="{{ asset('storage/kelas1/' . $item->photo) }}" alt=""></a>
                    </div>
                    <div class="hot-post-content">
                        <h4 class="">
                            <a href="{{ route('ekstra.shows', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                        </h4>
                        <a href="{{Route('ekstrakurikuler')}}"
                            class="post-tag">Ekstrakurikuler</a>
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
            @elseif ($key == 1)
                <div class="hot-post-item">
                    <div class="hot-post-content">
                        <h4 class="">
                            <a href="">{{ $item->title }}</a>
                        </h4>
                        <a href="{{Route('prestation')}}"
                            class="post-tag">Prestasi</a>

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
            @elseif ($key == 2)
                <div class="hot-post-item">
                    <div class="hot-post-content">
                        <h4 class="">
                            <a href="">{{ $item->title }}</a>
                        </h4>
                        <a href="{{Route('announcement')}}"
                            class="post-tag">Pengumuman</a>

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
            @endif
        @endforeach

    </div>
</div>
