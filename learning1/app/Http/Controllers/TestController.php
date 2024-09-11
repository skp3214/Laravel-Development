<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function display($message){
        $message=$this->show($message);
        return $message;
    }
    private function show($message){
        return $message;
    }

    public function discountedPrice($price,$discount){
    
        $discountedPrice=$this->calculateDiscount($price,$discount);
        return view('discount',["discountedPrice"=>$discountedPrice,"discount"=>$discount]);

    }

    private function calculateDiscount($price,$discount){
        if($discount>=0 && $discount<=50){
            return $price-$price*$discount/100;
        }
        return $price;
    }
}
