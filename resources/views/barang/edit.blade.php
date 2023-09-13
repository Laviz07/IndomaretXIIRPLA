@extends('layout.layout')
@section('title','Tambah Cabang ')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Ubah data Barang
                </span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{url('/dashboard')}}/barang/simpan">
                
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" value="{{$barang->nama_barang}}" />
                                <input type="hidden" name="id_barang" value="{{$barang->id_barang}}" />
                            </div>
                            <div class="form-group">
                                <label>Barcode</label>
                                <input type="text" class="form-control" name="barcode" value="{{$barang->barcode}}"/>
                                @csrf
                            </div>

                        </div>
                    </div>    
                        <p>
                            <hr>
                            <div class="row">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">SIMPAN</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection