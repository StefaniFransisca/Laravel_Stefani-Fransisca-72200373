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

route ::get('/kelas', 'App\Http\Controllers\KelasController@getDataKelas');
route ::get('/kelas/{idkelas}', 'App\Http\Controllers\KelasController@getDataKelasById');
route ::post('/insertkelas', 'App\Http\Controllers\KelasController@insertDataKelas');
route ::post('/insertguru', 'App\Http\Controllers\KelasController@insertDataGuru');
route ::put('/updateguru', 'App\Http\Controllers\KelasController@updateDataGuru');
route ::delete('/deleteguru', 'App\Http\Controllers\KelasController@deleteDataGuru');
route ::delete('/deleteguruparam', 'App\Http\Controllers\KelasController@deleteDataGuruParam');
route ::get('/guru', 'App\Http\Controllers\KelasController@getDataGuru');