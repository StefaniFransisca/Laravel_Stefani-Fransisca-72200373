<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class MengajarController extends Controller
{
     public function insertDataMengajar(Request $request){
         DB::table('presensi_mengajar')->insert([
             'id_jadwal_guru' => $request->input('id_jadwal_guru'),
             'tanggal' => $request->input('tanggal'),
             'jam_mulai'=> $request->input('jam_mulai'),
             'jam_selesai'=> $request->input('jam_selesai'),
             'metode'=> $request->input('metode'),
             'keterangan'=> $request->input('keterangan')
         ]);
        
         return response()->json(
             ["Result"=>
                [
                    "ResultCode"=> 0,
                    "ResultMessage"=>"Success Data Masuk Ke Database"
                ]
                ],200
            );
     }
     public function updateDataMengajar(request $request){
         DB::table('presensi_mengajar')->where('id_presensi_mengajar', $request->input('id_guru'))->update([
            'id_jadwal_guru' => $request->input('id_jadwal_guru'),
            'tanggal' => $request->input('tanggal'),
            'jam_mulai'=> $request->input('jam_mulai'),
            'jam_selesai'=> $request->input('jam_selesai'),
            'metode'=> $request->input('metode'),
            'keterangan'=> $request->input('keterangan')
         ]);
         return response()->json(
            ["Result"=>
               [
                   "ResultCode"=> 0,
                   "ResultMessage"=>"Success Data Masuk Ke Database"
               ]
               ],200
           );
     }
     public function getDataMengajar(){
        // $ambildata = DB::table('kelas')->first(); --> first(cmn nampilin yg pertama)
         $ambildata1 = DB::table('presensi_mengajar')->get();
         if($ambildata1){
          //   return response()->json(["Results"->
          //           ["ResultCode"->1, 
          //           ["ResultMessage"->"Sukses Login"], 
         //            "DataUser"->$ambildata
         //   ],200
         //);
         return response()->json(["User"=> "Stefani",
                                 "Waktu Akses"=> today(),
                                 //"result" => 1,
                                 "DataMengajar"=> $ambildata1], 250);
         }else {
             return response()->json(["Result"=>
             ["ResultCode"=>0,
             "ResultMassege"=>"User atau password salah"]], 401
             );
         }
 
     }
     public function getDataMengajarToken(){
        $token = Str::random(60);
        $hash_token = hash('sha256', $token);
        print_r($token);exit;
        // $ambildata = DB::table('kelas')->first(); --> first(cmn nampilin yg pertama)
         $ambildata1 = DB::table('presensi_mengajar')->get();
         if($ambildata1){
          //   return response()->json(["Results"->
          //           ["ResultCode"->1, 
          //           ["ResultMessage"->"Sukses Login"], 
         //            "DataUser"->$ambildata
         //   ],200
         //);
         return response()->json(["User"=> "Stefani",
                                 "Waktu Akses"=> today(),
                                 //"result" => 1,
                                 "DataMengajar"=> $ambildata1], 250);
         }else {
             return response()->json(["Result"=>
             ["ResultCode"=>0,
             "ResultMassege"=>"User atau password salah"]], 401
             );
         }
 
     }
    
     public function deleteDataMengajar(request $request){
        dd($request->input('id_presensi_mengajar'));
         DB::table('presensi_mengajar')->where('id_presensi_mengajar', $request->input('id_guru'))->delete();
         
         return response()->json(
            ["Result"=>
               [
                   "ResultCode"=> 0,
                   "ResultMessage"=>"Success Data Berhasil Dihapus"
               ]
               ],200
           );
     }
     
     public function deleteDataMengajarParam($id){
        dd($id);
        DB::table('presensi_mengajar')->where('id_presensi_mengajar', $id)->delete();
        return response()->json(
           ["Result"=>
              [
                  "ResultCode"=> 0,
                  "ResultMessage"=>"Success Data Berhasil Dihapus"
              ]
              ],200
          );
    }
    
}