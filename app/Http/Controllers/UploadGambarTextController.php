<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadGambarTextController extends Controller
{
    public function fileUpload()
    {
        return view('uploadGambarText');
    }
    public function prosesFileUpload(Request $request)
    {

        $request->validate([
            'namaGambar' => 'required',
            'berkas' => 'required|file|image|max:500',
        ]);


        $extension = $request->berkas->getClientOriginalExtension();
        $namaFile = $request->namaGambar . '.' . $extension;

        $path = $request->berkas->move('gambar', $namaFile);
        $path = str_replace("\\", "//", $path);


        $pathBaru = asset('gambar/' . $namaFile);
        echo "Gambar berhasil di upload ke:<a href='$pathBaru'>$namaFile</a>";
        echo "<br>";
        echo "<img src='$pathBaru' alt='$namaFile' style='max-width: 500px;
        height: auto;'>";
    }



}

