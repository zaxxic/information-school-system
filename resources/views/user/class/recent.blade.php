<div class="sidebar-widget sidebar-widget-two">
    <div class="widget-title mb-25">
        <h2 class="title">Pililh Kelas</h2>
        <div class="section-title-line"></div>

    </div>
    <div class="sidebar-social-wrap">
        <div class="custom-list">
            <a href="{{ route('kelas') }}"
                class="{{ Route::currentRouteName() == 'kelas' ? 'aktif' : 'deaktif' }}">Tampilkan
                semua</a>

            <a href="{{ route('class1') }}" class="{{ request()->routeIs('class1') ? 'aktif' : 'deaktif' }}">Mi kelas
                1</a>
            <a href="{{ route('class2') }}" class="{{ request()->routeIs('class2') ? 'aktif' : 'deaktif' }}">Mi kelas
                2</a>
            <a href="{{ route('class3') }}" class="{{ request()->routeIs('class3') ? 'aktif' : 'deaktif' }}">Mi kelas
                3</a>
            <a href="{{ route('class4') }}" class="{{ request()->routeIs('class4') ? 'aktif' : 'deaktif' }}">Mi kelas
                4</a>
            <a href="{{ route('class5') }}" class="{{ request()->routeIs('class5') ? 'aktif' : 'deaktif' }}">Mi kelas
                5</a>
            <a href="{{ route('class6') }}" class="{{ request()->routeIs('class6') ? 'aktif' : 'deaktif' }}">Mi kelas
                6</a>



        </div>

    </div>
</div>
<div class="sidebar-widget sidebar-widget-two">
    {{-- @dd($recent) --}}

    <div class="widget-title mb-30">
        <h6 class="title">Berita kelas terbaru</h6>
        <div class="section-title-line"></div>
    </div>
    <div class="hot-post-wrap">
        @foreach ($recent as $key => $item)
            @if ($key == 0)
                <div class="hot-post-item">
                    <div class="hot-post-thumb">
                        <a href="{{ route('class.show', ['id' => $item->class_category_id, 'slug' => $item->slug]) }}"><img
                                src="{{ asset('storage/kelas1/' . $item->photo) }}" alt=""></a>
                    </div>
                    <div class="hot-post-content">
                        <a href="{{ route('class' . $item->class_category_id) }}"
                            class="post-tag">{{ $item->class->category }}</a>
                        <h4
                            class="{{ route('class.show', ['id' => $item->class_category_id, 'slug' => $item->slug]) }}">
                            <a
                                href="{{ route('class.show', ['id' => $item->class_category_id, 'slug' => $item->slug]) }}">{{ $item->title }}</a>
                        </h4>
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
            @else
                <div class="hot-post-item">
                    <div class="hot-post-content">
                        <a href="{{ route('class' . $item->class_category_id) }}"
                            class="post-tag">{{ $item->class->category }}</a>
                        <h4
                            class="{{ route('class.show', ['id' => $item->class_category_id, 'slug' => $item->slug]) }}">
                            <a
                                href="{{ route('class.show', ['id' => $item->class_category_id, 'slug' => $item->slug]) }}">{{ $item->title }}</a>
                        </h4>

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
