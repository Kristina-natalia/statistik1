<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perhitungan Statistik</title>
</head>
<body>
    <h1>Hasil Perhitungan Statistik</h1>

    <p>Mean (Rata-rata): {{ $mean }}</p>
    <p>Median: {{ $median }}</p>
    <p>Modus: {{ $modus }}</p>
    <p>Batas Atas: {{ $upperLimit }}</p>
    <p>Batas Bawah: {{ $lowerLimit }}</p>

    <a href="{{ route('data.index') }}">Kembali ke Daftar Data</a>
</body>
</html>
