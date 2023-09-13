@extends('layout.layout');
@section('title', 'Tambah Data Barang')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1"> Tambah Data Barang</span>
            </div>
            <div class="card-body">
                <form action="simpan" method="POST">
                  
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label >Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang">
                            </div>
                            <div class="form-group">
                                <label >Barcode</label>
                                <input type="text" class="form-control" name="barcode">
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