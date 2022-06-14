<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyString
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if($request->input('nama_guru') != "Stefani"){
        //     return response()->json(
        //         ["Result"=>
        //            [
        //                "ResultCode"=> 401,
        //                "ResultMessage"=>"Data Bukan Stefani"
        //            ]
        //            ],401
        //        );
        // }

        // return response()->json(
        //     ["Result"=>
        //        [
        //            "ResultCode"=> 400,
        //            "ResultMessage"=>"Data Stefani"
        //        ]
        //        ],200
        //    );
        //data diatas jika diaktifkan dan bawah dinonaktf maka hanya akan keluaran data stefani saja ga akan melakukan inser update delete
        return $next($request);
    }
}
