<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data</h1>

    <form method="POST" action="{{ route('data.update', $data->id) }}">
        @csrf
        @method('PUT')
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="{{ $data->nama }}">

        <label for="nilai">Nilai:</label>
        <input type="text" name="nilai" id="nilai" value="{{ $data->nilai }}">

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
