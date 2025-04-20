@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Stok</h3>
            <div class="card-tools">
                <a href="{{ route('stok.create') }}" class="btn btn-sm btn-primary mt-1">Tambah Stok</a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stok as $item)
                        @php
                            $stokTersedia = $item->barang->stok->sum('jumlah') - $item->barang->penjualanDetail->sum('jumlah');
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->barang->barang_nama }}</td>
                            <td>{{ $stokTersedia }}</td>
                            <td>{{ $item->stok_tanggal }}</td>
                            <td>
                                <a href="{{ route('stok.edit', $item->stok_id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>

                                {{-- Tombol toggle form --}}
                                <button type="button" class="btn btn-success btn-sm mb-1" onclick="toggleForm({{ $item->stok_id }})">Terjual</button>

                                {{-- Form penjualan --}}
                                <form id="form-penjualan-{{ $item->stok_id }}" action="{{ route('penjualan.store') }}" method="POST" style="display: none; margin-top: 10px;">
                                    @csrf
                                    <input type="hidden" name="barang_id" value="{{ $item->barang_id }}">

                                    <input type="text" name="pembeli" class="form-control form-control-sm mb-2" placeholder="Nama pembeli" required>

                                    <input type="number" name="jumlah" class="form-control form-control-sm mb-2" placeholder="Jumlah (max {{ $stokTersedia }})" max="{{ $stokTersedia }}" required>

                                    <input type="number" name="harga" class="form-control form-control-sm mb-2" placeholder="Harga" required>

                                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                </form>

                                {{-- Form hapus --}}
                                <form action="{{ route('stok.destroy', $item->stok_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                                </form>                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
<script>
    function toggleForm(id) {
        const form = document.getElementById('form-penjualan-' + id);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>
@endpush
