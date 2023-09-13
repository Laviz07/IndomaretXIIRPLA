@extends('layout.layout');
@section('title,Tambah Cabang')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1"> Tambah Data Perusahaan</span>
            </div>
            <div class="card-body">
                <form action="simpan" method="POST">
                  
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label >Nama Cabang</label>
                                <input type="text" class="form-control" name="nama_cabang">
                            </div>
                            <div class="form-group">
                                <label >Kode Cabang</label>
                                <input type="text" class="form-control" name="kode_cabang">
                            </div>
                            <div class="form-group">
                                <label >Alamat</label>
                                <input type="text" class="form-control" name="alamat">
                            </div>
                            <div class="form-group">
                                <label >Penanggung Jawab</label>
                                <input type="text" class="form-control" name="penanggung_jawab">
                                @csrf
                            </div>
                        </div>
                    </div>  
                    {{-- <p> --}}
                        <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-success" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection