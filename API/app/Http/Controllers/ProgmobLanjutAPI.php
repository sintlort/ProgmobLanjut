<?php

namespace App\Http\Controllers;

use App\Models\admin_token;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class ProgmobLanjutAPI extends Controller
{
    public function addMahasiswa(Request $request){
        $data = mahasiswa::create([
            'nama'=>$request->nama,
            'nim'=>$request->nim,
            'alamat'=>$request->alamat,
            'gender'=>$request->gender,
        ]);
        return response()->json($data, 200);
    }

    public function showMahasiswa(Request $request){
        $data = mahasiswa::where('nama',$request->nama)->first();
        return response()->json($data,200);
    }

    public function showallMahasiswa(){
        $data = mahasiswa::all();
        return response()->json($data,200);
    }

    public function NotificationForAndroid(){
        $topic = "allDevices";
        fcm()
            ->toTopic($topic)
            ->priority('high')
            ->timeToLive(0)
            ->data([
                'title' => 'Registrasi',
                'message' => 'Seorang mahasiswa telah melakukan registrasi',
            ])
            ->send();
        return response()->json(['message'=>'Registrasi Berhasil'], 200);
    }


    public function checkRecipients(Request $request){
        $topic = "allDevices";
        fcm()
            ->toTopic($topic)
            ->priority('high')
            ->timeToLive(0)
            ->data([
                'title' => 'Registrasi',
                'message' => 'Seorang mahasiswa telah melakukan registrasi',
            ])
            ->send();
        return response()->json(['message'=>'Registrasi Berhasil'], 200);

    }

    public function testingFCM(){
        $topic = "allDevices";
        fcm()
            ->toTopic($topic)
            ->priority('high')
            ->timeToLive(0)
            ->data([
                'title' => 'Registrasi',
                'message' => 'Seorang mahasiswa telah melakukan registrasi',
            ])
            ->send();
        return response()->json(['message'=>'Registrasi Berhasil'], 200);
    }
}
