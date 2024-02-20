@extends('admin.app')
@section('fluid')
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex justify-content-between mb-4">
                <div class="card-header fs-4">
                    Edit Berita Ekstra
                </div>
                <div id="buatTim" class="d-flex align-items-end">

                </div>
            </div>
        </div>
        <form class="mt-4" action="{{ route('ekstra.update', $ekstrakurikuler->id) }}" enctype="multipart/form-data"
            method="POST">
            @csrf
            @method('PUT')

            <div class="modal-body">

                <p>
                <div class="">
                    <label for="msg">Judul <label style="color: red;font-size: 22px">*</label>
                    </label>
                    <div class="mb-3">

                        <input type="text" name="title" value="{{ $ekstrakurikuler->title ?? '' }}"
                            class="form-control" placeholder="Judul" />
                    </div>
                    <label for="msg">Kelas <label style="color: red;font-size: 22px">*</label>
                    </label>
                    <select class="form-control" name="ekstra_id" id="">
                        <option disabled selected value="">Pilih kelas</option>
                        @foreach ($ekstras as $item)
                            <option
                                value="{{ $item->id }}"{{ $item->id == $ekstrakurikuler->ekstra_id ? ' selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach

                    </select>
                    <label for="msg">Photo <label style="color: red;font-size: 22px">*</label></label>
                    <div class="mb-3">
                        <div class="foto mb-2" style="width: 100%; height: 400px;">
                            <img style="width: 100%; height: 400px; object-fit: contain;" id="photo"
                                src="{{ asset('storage/ekstra/' . ($ekstrakurikuler->photo ?? '')) }}" alt="">
                        </div>
                    </div>
                    <input type="file" name="photo" class="form-control" placeholder="Name" value="" />
                    <label for="msg">Paragraf 1 <label style="color: red;font-size: 22px">*</label></label>
                    <div class="mb-3">
                        <textarea name="paragraf1" class="form-control" placeholder="Text Area">{{ $ekstrakurikuler->paragraf1 ?? '' }}</textarea>
                    </div>
                    <label for="msg">Paragraf 2 <label style="color: red;font-size: 22px">*</label></label>
                    <div class="mb-3">
                        <textarea name="paragraf2" class="form-control" placeholder="Text Area">{{ $ekstrakurikuler->paragraf2 ?? '' }}</textarea>
                    </div>
                    <label for="msg">Paragraf 3 <label style="color: red;font-size: 22px">*</label></label>
                    <div class="mb-3">
                        <textarea name="paragraf3" class="form-control" placeholder="Text Area">{{ $ekstrakurikuler->paragraf3 ?? '' }}</textarea>
                    </div>
                    <label for="msg">Photo 2 </label>
                    @if ($ekstrakurikuler->foto)
                        <div class="mb-3">
                            <div class="foto mb-2" style="width: 100%; height: 400px;">
                                <img style="width: 100%; height: 400px; object-fit: contain;" id="photo"
                                    src="{{ asset('storage/ekstra/' . $ekstrakurikuler->foto) }}" alt="">
                            </div>
                        </div>
                    @endif
                    <div class="mb-3">
                        <input type="file" name="photo2" class="form-control" placeholder="Name" />
                    </div>
                    <div class="email-repeater">
                        <label for="msg">Paragraf bebas</label>

                        <div data-repeater-list="repeater-group">

                            @forelse ($data as $item)
                                <div class="email-repeater mb-3">
                                    <div data-repeater-item class="row mb-3">
                                        <div class="col-md-10">
                                            <textarea name="area" class="form-control" placeholder="Text Area">{{ $item[0] }}</textarea>
                                        </div>
                                        <div class="col-md-2">
                                            <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light"
                                                type="button">
                                                <i class="ti ti-circle-x fs-5"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="email-repeater mb-3">
                                    <div>
                                        <div data-repeater-item class="row mb-3">
                                            <div class="col-md-10">
                                                <textarea name="area" class="form-control" placeholder="Text Area"> </textarea>
                                            </div>
                                            <div class="col-md-2">
                                                <button data-repeater-delete=""
                                                    class="btn btn-danger waves-effect waves-light" type="button">
                                                    <i class="ti ti-circle-x fs-5"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforelse


                        </div>
                        <button type="button" data-repeater-create="" class="btn btn-info waves-effect waves-light">
                            <div class="d-flex align-items-center">
                                Add Text Area
                                <i class="ti ti-circle-plus ms-1 fs-5"></i>
                            </div>
                        </button>
                    </div>
                    <label for="msg">Video</label>
                    @if ($ekstrakurikuler->video)
                        <div class="  mb-2" style="width: 100%; height: 400px;">
                            <video controls style="width: 100%; height: 400px; object-fit: contain;" id="photo">
                                <source src="{{ asset('storage/ekstra/' . ($ekstrakurikuler->video ?? '')) }}"
                                    type="video/mp4">

                                Maaf, browser Anda tidak mendukung pemutaran video.
                            </video>
                        </div>
                    @endif

                    <div class="mb-3">
                        <input type="file" name="video" class="form-control" placeholder="Name" />
                    </div>

                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn btn-danger" onclick="history.back()">Kembali</button>

                <button type="submit" class="btn btn-primary">Buat
                    Berita</button>
            </div>
        </form>

    </div>
@endsection
@section('script')
    <script src="{{ asset('asset/admin/dist/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('asset/admin/dist/js/plugins/repeater-init.js') }}"></script>
@endsection
