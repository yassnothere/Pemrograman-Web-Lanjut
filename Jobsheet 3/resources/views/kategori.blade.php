<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Data Kategori</h2>

    <table>
        <thead>
            <tr>
                <th>Kategori ID</th>
                <th>Kategori Kode</th>
                <th>Nama Kategori</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $k)
            <tr>
                <td>{{ $k->kategori_id }}</td>
                <td>{{ $k->kategori_kode }}</td>
                <td>{{ $k->nama_kategori }}</td>
                <td>{{ $k->created_at ?? 'NULL' }}</td>
                <td>{{ $k->updated_at ?? 'NULL' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
