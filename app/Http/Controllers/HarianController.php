<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class HarianController extends Controller
{
     public function insertDataHarian(Request $request){
         DB::table('presensi_harian')->insert([
             'tahun_akademik' => $request->input('tahun_akademik'),
             'semester' => $request->input('semester'),
             'tanggal' => $request->input('tanggal'),
             'hari' => $request->input('hari'),
             'id_guru' => $request->input('id_guru'),
             'jam_masuk' => $request->input('jam_masuk'),
             'jam_pulang' => $request->input('jam_pulang'),
             'metode' => $request->input('metode'),
             'keterangan' => $request->input('keterangan')
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
     public function updateDataHarian(request $request){
         DB::table('presensi_harian')->where('id_presensi_harian', $request->input('id_presensi_harian'))->update([
            'tahun_akademik' => $request->input('tahun_akademik'),
            'semester' => $request->input('semester'),
            'tanggal' => $request->input('tanggal'),
            'hari' => $request->input('hari'),
            'id_guru' => $request->input('id_guru'),
            'jam_masuk' => $request->input('jam_masuk'),
            'jam_pulang' => $request->input('jam_pulang'),
            'metode' => $request->input('metode'),
            'keterangan' => $request->input('keterangan')
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
     public function getDataHarian(){
        // $ambildata = DB::table('kelas')->first(); --> first(cmn nampilin yg pertama)
         $ambildata1 = DB::table('presensi_harian')->get();
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
                                 "DataMapel"=> $ambildata1], 250);
         }else {
             return response()->json(["Result"=>
             ["ResultCode"=>0,
             "ResultMassege"=>"User atau password salah"]], 401
             );
         }
 
     }
     public function getDataHarianToken(){
        $token = Str::random(60);
        $hash_token = hash('sha256', $token);
        print_r($token);exit;
        // $ambildata = DB::table('kelas')->first(); --> first(cmn nampilin yg pertama)
         $ambildata1 = DB::table('presensi_harian')->get();
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
                                 "DataPresensi"=> $ambildata1], 250);
         }else {
             return response()->json(["Result"=>
             ["ResultCode"=>0,
             "ResultMassege"=>"User atau password salah"]], 401
             );
         }
 
     }

     public function deleteDataHarian(request $request){
        dd($request->input('id_presensi_harian'));
         DB::table('presensi_harian')->where('id_presensi_harian', $request->input('id_presensi_harian'))->delete();
         
         return response()->json(
            ["Result"=>
               [
                   "ResultCode"=> 0,
                   "ResultMessage"=>"Success Data Berhasil Dihapus"
               ]
               ],200
           );
     }
     
     public function deleteDataHarianParam($id){
        dd($id);
        DB::table('presensi_harian')->where('id_presensi_harian', $id)->delete();
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