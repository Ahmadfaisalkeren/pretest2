@extends('template.index')

@section('title', 'Barang')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p>Data Barang</p>
                                <button class="btn btn-primary btn-xs" id="addBarang"><i class="fas fa-plus"></i> Tambah Barang</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped barang-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Kategori</th>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('barang.form')

    @push('scripts')
        <script>
            const barangIndex = '{{ route('barang.index') }}';
            const barangStore = '{{ route('barang.store') }}';
            const barangShow = '{{ route('barang.show', ['id' => 'barang_id']) }}';
            const barangUpdate = '{{ route('barang.update', ['id' => 'barang_id']) }}';
        </script>
    @endpush
@endsection
