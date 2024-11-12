<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::paginate(10);
        return view('page.transaksi.index')->with([
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transaksi = Transaksi::all();
        return view('page.transaksi.create')->with([
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'id_outlet' => $request->input('id_outlet'),
            'kode_invoice' => $request->input('kode_invoice'),
            'id_member' => $request->input('id_member'),
            'tanggal' => $request->input('tanggal'),
            'batas_waktu' => $request->input('batas_waktu'),
            'tgl_barang' => $request->input('tgl_barang'),
            'biaya_tambahan' => $request->input('biaya_tambahan'),
            'diskon' => $request->input('diskon'),
            'pajak' => $request->input('pajak'),
            'status' => $request->input('status'),
            'dibayar' => $request->input('dibayar'),
            'id_user' => $request->input('id_user'),
        ];

        Transaksi::create($data);

        return back()->with('message_delete', 'Data Transaksi Sudah dihapus');
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
            'id_outlet' => $request->input('id_outlet'),
            'kode_invoice' => $request->input('kode_invoice'),
            'id_member' => $request->input('id_member'),
            'tanggal' => $request->input('tanggal'),
            'batas_waktu' => $request->input('batas_waktu'),
            'tgl_barang' => $request->input('tgl_barang'),
            'biaya_tambahan' => $request->input('biaya_tambahan'),
            'diskon' => $request->input('diskon'),
            'pajak' => $request->input('pajak'),
            'status' => $request->input('status'),
            'dibayar' => $request->input('dibayar'),
            'id_user' => $request->input('id_user'),
        ];

        $datas = Transaksi::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Data Transaksi Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Transaksi::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Transaksi Sudah dihapus');
    }
}
