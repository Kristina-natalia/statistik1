<!DOCTYPE html>
<html>
<head>
    <title>Daftar Data</title>
</head>
<body>
    <h1>Daftar Data</h1>

    <table>
        <tr>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Aksi</th>
        </tr>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nilai }}</td>
            <td>
                <a href="{{ route('data.edit', $item->id) }}">Edit</a>
                <form action="{{ route('data.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
