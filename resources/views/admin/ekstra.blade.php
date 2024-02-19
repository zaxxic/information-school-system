@extends('admin.app')
@section('fluid')
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex justify-content-between mb-4">
                <div class="card-header fs-4">
                    Ekstrakurikuler
                </div>
                <div id="buatTim" class="d-flex align-items-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">Buat
                        Ekstrakurikuler</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                <thead>
                    <!-- start row -->
                    <tr>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                    <!-- end row -->
                </thead>
                <tbody>
                    @foreach ($ekstras as $item)
                        <tr>
                            <td>{{ $item->name }}</td>

                            <td>
                                <a href="#" onclick="deleteConfirmation({{ $item->id }})"
                                    class="btn btn-sm btn-danger col-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                        viewBox="0 0 20 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                </a>
                                <form id="delete-form-{{ $item->id }}"
                                    action="{{ route('ekstrakurikuler.destroy', ['id' => $item->id]) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button id="modalEditTrigger"
                                    data-route="{{ Route('ekstrakurikuler.edit', ['id' => $item->id]) }}"
                                    data-id="{{ $item->id }}"
                                    data-route="{{ Route('ekstrakurikuler.edit', ['id' => $item->id]) }}"
                                    data-name="{{ $item->name }}" class="btn btn-sm btn-warning col-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                        viewBox="0 0 20 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M4 20h4L18.5 9.5a1.5 1.5 0 0 0-4-4L4 16v4m9.5-13.5l4 4" />
                                    </svg>
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="bs-example-modal-lg" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Tambah Pengguna
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="mt-1" action="{{ Route('ekstrakurikuler.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>
                        <div class="">
                            <label for="msg">Nama <label style="color: red;font-size: 22px">*</label>
                            </label>
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Name" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex">
                        <button type="submit" class="btn btn-primary">Buat
                            Pengguna</button>
                    </div>
                </form>

                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="bs-example-modal-lg" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Edit Pengguna
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateUserForm" class="mt-1" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <p>
                        <div class="">
                            <label for="msg">Nama <label style="color: red;font-size: 22px">*</label>
                            </label>
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Name" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex">
                        <button type="submit" class="btn btn-primary">Buat
                            Berita</button>
                    </div>
                </form>

                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on("click", "#modalEditTrigger", function() {
            var id = $(this).data("id");
            var name = $(this).data("name");
            var route = $(this).data("route");
            var email = $(this).data("email");


            $("#modalEdit input[name='id']").val(id);
            $("#modalEdit input[name='name']").val(name);

            $("#updateUserForm").attr("action", route);


            $("#modalEdit").modal("show");
        });
    </script>


    <script>
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
    <script src="{{ asset('asset/admin/dist/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/admin/dist/js/datatable/datatable-basic.init.js') }}"></script>
@endsection
