@extends('admin.app')

@section('fluid')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-xl-6">
                <div class="card bg-light-success shadow-none">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 fs-5">Prestasi</h6>
                            <div class="ms-auto d-flex align-items-center">
                                <span class="fs-3 fw-bold">Terbaru
                                    @isset($prestation)
                                        {{ $prestation->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                    @else
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <h3 class="mb-0 fs-6">Total Berita</h3>
                                <span class="fw-bold fs-6">
                                    @isset($prestation_count)
                                        {{ $prestation_count }}
                                    @else
                                        0
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-6">
                        <div class="card bg-light-primary shadow-none">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="mb-0 fs-5">Pengumuman</h6>
                                    <div class="ms-auto d-flex align-items-center">
                                        <span class="fs-3 fw-bold">Terbaru
                                            @isset($announcement)
                                                {{ $announcement->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                            @else
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4">
                                        <h3 class="mb-0 fs-6">Total Berita</h3>
                                        <span class="fw-bold fs-6">
                                            @isset($announcement_count)
                                                {{ $announcement_count }}
                                            @else
                                                0
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xl-6">
                                <div class="card bg-light-warning shadow-none">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class="mb-0 fs-5">Dari Kelas
                                                @isset($class)
                                                    {{ $class->class_category_id }}
                                                @else
                                                    @endif
                                                </h6>
                                                <div class="ms-auto d-flex align-items-center">
                                                    <span class="fs-3 fw-bold">Terbaru
                                                        @isset($class)
                                                            {{ $class->created_at->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                                        @else
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mt-4">
                                                    <h3 class="mb-0 fs-6">Total Berita Kelas</h3>
                                                    <span class="fw-bold fs-6">{{ $class_count }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xl-6">
                                        <div class="card bg-light-danger shadow-none">
                                            <div class="card-body p-4">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="mb-0 fs-5">Dari Ekstra
                                                        @isset($ekstra)
                                                            {{ $ekstra->name_ekstra->name }}
                                                        @else
                                                            @endif
                                                        </h6>
                                                        <div class="ms-auto d-flex align-items-center">
                                                            <span class="fs-3 fw-bold">Terbaru
                                                                @isset($ekstra)
                                                                    {{ $ekstra->created_at->locale('id_ID')->isoFormat('D MMMM, YYYY') }}
                                                                @else
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-between mt-4">
                                                            <h3 class="mb-0 fs-6">Total Berita</h3>
                                                            <span class="fw-bold fs-6">
                                                                @isset($ekstra_count)
                                                                    {{ $ekstra_count }}
                                                                @else
                                                                    0
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endsection
