@extends('layout.app')
@section('title', 'Data Barang Status bisa dijual')
@section('contact-active', 'active')

@section('content')
    <div class="section py-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Data Barang dengan Status bisa dijual</h1>
            </div>
            <div class="col-md-12 py-3">
                <div class="text-right">
                    <a href="{{ route('barangs.index') }}" class="btn btn-primary">kembali</a>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" id="table">
                    <thead>
                        <tr>
                            <th scope="col">Id Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <th scope="row">{{ $row->id_produk }}</th>
                            <td>{{ $row->nama_produk }}</td>
                            <td>{{ $row->harga }}</td>
                            <td>{{ $row->kategori }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                <a href="{{ route('barangs.edit', $row->id_produk) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                <button onclick="deleteItem(this)" data-id="{{ $row->id_produk }}" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@include('barang.deleteScript')
@endsection