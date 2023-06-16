@extends('layout.app')
@section('title', 'Edit Data Barang ')

@section('content')
<div class="section py-5">
    <div class="card bg-light">
        <div class="col-md-12 text-center py-5">
            <h1>Edit Data Barang</h1>
        </div>
        <div class="col-md-12 text-center py-3">
            <form action="{{ route('barangs.update', $data->id_produk) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">Nama Produk : </div>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ $data->nama_produk }}">
                        @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-md-2">
                        <div class="form-group">Harga : </div>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ $data->harga }}">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">Kategori : </div>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{ $data->kategori }}">
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-md-2">
                        <div class="form-group">Status : </div>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ $data->status }}">
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right py-3">
                        <input type="submit" class="btn btn-success" value="Save">
                        <a href="{{ route('barangs.index') }}" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection