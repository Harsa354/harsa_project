<?php

namespace App\Imports;

use App\Models\Titipan;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ProdukTitipanImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Titipan([
            'nama_produk' => $row[1],   
            'nama_supplier' => $row[2],   
            'harga_beli' => $row[3],   
            'harga_jual' => $row[4],   
            'stok' => $row[5],   
            'keterangan' => $row[6],   
        ]);
    }
}
