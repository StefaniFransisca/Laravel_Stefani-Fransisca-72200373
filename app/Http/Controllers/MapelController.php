<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class MapelController extends Controller
{
     public function insertDataMapel(Request $request){
         DB::table('mapel')->insert([
             'nama_mapel' => $request->input('nama_mapel'),
             'deskripsi' => $request->input('deskripsi')
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
     public function updateDataMapel(request $request){
         DB::table('mapel')->where('id_mapel', $request->input('id_mapel'))->update([
             'nama_mapel' => $request->input('nama_mapel'),
             'deskripsi' => $request->input('deskripsi')
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
     public function getDataMapel(){
        // $ambildata = DB::table('kelas')->first(); --> first(cmn nampilin yg pertama)
         $ambildata1 = DB::table('mapel')->get();
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
     public function getDataMapelToken(){
        $token = Str::random(60);
        $hash_token = hash('sha256', $token);
        print_r($token);exit;
        // $ambildata = DB::table('kelas')->first(); --> first(cmn nampilin yg pertama)
         $ambildata1 = DB::table('mapel')->get();
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
                                 "DataGuru"=> $ambildata1], 250);
         }else {
             return response()->json(["Result"=>
             ["ResultCode"=>0,
             "ResultMassege"=>"User atau password salah"]], 401
             );
         }
 
     }

     public function deleteDataMapel(request $request){
        dd($request->input('id_mapel'));
         DB::table('mapel')->where('id_mapel', $request->input('id_mapel'))->delete();
         
         return response()->json(
            ["Result"=>
               [
                   "ResultCode"=> 0,
                   "ResultMessage"=>"Success Data Berhasil Dihapus"
               ]
               ],200
           );
     }
     
     public function deleteDataMapelParam($id){
        dd($id);
        DB::table('mapel')->where('id_mapel', $id)->delete();
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