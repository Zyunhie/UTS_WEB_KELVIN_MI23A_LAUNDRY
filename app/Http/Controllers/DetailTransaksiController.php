<?php

namespace App\Http\Controllers;

use App\Models\detailTransaksi;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailTransaksi = DetailTransaksi::paginate(10);
        return view('page.detailTransaksi.index')->with([
            'detailTransaksi' => $detailTransaksi
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
    public function store(Request $request)
    {
        $data = [
            'id_transaksi' => $request->input('id_transaksi'),
            'id_paket' => $request->input('id_paket'),
            'qty' => $request->input('qty'),
            'keterangan' => $request->input('keterangan'),
        ];

        DetailTransaksi::create($data);

        return back()->with('message_delete', 'Data Konsumen Sudah dihapus');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'id_transaksi' => $request->input('id_transaksi'),
            'id_paket' => $request->input('id_paket'),
            'qty' => $request->input('qty'),
            'keterangan' => $request->input('keterangan'),
        ];

        $datas = DetailTransaksi::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Data Paket Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DetailTransaksi::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Konsumen Sudah dihapus');
    }
}
