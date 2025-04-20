@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Stok</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Barang: {{ $stok->barang->barang_nama }}</h5>
            <p class="card-text"><strong>Jumlah:</strong> {{ $stok->jumlah }}</p>
            <p class="card-text"><strong>Tanggal Stok:</strong> {{ $stok->stok_tanggal }}</p>
            <p class="card-text"><strong>Supplier:</strong> {{ $stok->supplier->supplier_nama ?? '-' }}</p>
            <p class="card-text"><strong>Input oleh:</strong> {{ $stok->user->nama ?? '-' }}</p>
            <p class="card-text"><strong>Created At:</strong> {{ $stok->created_at }}</p>
            <p class="card-text"><strong>Updated At:</strong> {{ $stok->updated_at ?? '-' }}</p>

            <a href="{{ route('stok.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection