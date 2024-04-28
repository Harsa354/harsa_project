<?php

namespace App\Http\Controllers;

use App\Exports\KategoriExport;
use App\Imports\KategoriImport;
use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Maatwebsite\Excel\Facades\Excel;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::latest()->get();
        $i = 0;
        return view('kategori.index', compact('kategoris'), [
            'no' => $i
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriRequest $request)
    {
        // dd($request);
        Kategori::create($request->all());

        return redirect('kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        $kategori->update($request->all());
        return redirect('kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect('kategori');
    }

    public function export()
    {
        return Excel::download(new KategoriExport, 'kategori.xlsx');
    }
    public function import(Kategori $request)
    {
        $file = $request->file('file');
        $namafile = $file->getClientOriginalName();
        $file->move('DataKategori', $namafile);
        Excel::import(new KategoriImport, public_path('/DataKategori/' . $namafile));
        return redirect()->back()->with('success', 'Import data berhasil');
    }

}
