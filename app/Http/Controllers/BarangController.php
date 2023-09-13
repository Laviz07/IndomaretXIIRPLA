<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'barang' => Barang::all()
        ];
        return view('barang.index', $data);
    }
    public function tambah()
    {
        return view('barang.tambah');
    }

    public function simpan(Request $request)
    {
        $validate = $request->validate([
            'nama_barang'   => ['required'],
            'barcode' => ['required']
        ]);

        //Check Validasi
        if ($validate) :
            if ($request->input('id_barang') !== null) :
                //Update
                $dataUpdate = Barang::where('id_barang', $request->input('id_barang'))
                    ->update($validate);
                if ($dataUpdate) :
                    return redirect('/dashboard/barang')->with('success', 'Data barang baru berhasil diupdate');
                else :
                    return redirect('/dashboard/tambah')->with('error', 'Data barang baru Gagal diupdate');
                endif;
            else :
                //Insert
                $validate['id_perusahaan'] = 1;
                $dataInsert = Barang::create($validate);
                if ($dataInsert) :
                    return redirect('/dashboard/barang')->with('success', 'Data barang baru berhasil ditambah');
                else :
                    return redirect('/dashboard/tambah')->with('error', 'Data barang baru Gagal ditambah');
                endif;

            endif;
        endif;
    }

    public function hapus(Barang $barang, Request $request)
    {
        $id_barang = $request->id;
        //Hapus 
        $aksi = $barang->where('id_barang', $id_barang)->delete();
        if ($aksi) :
            //Pesan Berhasil
            $pesan = [
                'success'   => true,
                'pesan'     => 'Data cabang berhasil dihapus'
            ];
        else :
            //Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'     => 'Data gagal dihapus'
            ];
        endif;
        return response()->json($pesan);
    }
    public function edit(Request $request)
    {
        //Get Id
        $data = [
            'barang' =>   Barang::where('id_barang', $request->id)
                ->first()
        ];
        return view('barang.edit', $data);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
