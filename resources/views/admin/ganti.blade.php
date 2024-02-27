@extends('admin.app')
@section('fluid')
    <div class="container-fluid ">
        <div class="row">
            <div class="d-flex justify-content-between mb-3">
                <div class="card-header fs-4">
                    Ganti password
                </div>
            </div>
            <div class="upgrade-plan bg-light-primary position-relative overflow-hidden rounded-4 p-4 mb-9">
                <div class="row">
                    <form action="{{ route('change.password') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <div class="mb-2">
                                <label for="current_password">Password sekarang</label>
                                <input type="password" name="current_password" id="current_password" class="form-control">

                            </div>
                            <div class="mb-2">
                                <label for="new_password">Password baru</label>
                                <input type="password" name="new_password" id="new_password" class="form-control">

                            </div>
                            <div class="mb-2">
                                <label for="new_password_confirmation">Konfirmasi
                                    password</label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                    class="form-control">
                            </div>
                            <div class="row px-5">
                                <button type="submit" class="btn btn-primary mt-3">Kirim</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endsection
