@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $breadcrumb->title }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach ($breadcrumb->list as $key => $value)
                        @if ($loop->last)
                            <li class="breadcrumb-item active">{{ $value }}</li>
                        @else
                            <li class="breadcrumb-item">{{ $value }}</li>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $page->title }}</h3>
            </div>

            <form action="{{ route('stok.update', $stok->stok_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="barang_id">Barang</label>
                        <select name="barang_id" class="form-control" required>
                            @foreach($barangs as $b)
                                <option value="{{ $b->barang_id }}" {{ $b->barang_id == $stok->barang_id ? 'selected' : '' }}>
                                    {{ $b->barang_nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="supplier_id">Supplier</label>
                        <select name="supplier_id" class="form-control" required>
                            @foreach($suppliers as $s)
                                <option value="{{ $s->supplier_id }}" {{ $s->supplier_id == $stok->supplier_id ? 'selected' : '' }}>
                                    {{ $s->supplier_nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="user_id">User</label>
                        <select name="user_id" class="form-control" required>
                            @foreach($users as $u)
                                <option value="{{ $u->user_id }}" {{ $u->user_id == $stok->user_id ? 'selected' : '' }}>
                                    {{ $u->user_nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" value="{{ $stok->jumlah }}" required>
                    </div>

                    <div class="form-group">
                        <label for="stok_tanggal">Tanggal</label>
                        <input type="datetime-local" name="stok_tanggal" class="form-control"
                            value="{{ \Carbon\Carbon::parse($stok->stok_tanggal)->format('Y-m-d\TH:i') }}" required>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('stok.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
