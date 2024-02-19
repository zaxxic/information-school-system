@extends('admin.app')
@section('fluid')
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex justify-content-between mb-4">
                <div class="card-header fs-4">
                    Edit Sejarah
                </div>
                <div id="buatTim" class="d-flex align-items-end">

                </div>
            </div>
        </div>
        <form action="{{ route('contact.update') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row d-flex">
                <div class="form-group col-6">
                    <label for="paragraf1">Lokasi <label style="color: red;font-size: 22px">*</label> </label>
                    <textarea class="form-control mt-2 mb-2" name="paragraf1" rows="3" placeholder="Text Here...">{{ $contact->paragraf1 ?? '' }}</textarea>
                </div>

                <div class="form-group col-6">
                    <label for="paragraf2">Email <label style="color: red;font-size: 22px">*</label> </label>
                    <input type="text" class="form-control" name="paragraf2" value="{{ $contact->paragraf2 ?? '' }}">
                </div>
                <div class="form-group col-6">
                    <label for="paragraf3">Nama yang di hubungi</label>
                  <input type="text" class="form-control" name="paragraf3" value="{{ $contact->paragraf3 ?? '' }}" id="">
                </div>
                <div class="form-group col-6">
                    <label for="paragraf4">No telepon</label>
                  <input type="number" name="paragraf4" class="form-control" value="{{ $contact->paragraf4 ?? '' }}" id="">
                </div>
                <div class="form-group col-12 mt-3">
                    <div class="mb-3">
                        <div class="foto2 mb-2" style="width: 100%; height: 400px;">
                            <img style="width: 100%; height: 400px; object-fit: contain;" id="photoke2"
                                src="{{ asset('storage/information/' . ($contact->photo ?? '')) }}" alt="">
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
