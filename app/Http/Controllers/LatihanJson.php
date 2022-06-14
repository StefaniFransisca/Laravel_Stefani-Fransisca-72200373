<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class LatihanJson extends Controller{
    public function latihansatu(){
        $sosmed = ["facebook"=> "FaniStefani",
                "twitter"=> "-",
                "instagram"=> "fani.s.f",
                "youtube"=> "StefaniFransisca",
                "github"=> "StefaniFransisca"];
        $tesresult = ["name"=>"Stefani",
                    "url"=> "https://www.google.com",
                    "rank"=>"1",
                    "socialmedia"=> $sosmed
                    ];
        $json1 = json_encode($tesresult);
        dd($json1);
        // dd($tesresult);
        }
    public function latihandua(){
        $firstname = "Stefani";
        $lastname = "Fransisca";   
        $lokasi = "Bokoharjo Bnajeng";
        $tesresult = ["fist_name"=>$firstname,
                    "last_name" =>$lastname,
                    "location" =>$lokasi,
                    "online"=>true,
                    "followers"=>987];
        $json2 = json_encode($tesresult);
        dd($json2);
        // dd($tesresult);
        }
    
    public function latihantiga(){
        $tesresult = array(
                "first_name" => "Sammy",
                "last_name" => "Shark",
                "location" => "Ocean",
                "websites" => array(
                    [
                    "description" => "work",
                    "URL" => "https://www.digitalocean.com/"
                    ],
                    [
                    "desciption" => "tutorials",
                    "URL" => "https://www.digitalocean.com/community/tutorials"
                    ]
                ),
                "social_media" => array(
                    [
                    "description" => "twitter",
                    "link" => "https://twitter.com/digitalocean"
                    ],
                    [
                    "description" => "facebook",
                    "link" => "https://www.facebook.com/DigitalOceanCloudHosting"
                    ],
                    [
                    "description" => "github",
                    "link" => "https://github.com/digitalocean"
                    ]
                )
            );
            $json3 = json_encode($tesresult);
            dd($json3);
            // dd($tesresult);
        }
    public function latihanempat(){
        $tesresult = array(
                "employees" => array(
                    [
                        "firstName" => "John", "lastName" => "Doe"
                    ],
                    [
                        "firstName" => "Anna", "lastName" => "Smith"
                    ],
                    [
                        "firstName" => "Peter","lastName" => "Jones"
                    ]
                )
            );
            $json4 = json_encode($tesresult);
            dd($json4);
            // dd($tesresult);
        }
    public function latihanlima(){
        $tesresult = array(
                "matapelajaran" => array(
                    "subject" => "Matematika",
                    "kelas" => array(
                        [
                            "X" => "Argo",
                            "Jadwal" => "Senin"
                        ],
                        [
                            "XI" => "JJS",
                            "Jadwal" => "Selasa"
                        ],
                        [
                            "XII" => "Halim",
                            "Jadwal" => "Rabu"
                        ]
                    )
                )
            );
            $json5 = json_encode($tesresult);
            dd($json5);
            // dd($tesresult);
        }
}