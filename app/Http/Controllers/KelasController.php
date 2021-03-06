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
use Illuminate\Support\Str;

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

     public function updateDataKelas(request $request){
         DB::table('kelas')->where('id_kelas', $request->input('id_kelas'))->update([
             'kelas' => $request->input('kelas'),
             'jurusan' => $request->input('jurusan'),
             'sub'=> $request->input('sub')
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
     
     public function getDataKelasToken(){
        $token = Str::random(60);
        $hash_token = hash('sha256', $token);
        print_r($token);exit;
        // $ambildata = DB::table('kelas')->first(); --> first(cmn nampilin yg pertama)
         $ambildata1 = DB::table('kelas')->get();
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
                                 "DataKelas"=> $ambildata1], 250);
         }else {
             return response()->json(["Result"=>
             ["ResultCode"=>0,
             "ResultMassege"=>"User atau password salah"]], 401
             );
         }
 
     }
     public function getDataGuruKelas(){
        // $age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
        // $cars = array("Volvo", "BMW", "Yaris"=>"Toyota", "Honda"); //ada key yang lain json akan menyesuaikan
        // $jsoncars = json_encode($cars); 
        // $jsonage = json_encode($age);
        // // print_r($cars);//ada indexnya
        // // print_r($jsoncars); //lagsg di valuenya 
        // $jsonobj = '{ "Peter":35, "Ben": 37, "Joe":43}';
        // //print_r(json_decode($jsonobj)); //jadi kelas objek of array/tdk bisa diakses 
        // //print_r(json_decode($jsonobj, true)); //jadi array 
        // $obj = json_decode($jsonobj);
        // $arr = json_decode($jsonobj, true);
        // print_r($obj); //objek dibungkus array
        // print_r($arr);
        // print_r($arr["Peter"]); //default array dari atribut
        // print_r($obj->Peter); //keluarannya key pada atribut tersebut 
        // exit;

        // print_r($arr_result); //hasil sudah jd array tdk std objk
        // //dd($ambildataGuruKelas);
        // // foreach($ambildataGuruKelas as $key => $value){
        // //     print_r($value->id_guru);
        // //     print_r('--------');
        // // }
        // exit;
        
        //---------------------AMBIL DATA DARI DATABASE
        $ambildataGuru = DB::table('guru')->get();
        $ambildataGuruKelas = DB::table('guru')
                                ->join('jadwal_guru', 'guru.id_guru', '=', 'jadwal_guru.id_guru')
                                ->join('kelas', 'jadwal_guru.id_kelas', '=', 'kelas.id_kelas')
                                ->select('guru.id_guru', 'jadwal_guru.hari', 'jadwal_guru.jam_mulai', 'kelas.kelas', 'kelas.jurusan', 'kelas.sub')
                                ->get();
        //---------------------KONVERSI HASIL DB MENJADI ARRAY UNTUK DIOLAH KEYNYA
        $arr_result = json_decode($ambildataGuru, true);
        //---------------------PENGOLAHAN STRUKTUR ARRAY
        foreach($arr_result as $keyguru => $valueguru){
            foreach($ambildataGuruKelas as $key => $value){
                if($valueguru['id_guru'] == $value->id_guru)
                {
                    $arr_jadwal = array("hari"=>$value->hari,
                                        "kelas"=>$value->kelas." ".$value->jurusan." ".$value->sub, 
                                        "jam_mulai"=>$value->jam_mulai,
                                        "id_guru"=>$value->id_guru);
                    $arr_result[$keyguru]['jadwal_guru'][] = $arr_jadwal;
                }  
            }
        }
        //---------------------KEMBALIKAN KE API-------------
        if($arr_result ){
           return response()->json(["User"=> "Stefani",
                                   "Waktu Akses"=> today(),
                                   "result" => 1,
                                   "DataGuru"=> $arr_result], 250);
           }else {
               return response()->json(["Result"=>
               ["ResultCode"=>0,
               "ResultMassege"=>"Data Tidak Ditemukan"]], 401
               );
           } 
}
     public function deleteDataKelas(request $request){
        dd($request->input('id_kelas'));
         DB::table('kelas')->where('id_kelas', $request->input('id_kelas'))->delete();
         
         return response()->json(
            ["Result"=>
               [
                   "ResultCode"=> 0,
                   "ResultMessage"=>"Success Data Berhasil Dihapus"
               ]
               ],200
           );
     }
     public function deleteDataKelasParam($id){
        dd($id);
        DB::table('kelas')->where('id_kelas', $id)->delete();
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