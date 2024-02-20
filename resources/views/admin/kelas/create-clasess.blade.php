@extends('admin.app')
@section('fluid')
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex justify-content-between mb-4">
                <div class="card-header fs-4">
                    Tambah Berita Kelas
                </div>
                <div id="buatTim" class="d-flex align-items-end">

                </div>
            </div>
        </div>
        <form class="mt-4" action="{{ Route('kelas1.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-body">
                <p>
                <div class="">
                    <label for="msg">Judul <label style="color: red;font-size: 22px">*</label>
                    </label>
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Name" />
                    </div>
                    <label for="msg">Kelas <label style="color: red;font-size: 22px">*</label>
                    </label>
                    <select class="form-control" name="class_category_id" id="">
                        <option disabled selected value="">Pilih kelas</option>
                        <option class="form-control" value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    <label class="mt-3" for="msg">Photo <label style="color: red;font-size: 22px">*</label></label>
                    <div class="mb-3">
                        <input type="file" name="photo" class="form-control" placeholder="Name" />
                    </div>
                    <label for="msg">Paragraf 1 <label style="color: red;font-size: 22px">*</label></label>
                    <div class="mb-3">
                        <textarea name="paragraf1" class="form-control" placeholder="Text Area"></textarea>
                    </div>
                    <label for="msg">Paragraf 2 <label style="color: red;font-size: 22px">*</label></label>
                    <div class="mb-3">
                        <textarea name="paragraf2" class="form-control" placeholder="Text Area"></textarea>
                    </div>
                    <label for="msg">Paragraf 3 <label style="color: red;font-size: 22px">*</label></label>
                    <div class="mb-3">
                        <textarea name="paragraf3" class="form-control" placeholder="Text Area"></textarea>
                    </div>
                    <label for="msg">Photo 2 </label>
                    <div class="mb-3">
                        <input type="file" name="photo2" class="form-control" placeholder="Name" />
                    </div>
                    <label for="msg">Paragraf bebas</label>
                    <div class="email-repeater mb-3">

                        <div data-repeater-list="repeater-group">
                            <div data-repeater-item class="row mb-3">
                                <div class="col-md-10">
                                    <textarea name="area" class="form-control" placeholder="Text Area"></textarea>
                                </div>
                                <div class="col-md-2">
                                    <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light"
                                        type="button">
                                        <i class="ti ti-circle-x fs-5"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-repeater-create="" class="btn btn-info waves-effect waves-light">
                            <div class="d-flex align-items-center">
                                Add Text Area
                                <i class="ti ti-circle-plus ms-1 fs-5"></i>
                            </div>
                        </button>
                    </div>
                    <label for="msg">Video</label>
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
