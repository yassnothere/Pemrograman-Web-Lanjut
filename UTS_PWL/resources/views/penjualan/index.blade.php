@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('penjualan/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Pembeli</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penjualans as $key => $p)
                        @foreach($p->details as $detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->penjualan_kode }}</td>
                                <td>{{ $p->penjualan_tanggal }}</td>
                                <td>{{ $p->pembeli }}</td>
                                <td>{{ $detail->barang->barang_nama ?? '-' }}</td>
                                <td>{{ $detail->jumlah }}</td>
                                <td>Rp{{ number_format($detail->harga, 0, ',', '.') }}</td>
                                <td>Rp{{ number_format($detail->harga * $detail->jumlah, 0, ',', '.') }}</td>
                                <td>{{ $p->user->username ?? '-' }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#table_penjualan').DataTable({
                responsive: true,
                paging: true,
                searching: true,
                ordering: false
            });
        });
    </script>
@endpush
