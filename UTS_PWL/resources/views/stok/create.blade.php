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
                        @if ($key == count($breadcrumb->list) - 1)
                            <li class='breadcrumb-item active'>{{ $value }}</li>
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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('stok.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="barang_id" class="form-label">Barang</label>
                    <select name="barang_id" class="form-control" required>
                        @foreach($barangs as $b)
                            <option value="{{ $b->barang_id }}">{{ $b->barang_nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="supplier_id" class="form-label">Supplier</label>
                    <select name="supplier_id" class="form-control" required>
                        @foreach($suppliers as $s)
                            <option value="{{ $s->supplier_id }}">{{ $s->supplier_nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <select name="user_id" class="form-control" required>
                        @foreach($users as $u)
                            <option value="{{ $u->user_id }}">{{ $u->username }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="stok_tanggal" class="form-label">Tanggal</label>
                    <input type="datetime-local" name="stok_tanggal" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
</section>
@endsection
