<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class JadwalController extends Controller
{
     public function insertDataJadwal(Request $request){
         DB::table('jadwal_guru')->insert([
             'tahun_akademik' => $request->input('tahun_akademik'),
             'semester' => $request->input('semester'),
             'id_guru'=> $request->input('id_guru'),
             'hari'=> $request->input('hari'),
             'id_kelas' => $request->input('id_kelas'),
             'id_mapel' => $request->input('id_mapel'),
             'jam_mulai' => $request->input('jam_mulai'),
             'jam_selesai'=> $request->input('jam_selesai')
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
     public function updateDataJadwal(request $request){
         DB::table('jadwal_guru')->where('id_jadwal_guru', $request->input('id_jadwal_guru'))->update([
            'tahun_akademik' => $request->input('tahun_akademik'),
            'semester' => $request->input('semester'),
            'id_guru'=> $request->input('id_guru'),
            'hari'=> $request->input('hari'),
            'id_kelas' => $request->input('id_kelas'),
            'id_mapel' => $request->input('id_mapel'),
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_selesai'=> $request->input('jam_selesai')
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
     public function getDataJadwal(){
        // $ambildata = DB::table('kelas')->first(); --> first(cmn nampilin yg pertama)
         $ambildata1 = DB::table('jadwal_guru')->get();
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
                                 "DataJadwal"=> $ambildata1], 250);
         }else {
             return response()->json(["Result"=>
             ["ResultCode"=>0,
             "ResultMassege"=>"User atau password salah"]], 401
             );
         }
 
     }
     public function getDataJadwalToken(){
        $token = Str::random(60);
        $hash_token = hash('sha256', $token);
        print_r($token);exit;
        // $ambildata = DB::table('kelas')->first(); --> first(cmn nampilin yg pertama)
         $ambildata1 = DB::table('jadwal_guru')->get();
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
                                 "DataJadwal"=> $ambildata1], 250);
         }else {
             return response()->json(["Result"=>
             ["ResultCode"=>0,
             "ResultMassege"=>"User atau password salah"]], 401
             );
         }
 
     }
    
     public function deleteDataJadwal(request $request){
        dd($request->input('id_jadwal_guru'));
         DB::table('jadwal_guru')->where('id_jadwal_guru', $request->input('id_guru'))->delete();
         
         return response()->json(
            ["Result"=>
               [
                   "ResultCode"=> 0,
                   "ResultMessage"=>"Success Data Berhasil Dihapus"
               ]
               ],200
           );
     }
     
     public function deleteDataJadwalParam($id){
        dd($id);
        DB::table('jadwal_guru')->where('id_jadwal_guru', $id)->delete();
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