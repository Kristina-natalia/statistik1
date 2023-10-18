<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    //
    public function index()
{
    $data = Data::all(); // Ambil semua data yang akan ditampilkan
    return view('data.index', compact('data')); // Kirim data ke tampilan
}
public function create()
{
    return view('data.create');
}

public function edit($id)
{
    $data = Data::find($id);
    return view('data.edit', ['data' => $data]);
}

public function destroy($id)
{
    Data::find($id)->delete();
    return redirect()->route('data.index')->with('success', 'Data berhasil dihapus.');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama' => 'required',
        'nilai' => 'required|integer',
    ]);

    Data::create($validatedData);

    return redirect()->route('data.index')->with('success', 'Data berhasil ditambahkan.');
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nama' => 'required',
        'nilai' => 'required|integer',
    ]);

    Data::whereId($id)->update($validatedData);

    return redirect()->route('data.index')->with('success', 'Data berhasil diperbarui.');
}

public function calculateStatistics()
{
    // Ambil semua data dari database
    $data = Data::all();

    // Hitung Mean
    $mean = $data->avg('nilai');

    // Hitung Median
    $sortedData = $data->sortBy('nilai')->values()->all();
    $count = count($sortedData);
    if ($count % 2 == 0) {
        $median = ($sortedData[($count / 2) - 1]['nilai'] + $sortedData[($count / 2)]['nilai']) / 2;
    } else {
        $median = $sortedData[floor($count / 2)]['nilai'];
    }

    // Hitung Modus
    $counts = array_count_values(array_column($sortedData, 'nilai'));
    arsort($counts);
    $modus = array_keys($counts)[0];

    // Hitung Batas Atas dan Batas Bawah (Anda perlu menentukan nilai z_score)
    $z_score = 1.96; // Misalnya, untuk tingkat kepercayaan 95%
    $stdDev = $data->std('nilai');
    $mean = $data->avg('nilai');
    $sampleSize = $count;
    $marginError = ($z_score * ($stdDev / sqrt($sampleSize)));
    $upperLimit = $mean + $marginError;
    $lowerLimit = $mean - $marginError;

    // Tabel Z biasanya didapatkan dari referensi tabel statistik, Anda perlu mencarinya atau menghitungnya sendiri.

    return view('statistics', compact('mean', 'median', 'modus', 'upperLimit', 'lowerLimit'));
}


}
