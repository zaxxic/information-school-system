@extends('admin.app')
@section('link')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css" />
@endsection
@section('fluid')
    <div class="container-fluid ">
        <div class="row">
            <div class="d-flex justify-content-between">
                <div class="card-header fs-4">
                    Berita kelas 1
                </div>
                <div id="buatTim" class="d-flex align-items-end">
                    <a class="btn btn-primary" href="{{ Route('prestation.create') }}">Buat Berita</a>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-4 gap-2">
                <div class="filter col-lg-3 col-md-3 col-sm-3">
                    <label for="dateRangePicker" class="form-label">Filter tanggal</label>
                    <form id="filterForm" method="get">
                        <input name="nama_tim" id="dateRangePicker" type="text" class="form-control chat-search-input"
                            aria-describedby="basic-addon-search31" value="">
                    </form>
                </div>

                <div class="filter col-lg-3 col-md-3 col-sm-3">
                    <label for="select2Basic" class="form-label">Cari</label>
                    <form method="get">
                        <div class="flex-grow-1 input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
                            <input name="nama_tim" type="text" class="form-control chat-search-input"
                                placeholder="Cari Berita..." aria-label="Cari nama tim..."
                                aria-describedby="basic-addon-search31" value="">
                        </div>
                        <input type="hidden" name="status_tim" value="">
                    </form>
                </div>
            </div>
            @foreach ($prestation as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img class="card-img-top img-responsive" src="{{ asset('storage/announcement/' . $item->photo) }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title">{{ $item->title }}</h4>
                                @if ($item->status == 0)
                                    <label class="text-danger"> Tidak aktif</label>
                                @else
                                    <label class="text-success "> Aktif</label>
                                @endif
                            </div>
                            <dfn>{{ $item->user->name }} Sebagai {{ $item->user->role }}</dfn>
                            <p class="card-text mt-1">
                                
                            </p>
                            <div class="row d-flex justify-content-between">
                                @if ($item->status == 1)
                                    <a href="#" onclick="deactivate({{ $item->id }})"
                                        class="btn btn-primary col-3"><svg xmlns="http://www.w3.org/2000/svg" width="28"
                                            height="28" viewBox="0 0 20 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M18 6L6 18M6 6l12 12" />
                                        </svg>
                                    </a>
                                @else
                                    <a href="#" onclick="confirmAccept({{ $item->id }})"
                                        class="btn btn-success col-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                            viewBox="0 0 20 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m5 12l5 5L20 7" />
                                        </svg>
                                    </a>
                                @endif
                                <a href="#" onclick="deleteConfirmation({{ $item->id }})"
                                    class="btn btn-danger col-3"><svg xmlns="http://www.w3.org/2000/svg" width="28"
                                        height="28" viewBox="0 0 20 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                    </svg> </a>
                                <a href="{{ route('prestation.edit', ['prestation' => $item->id]) }}"
                                    data-title="{{ $item->title }}" class="btn btn-warning col-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                        viewBox="0 0 20 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M4 20h4L18.5 9.5a1.5 1.5 0 0 0-4-4L4 16v4m9.5-13.5l4 4" />
                                    </svg>
                                </a>

                            </div>
                            <form id="delete-form-{{ $item->id }}"
                                action="{{ route('prestation.destroy', ['prestation' => $item->id]) }}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <form id="acc-form-{{ $item->id }}"
                                action="{{ route('accepted.announcement', ['id' => $item->id]) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('PUT')
                            </form>
                            <form id="deactivate-form-{{ $item->id }}"
                                action="{{ route('deactive.announcement', ['id' => $item->id]) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('PUT')
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    @endsection
    @section('script')
        <script>
            function confirmAccept(id) {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menerima kelas ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Terima!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('acc-form-' + id).submit();
                    }
                });
            }

            function deactivate(id) {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin non kelas ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Terima!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('deactivate-form-' + id).submit();
                    }
                });
            }

            function deleteConfirmation(itemId) {
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: 'Yakin akan menghapus ini ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Iya',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + itemId).submit();
                    }
                });
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.js"></script>

        <script src="{{ asset('asset/admin/dist/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
        <script src="{{ asset('asset/admin/dist/js/plugins/repeater-init.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#dateRangePicker').daterangepicker();

                $('#dateRangePicker').on('apply.daterangepicker', function(ev, picker) {
                    $('#filterForm').submit();
                });
            });
        </script>
    @endsection
