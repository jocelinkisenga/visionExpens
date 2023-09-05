<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevController extends Controller
{
    public $nouveauTableau;
    public function index(){
        $tableau = [6,3,4,6,7];
        $this->pair($tableau);
    }

    private function pair($data){
        for ($i=0; $i < sizeof($data); $i++) {
            if(($data[$i]% 2) == 0){
                $this->nouveauTableau = $data[$i];
                print_r($data[$i]);
            }
        }

 
    }
}
