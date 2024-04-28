<?php

namespace App\Imports;

use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KategoriImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kategori([
            'nama' => $row['nama'],  //menyimpan data nama kategori dari excel ke database
        ]);
    }
    public function headingRow(): int
    {
        return 4; //baris pertama yang di skip karena tidak ada data
    }
}
