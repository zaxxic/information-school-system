@extends('admin.app')
@section('fluid')
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex justify-content-between mb-4">
                <div class="card-header fs-4">
                    Edit sambutan
                </div>
                <div id="buatTim" class="d-flex align-items-end">

                </div>
            </div>
        </div>
        <form action="{{ route('visi.update') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row d-flex">
                <div class="form-group col-6">
                    <label for="paragraf1">Paragraf 1 <label style="color: red;font-size: 22px">*</label> </label>
                    <textarea class="form-control mt-2 mb-2" name="paragraf1" rows="3" placeholder="Text Here...">{{ $visi->paragraf1 ?? '' }}</textarea>
                </div>

                <div class="email-repeater col-6">
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
                                            <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light"
                                                type="button">
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
                <div class="form-group col-12 mt-3">
                    <div class="mb-3">
                        <div class="foto2 mb-2" style="width: 100%; height: 400px;">
                            <img style="width: 100%; height: 400px; object-fit: contain;" id="photoke2"
                                src="{{ asset('storage/information/' . ($visi->photo ?? '')) }}" alt="">
                        </div>

                    </div>
                    <label for="photo">Photo <label style="color: red;font-size: 22px">*</label> </label>
                    <input class="form-control mt-2" type="file" name="photo" id="photo">
                </div>
            </div>
            <button type="submit" class="mt-2 btn btn-primary ">Simpan</button>
        </form>

    </div>
@endsection
@section('script')
    <script src="{{ asset('asset/admin/dist/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('asset/admin/dist/js/plugins/repeater-init.js') }}"></script>
@endsection
