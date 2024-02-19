<?php

namespace App\Services;

use App\Models\KategoriBarang;
use App\Models\SatuanBarang;
use App\Models\TabelBarang;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class BarangService.
 */
class BarangService
{
    public function getBarangDataTable()
    {
        $data = TabelBarang::with('kategori', 'satuan')->orderBy('id', 'DESC')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('kategori', function ($data) {
                return $data->kategori->nama;
            })
            ->addColumn('satuan', function ($data) {
                return $data->satuan->nama;
            })
            ->addColumn('action', function ($data) {
                $edit = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Edit" class="edit btn text-white btn-info btn-sm mt-1 editBarang"><i class="far fa-edit"></i> Edit</a>';

                return $edit;
            })
            ->rawColumns(['action', 'kd_kategori', 'satuan'])
            ->make(true);
    }

    public function getKategoriBarang()
    {
        $kategori = KategoriBarang::all();

        return $kategori;
    }

    public function getSatuanBarang()
    {
        $satuan = SatuanBarang::all();

        return $satuan;
    }

    public function storeBarang(array $data)
    {
        $barang = TabelBarang::latest()->first() ?? new TabelBarang();

        $data['kode'] = str_pad($barang->id + 1, 6, '0', STR_PAD_LEFT);

        return TabelBarang::create([
            'kd_kategori' => $data['kd_kategori'],
            'kd_satuan' => $data['kd_satuan'],
            'kode' => $data['kode'],
            'nama' => $data['nama'],
            'jumlah' => $data['jumlah'],
            'id_user_insert' => auth()->user()->id,
        ]);
    }

    public function getBarangById($id)
    {
        $barang = TabelBarang::find($id);

        return $barang;
    }

    public function updateBarang(TabelBarang $barang, array $data)
    {
        $barang->kd_kategori = $data['kd_kategori'];
        $barang->kd_satuan = $data['kd_satuan'];
        $barang->nama = $data['nama'];
        $barang->jumlah = $data['jumlah'];

        $barang->save();

        return $barang;
    }
}
