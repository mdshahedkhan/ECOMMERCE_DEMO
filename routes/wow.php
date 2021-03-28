<?php


use Illuminate\Support\Facades\Route;

Route::get('/wow', function (){
    return '<h1>Hello World</h1>';
});

Route::get('/wowget', function (){
    return "Wow Get Route is Granted";
});
