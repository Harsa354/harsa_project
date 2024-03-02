<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\DetailTransaksi;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreTransaksiRequest $request)
    {
        try {
            DB::beginTransaction();

            $last_id = Transaksi::where('tanggal', date('Y-m-d'))->orderBy('created_at', 'desc')->select('id')->first();

            $notrans = $last_id == null ? date('Ymd') . '0001' : date('Ymd') . sprintf('%04d', substr($last_id->id, 8, 4) + 1);
            // dd($notrans);
            $insertTransaksi = Transaksi::create([
                'id' => $notrans,
                'tanggal' => date('Y-m-d'),
                'total_harga' => $request->total,
                'metode_pembayaran' => 'cash',
                'keterangan' => ''
            ]);
            if (!$insertTransaksi->exists) return 'eror';

            //input detail transaksi
            foreach ($request->orderedList as $detail) {
                //dd($detail);
                $insertDetailTransaksi = DetailTransaksi::create([
                    'transaksi_id' => $notrans,
                    'menu_id' => $detail['id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty']

                ]);
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => 'pemesanan berhasil!']);
        } catch (Exception | QueryException | PDOException $e) {
            dd($e);
            return response()->json(['status' => false, 'message' => 'Pemesanan Gagal']);
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function faktur($nofaktur){

        $data = Transaksi::where('id', $nofaktur)->with(['detailTransaksi'])->first();
        dd($data);
    }

}
