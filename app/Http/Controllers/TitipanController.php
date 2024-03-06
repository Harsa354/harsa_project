<?php

namespace App\Http\Controllers;

use App\Exports\ProdukTitipanExport;
use App\Http\Requests\StoreTitipanRequest;
use App\Http\Requests\UpdateTitipanRequest;
use App\Imports\ProdukTitipanImport;
use App\Models\Titipan;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class TitipanController extends Controller
{

    public function index()
    {
        $titipan = Titipan::latest()->get();
        $i = 0;
        return view('titipan.index', compact('titipan'), [
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
    public function store(StoreTitipanRequest $request)
    {
        // dd($request);
        Titipan::create($request->all());

        return redirect('titipan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Titipan $titipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Titipan $titipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTitipanRequest $request, Titipan $titipan)
    {
        $titipan->update($request->all());
        return redirect('titipan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Titipan $titipan)
    {
        $titipan->delete();
        return redirect('titipan');
    }


    public function export() 
    {
        return Excel::download(new ProdukTitipanExport, 'titipan.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $namafile = $file->getClientOriginalName();
        $file->move('DataTitipan', $namafile);
        Excel::import(new ProdukTitipanImport, public_path('/DataTitipan/'.$namafile));
        return redirect()->back()->with('success', 'Import data berhasil');
    }
}
