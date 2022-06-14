<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//KELAS
route ::get('/kelas', 'App\Http\Controllers\KelasController@getDataKelas');
route ::get('/kelas/{idkelas}', 'App\Http\Controllers\KelasController@getDataKelasById');
route ::post('/insertkelas', 'App\Http\Controllers\KelasController@insertDataKelas');
route ::put('/updatekelas', 'App\Http\Controllers\KelasController@updateDataKelas');
route ::delete('/deletekelas', 'App\Http\Controllers\KelasController@deleteDataKelas');
route ::delete('/deleteguruparam/{id}', 'App\Http\Controllers\KelasController@deleteDataKelasParam');
route ::get('/kelas', 'App\Http\Controllers\KelasController@getDataKelas');
route ::get('/gurukelas', 'App\Http\Controllers\KelasController@getDataGuruKelas');
route ::middleware('auth:api')->get('/kelastoken', 'App\Http\Controllers\KelasController@getDataKelasToken');
//GURU
route ::get('/guru', 'App\Http\Controllers\GuruController@getDataGuru');
route ::middleware('verifystring')->post('/insertguru', 'App\Http\Controllers\GuruController@insertDataGuru');
route ::put('/updateguru', 'App\Http\Controllers\GuruController@updateDataGuru');
route ::delete('/deleteguru', 'App\Http\Controllers\GuruController@deleteDataGuru');
route ::delete('/deleteguruparam/{id}', 'App\Http\Controllers\GuruController@deleteDataGuruParam');
route ::middleware('auth:api')->get('/gurutoken', 'App\Http\Controllers\GuruController@getDataGuruToken');
//MAPEL
route ::get('/mapel', 'App\Http\Controllers\MapelController@getDataMapel');
route ::middleware('verifystring')->post('/insertmapel', 'App\Http\Controllers\MapelController@insertDataMapel');
route ::put('/updatemapel', 'App\Http\Controllers\MapelController@updateDataMapel');
route ::delete('/deletemapel', 'App\Http\Controllers\MapelController@deleteDataMapel');
route ::delete('/deletemapelparam/{id}', 'App\Http\Controllers\MapelController@deleteDataMapelParam');
route ::middleware('auth:api')->get('/mapeltoken', 'App\Http\Controllers\MapelController@getDataMapelToken');
//JADWAL GURU 
route ::get('/jadwal', 'App\Http\Controllers\JadwalController@getDataJadwal');
route ::middleware('verifystring')->post('/insertjadwal', 'App\Http\Controllers\JadwalController@insertDataJadwal');
route ::put('/updatejadwal', 'App\Http\Controllers\JadwalController@updateDataJadwal');
route ::delete('/deletejadwal', 'App\Http\Controllers\JadwalController@deleteDataJadwal');
route ::delete('/deletejadwalparam/{id}', 'App\Http\Controllers\JadwalController@deleteDataJadwalParam');
route ::middleware('auth:api')->get('/jadwaltoken', 'App\Http\Controllers\JadwalController@getDataJadwalToken');
//PRESENSI HARIAN
route ::get('/harian', 'App\Http\Controllers\HarianController@getDataHarian');
route ::middleware('verifystring')->post('/insertharian', 'App\Http\Controllers\HarianController@insertDataHarian');
route ::put('/updateharian', 'App\Http\Controllers\HarianController@updateDataHarian');
route ::delete('/deleteharian', 'App\Http\Controllers\HarianController@deleteDataHarian');
route ::delete('/deleteharianparam/{id}', 'App\Http\Controllers\HarianController@deleteDataHarianParam');
route ::middleware('auth:api')->get('/hariantoken', 'App\Http\Controllers\HarianController@getDataHarianToken');
//PRESENSI MENGAJAR
route ::get('/mengajar', 'App\Http\Controllers\MengajarController@getDataMengajar');
route ::middleware('verifystring')->post('/insertmengajar', 'App\Http\Controllers\MengajarController@insertDataMengajar');
route ::put('/updatemengajar', 'App\Http\Controllers\MengajarController@updateDataMengajar');
route ::delete('/deletemengajar', 'App\Http\Controllers\MengajarController@deleteDataMengajar');
route ::delete('/deletemengajarparam/{id}', 'App\Http\Controllers\MengajarController@deleteDataMengajarParam');
route ::middleware('auth:api')->get('/mengajartoken', 'App\Http\Controllers\MengajarController@getDataMengajarToken');
//LATIHAN Json
route ::get('/latihan1', 'App\Http\Controllers\LatihanJson@latihansatu');
route ::get('/latihan2', 'App\Http\Controllers\LatihanJson@latihandua');
route ::get('/latihan3', 'App\Http\Controllers\LatihanJson@latihantiga');
route ::get('/latihan4', 'App\Http\Controllers\LatihanJson@latihanempat');
route ::get('/latihan5', 'App\Http\Controllers\LatihanJson@latihanlima');