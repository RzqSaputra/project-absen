<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Presensi;
use App\Models\webcam;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class PresensiController extends Controller
{
    public function presensi(){
        return view('presensi.index');
    }

    public function simpanPresensi(Request $request){
        $img = $request->image;
        $folderPath = "uploads/";
        
        // $image_parts = explode(";base64,", $img);
        // $image_type_aux = explode("image/", $image_parts[0]);
        // $image_base64 = base64_decode($image_parts[1]);
        $fileName = Auth::user()->name. " ".date('Y-m-d').'.png';
        $file = $folderPath . $fileName;
        Storage::put($file, $fileName);
        // $query = "INSERT INTO webcam VALUES('','$date','$fileName')";
        webcam::create([
            // $query => $request->$query
            'image' => $request->image
            // 'date' => date("Y.m.d")
        ]);
        // return redirect()->route('dashboard.dash');

        dd('Sukses Upload',$fileName);
        // 'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        
        // $conn = mysqli_connect("localhost", "root", "", "webcam");

        // if(isset($_FILES["webcam"]["tmp_name"])){
        //     $tmpName = $_FILES["webcam"]["tmp_name"];
        //     $imageName = date("Y.m.d") . " - " .date("h.i.sa") . '.jpeg';
        //     move_uploaded_file($tmpName, 'img/'. $imageName);

        //     $date = date("Y/m/d") . " & " . date("h:i:sa");
        //     $query = "INSERT INTO camera VALUES('','$date','$imageName')";
        //     mysqli_query($conn, $query); 
        // }
    }
}