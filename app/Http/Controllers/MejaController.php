<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Imports\MejaImport;
use App\Exports\MejaExport;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meja = Meja::latest()->get();
        $i = 0;
        return view('meja.index', compact('meja'), [
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
    public function store(StoreMejaRequest $request)
    {
        // dd($request);
        Meja::create($request->all());

        return redirect('meja');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMejaRequest $request, Meja $meja)
    {
        $meja->update($request->all());
        return redirect('meja');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meja $meja)
    {
        $meja->delete();
        return redirect('meja');
    }

    public function export()
    {
        return Excel::download(new MejaExport, 'meja.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $namafile = $file->getClientOriginalName();
        $file->move('DataMeja', $namafile);
        Excel::import(new MejaImport, public_path('/DataMeja/' . $namafile));
        return redirect()->back()->with('success', 'Import data berhasil');
    }
    }

