<?php

namespace App\Http\Controllers;


class ProductsController extends Controller
{
    public function productsDisplay(){
        $products=[
            ["productname"=>"Laptop","price"=>56000],
            ["productname"=>"SmartPhone","price"=>42000],
            ["productname"=>"Tab","price"=>1000]
        ];
        return view('products',compact('products'));

    }

    public function displayProduct($product){
        
    }
}