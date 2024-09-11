<?php

use Illuminate\Support\Facades\Route;

Route::view('myhomepage','myhomepage');
Route::view('myaboutpage','myaboutpage');
Route::view('mycontactpage','mycontactpage');
Route::view('myproductpage','myproductspage');
Route::get('displayproducts',function(){

    $products=[
        [
            "type"=>"Laptop",
            "brand"=>"Dell",
            "image"=>"https://images.unsplash.com/photo-1484788984921-03950022c9ef?q=80&w=3064&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        ],
        [
            "type"=>"Laptop",
            "brand"=>"Xiaomi",
            "image"=>"https://images.unsplash.com/photo-1487017159836-4e23ece2e4cf?q=80&w=2971&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        ],
        [
            "type"=>"Laptop",
            "brand"=>"HP",
            "image"=>"https://images.unsplash.com/photo-1484788984921-03950022c9ef?q=80&w=3064&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        ],
    ];

    return view('displayProducts',compact('products'));
});

