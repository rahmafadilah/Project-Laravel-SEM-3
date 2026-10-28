
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// membuat route untuk parameter
Route::get('/user/{id}', function ($id) {
    return 'User ID: '.$id;
});

Route::get('/hello', function () {
    return 'Hello Rahma';
});

Route::get('/barang/{jenis}/{merek}', function ($jenis, $merek) {
    return "Cek sisa stok barang untuk $jenis <br> mereknya adalah $merek";
});

Route::get('/stok_barang/{jenis?}/{merek}', 
function ($a = 'smartphone', $b = 'samsung') {
    return "Cek sisa stok untuk $a $b";
});

// parameter grouping

 // parameter grouping
Route::prefix('link')->group(function () {
    Route::get('/mahasiswa', function () {
        $mahasiswa = [
            (object) [
                'nama' => 'Rahma Fadilah',
                'nim' => '021250015',
                'jurusan' => 'Sistem Informasi'
            ],
            (object) [
                'nama' => 'Zhang Linghe',
                'nim' => '123456790',
                'jurusan' => 'Informatika'
            ]
        ];

        return view('mahasiswa', compact('mahasiswa'));
    })->name('mahasiswa');

    Route::get('/dosen', function () {
        return view('dosen');
    })->name('dosen');

    Route::get('/baak', function () {
        return 'ini halaman baak';
    });
});

