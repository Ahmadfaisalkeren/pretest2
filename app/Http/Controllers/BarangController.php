<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Services\BarangService;
use App\Http\Requests\BarangStoreRequest;
use App\Http\Requests\BarangUpdateRequest;
use App\Models\TabelBarang;

class BarangController extends Controller
{
    protected $barangService;

    public function __construct(BarangService $barangService)
    {
        $this->barangService = $barangService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->barangService->getBarangDataTable();
        }

        $kategori = $this->barangService->getKategoriBarang();
        $satuan = $this->barangService->getSatuanBarang();

        return view('barang.index', compact('kategori', 'satuan'));
    }

    public function store(BarangStoreRequest $request)
    {
        $resource = $this->barangService->storeBarang($request->validated());

        return response()->json([
            'success' => 'Barang berhasil ditambahkan',
            'resource' => $resource,
        ]);
    }

    public function show($id)
    {
        $barang = $this->barangService->getBarangById($id);

        return response()->json($barang);
    }

    public function update(BarangUpdateRequest $request, $id)
    {
        $barang = TabelBarang::findOrFail($id);
        $this->barangService->updateBarang($barang, $request->validated());

        return response()->json([
            'success' => 'Barang berhasil di perbaharui',
        ]);
    }

}
