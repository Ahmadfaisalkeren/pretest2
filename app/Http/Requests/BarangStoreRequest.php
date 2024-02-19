<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kd_kategori' => 'required',
            'kd_satuan' => 'required',
            'nama' => 'required|string|unique:tabel_barang,nama|min:2|max:20',
            'jumlah' => 'required|numeric'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'kd_kategori.required' => 'Kode Kategori harus diisi.',
            'kd_satuan.required' => 'Kode Satuan harus diisi.',
            'nama.required' => 'Nama Barang harus diisi.',
            'nama.string' => 'Nama Barang harus berupa teks.',
            'nama.unique' => 'Nama Barang sudah ada.',
            'nama.min' => 'Nama Barang minimal harus 2 karakter.',
            'nama.max' => 'Nama Barang maksimal hanya boleh 20 karakter.',
            'jumlah.required' => 'Jumlah harus diisi.',
            'jumlah.numeric' => 'Jumlah harus berupa angka.',
        ];
    }
}
