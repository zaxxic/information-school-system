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
        <form action="{{ route('sambutan.update') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row d-flex">
                <div class="form-group col-6">
                    <label for="paragraf1">Paragraf 1 <label style="color: red;font-size: 22px">*</label> </label>
                    <textarea class="form-control mt-2 mb-2" name="paragraf1" rows="3" placeholder="Text Here...">{{ $greeting->paragraf1 ?? '' }}</textarea>
                </div>

                <div class="form-group col-6">
                    <label for="paragraf2">Paragraf 2 <label style="color: red;font-size: 22px">*</label> </label>
                    <textarea class="form-control mt-2 mb-2" name="paragraf2" rows="3" placeholder="Text Here...">{{ $greeting->paragraf2 ?? '' }}</textarea>
                </div>
                <div class="form-group col-6">
                    <label for="paragraf3">Paragraf 3</label>
                    <textarea class="form-control mt-2 mb-2" rows="3" name="paragraf3" placeholder="Text Here...">{{ $greeting->paragraf3 ?? '' }}</textarea>
                </div>
                <div class="form-group col-6">
                    <label for="paragraf4">Paragraf 4</label>
                    <textarea class="form-control mt-2 mb-2" name="paragraf4" rows="3" placeholder="Text Here...">{{ $greeting->paragraf4 ?? '' }}</textarea>
                </div>
                <div class="form-group col-6">
                    <label for="quotes">Quotes</label>
                    <textarea name="quote" class="form-control mt-2 mb-2" rows="3" placeholder="Text Here...">{{ $greeting->quote ?? '' }}</textarea>
                </div>
                <div class="form-group col-6">
                    <div class="mb-3">
                        <div class="foto2 mb-2" style="width: 100%; height: 400px;">
                            <img style="width: 100%; height: 400px; object-fit: contain;" id="photoke2"
                                src="{{ asset('storage/information/' . ($greeting->photo ?? '')) }}" alt="">
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
