<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTitipanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'nama_produk' => 'required',
            'nama_supplier' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'keterangan' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_produk.required' => 'isi dulu cok!',
            'nama_supplier.required' => 'isi dulu cok!',
            'harga_beli.required' => 'isi dulu cok!',
            'harga_jual.required' => 'isi dulu cok!',
            'stok.required' => 'isi dulu cok!',
            'keterangan.required' => 'isi dulu cok!'
        ];
    }
}
