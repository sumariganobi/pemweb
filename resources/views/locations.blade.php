<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lokasi Gudang</title>
    <link href="{{asset('assets/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container mt-5">
    <h1>Daftar Lokasi Gudang</h1>
    <a href="{{ route('locations.create') }}" class="btn btn-primary mb-3">Tambah Lokasi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
            <tr>
                <td>{{ $location->id }}</td>
                <td>{{ $location->name }}</td>
                <td>{{ $location->description }}</td>
                <td>
                    <a href="{{ route('locations.show', $location->id) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
