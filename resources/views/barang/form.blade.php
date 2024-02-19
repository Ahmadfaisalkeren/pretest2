<div class="modal fade" id="barangModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="barangForm" name="barangForm">
                    <input type="hidden" name="barang_id" id="barang_id">
                    <div class="row">
                        <div class="form-group">
                            <label for="kd_kategori" class="col-sm-2 control-label">Pilih Kategori</label>
                            <div class="col-lg-12 input-group">
                                <select class="form-select" id="kd_kategori" name="kd_kategori" required>
                                    <option  selected disabled hidden>Pilih Kategori ...</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->kode }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="col-sm-2 control-label">Nama Barang</label>
                            <div class="col-lg-12">
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="Nama Barang" value="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kd_satuan" class="col-sm-2 control-label">Satuan</label>
                            <div class="col-lg-12">
                                <input type="text" name="kd_satuan" id="kd_satuan" class="form-control"
                                    placeholder="Satuan" value="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                            <div class="col-lg-12">
                                <input type="text" name="jumlah" id="jumlah" class="form-control"
                                    placeholder="Jumlah" value="" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10 mt-2">
                            <button type="submit" class="btn btn-primary btn-sm" id="saveBarang"><i
                                    class="fas fa-plus"></i> Tambah Barang</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="updateBarang"><i
                                    class="far fa-edit"></i> Update Barang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
