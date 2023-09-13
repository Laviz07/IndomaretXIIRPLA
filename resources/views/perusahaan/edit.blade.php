@extends('layout.layout');
@section('title', 'Edit Data Perusahaan')

@section('header')

<style>
    .spacer {
        margin-top: 10px;
    }
</style>
    
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Ubah Data Perusahaan
                    </span>
                    <form action="simpan" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group spacer">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label">Nama Perusahaan</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="hidden" name="id_perusahaan" 
                                                value="{{$perusahaan->id_perusahaan}}"> 
                                            <input type="text" name="nama_perusahaan" 
                                                value="{{$perusahaan->nama_perusahaan}}" > 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group spacer">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label"> Alamat</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="alamat"
                                                value="{{$perusahaan->alamat}}">
                                                @csrf
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-foter">
                                <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection