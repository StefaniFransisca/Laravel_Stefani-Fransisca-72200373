<?php
namespace App\Http\Controllers;

/*use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
*/
use Illuminate\http\Request;
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
}