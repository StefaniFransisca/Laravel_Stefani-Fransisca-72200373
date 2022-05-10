<?php
namespace App\Http\Controllers;

/*use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
*/
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class KelasController extends Controller
{
    public function getDataKelas(){
       // $ambildata = DB::table('kelas')->first(); --> first(cmn nampilin yg pertama)
        $ambildata = DB::table('kelas')->get();
        if($ambildata){
         //   return response()->json(["Results"->
         //           ["ResultCode"->1, 
         //           ["ResultMessage"->"Sukses Login"], 
        //            "DataUser"->$ambildata
        //   ],200
        //);
        return response()->json(["User"=> "Stefani",
                                "Waktu Akses"=> today(),
                                //"result" => 1,
                                "DataKelas"=> $ambildata], 200);
        }else {
            return response()->json(["Result"=>
            ["ResultCode"=>0,
            "ResultMassege"=>"User atau password salah"]], 401
            );
        }

    }
    public function insertDataKelas (request $request){
        // DB::table('kelas')->insert([
        //     'kelas' => $request->input('kelas'),
        //     'jurusan' => $request->input('jurusan'),
        //     'sub'=> $request->input('sub')
        // ]);
         $arr_kelas = array('kelas' => input('kelas'), 
                            'jurusan' => input('jurusan'), 
                            'sub' => input('sub')
        );
         DB::table('kelas')->insert($arr_kelas);
        
       //   DB::insert('insert into kelas (rfid, nip, nama_guru, alamat, status_guru) values (?,?,?,?,?)', 
       //      [$request->input('rfid'),$request->input('nip'),'nama_guru'=> $request->input('nama_guru'),
       //      'alamat'=> $request->input('alamat'), 1]);
       
        return response()->json(
            ["Result"=>
               [
                   "ResultCode"=> 0,
                   "ResultMessage"=>"Success Data Masuk Ke Database"
               ]
               ],200
           );
       }
    public function getDataKelasById($idkelas){
        // $ambildata = DB::table('kelas')->first(); --> first(cmn nampilin yg pertama)
         $ambildata = DB::table('kelas')
         ->where('id_kelas',$idkelas)
         ->get();
         if($ambildata){
          //   return response()->json(["Results"->
          //           ["ResultCode"->1, 
          //           ["ResultMessage"->"Sukses Login"], 
         //            "DataUser"->$ambildata
         //   ],200
         //);
         return response()->json($ambildata, 200);
         }else {
             return response()->json(["Result"=>
             ["ResultCode"=>0,
             "ResultMassege"=>"User atau password salah"]], 401
             );
         }
 
     }
     public function insertDataGuru(Request $request){
         DB::table('guru')->insert([
             'rfid' => $request->input('rfid'),
             'nip' => $request->input('nip'),
             'nama_guru'=> $request->input('nama_guru'),
             'alamat'=> $request->input('alamat'),
             'status_guru'=> 1
         ]);
        //   $arr_guru = array('rfid' => $request->input('rfid'), 
        //                      'nip' => $request->input('nip'), 
        //                      'nama_guru' => $request->input('nama_guru'),
        //                      'alamat' => $request->input('alamat'), 
        //                      'status_guru' => 1);
        //   DB::table('guru')->insert($arr_guru);
         
        //   DB::insert('insert into guru (rfid, nip, nama_guru, alamat, status_guru) values (?,?,?,?,?)', 
        //      [$request->input('rfid'),$request->input('nip'),'nama_guru'=> $request->input('nama_guru'),
        //      'alamat'=> $request->input('alamat'), 1]);
        
         return response()->json(
             ["Result"=>
                [
                    "ResultCode"=> 0,
                    "ResultMessage"=>"Success Data Masuk Ke Database"
                ]
                ],200
            );
     }
     public function updateDataGuru(request $request){
         DB::table('guru')->where('id_guru', $request->input('id_guru'))->update([
             'rfid' => $request->input('rfid'),
             'nip' => $request->input('nip'),
             'nama_guru'=> $request->input('nama_guru'),
             'alamat'=> $request->input('alamat'),
             'status_guru'=> $request->input('status_guru')
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
     public function getDataGuru(){
        // $ambildata = DB::table('kelas')->first(); --> first(cmn nampilin yg pertama)
         $ambildata1 = DB::table('guru')->get();
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
     public function deleteDataGuru(request $request){
         dd($request->input('id_guru'));
         DB::table('guru')->where('id_guru', $request->input('id_guru'))->delete();
         
         return response()->json(
            ["Result"=>
               [
                   "ResultCode"=> 0,
                   "ResultMessage"=>"Success Data Berhasil Dihapus"
               ]
               ],200
           );
     }
     public function deleteDataGuruParam($id){
        DB::table('guru')->where('id_guru', $request->input('id_guru'))->delete();
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