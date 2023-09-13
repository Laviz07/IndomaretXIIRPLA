@extends('layout.layout');
@section('title', 'Data Barang')
    
@section("content")
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <span class="h2">Daftar Barang</span>
            </div>
            <div class="card-body">
                <table class="table table-hovered table-bordered DataTable">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>
                                Nama Barang
                            <th>
                                Barcode
                            </th>
                            </th>
                            <th>
                                Aksi
                            </th>
                            {{-- <th>
                                Stok
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                        ?>
                        @foreach($barang as $br)
                        {{-- @php
                            $st = $stok;
                        @endphp --}}
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$br->nama_barang}}</td>
                            <td>{{$br->barcode}}</td>
                            {{-- <td>{{$st->harga}}</td> --}}
                            <td>
                                <a href="{{url('/dashboard')}}/barang/edit/{{$br->id_barang}}">
                                    <btn class="btn btn-primary">Edit</btn>
                                </a>
                                <btn class="hapusBtn btn btn-danger" idBarang="{{$br->id_barang}}">Hapus</btn>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="
                {{url('/dashboard')}}/barang/tambah
                ">
                    <btn class="btn btn-success">Tambah </btn></a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script type="module">
$('.DataTable tbody').on('click','.hapusBtn',function(a){
    a.preventDefault();
    let idBarang = $(this).closest('.hapusBtn').attr('idBarang');
    swal.fire({
            title : "Apakah anda ingin menghapus data ini?",
            showCancelButton: true,
            confirmButtonText: 'Setuju',
            cancelButtonText: `Batal`,
            confirmButtonColor: 'red'

        }).then((result)=>{
            if(result.isConfirmed){
                //dilakukan proses hapus
                axios.delete('barang/hapus/'+idBarang).then(function(response){
                    console.log(response);
                    if(response.data.success){
                        swal.fire('Berhasil di hapus!', '', 'success').then(function(){
                                //Refresh Halaman
                                location.reload();
                            });
                    }else{
                        swal.fire('Gagal di hapus!', '', 'warning').then(function(){
                                //Refresh Halaman
                                location.reload();
                            });
                    }
                }).catch(function(error){
                    swal.fire('Data gagal di hapus!', '', 'error').then(function(){
                                //Refresh Halaman
                               
                            });
                });
            }
        });
});
$('.DataTable').DataTable();
</script>
@endsection