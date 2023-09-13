<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

use function Ramsey\Uuid\Codec\encode;

class PerusahaanController extends Controller
{
    protected $model;
    public function __construct()
    {
        $this->model = new Perusahaan;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan data perusahaan
        $data = [
            'perusahaan' => $this->model->first()
        ];
        return view('perusahaan.index', $data);
        // echo json_encode($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perusahaan $perusahaan)
    {
        //Halaman form untuk edit
        $data = [
            'perusahaan' => $this->model->first()
        ];
        return view('perusahaan.edit', $data);
    }

    public function simpan(Request $request)
    {
        $validate = $request->validate([
            'id_perusahaan' => ['required'],
            'nama_perusahaan' => ['required'],
            'alamat'           => ['required']
        ]);
        if ($validate) :
            Perusahaan::where('id_perusahaan', $request->get('id_perusahaan'))
                ->update($validate);
            return redirect('/dashboard/perusahaan')->with('success', 'Data Perusahaan berhasil di update');
        //endif;
        else :
            return redirect('/dashboard/perusahaan/edit')->with('error', 'Data Perusahaan gagal di edit');
        endif;
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
    public function show(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perusahaan $perusahaan)
    {
        //
    }
}
