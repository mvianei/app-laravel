<?php

Route::get('/categoria/{flag}/posts', function($flag){
    return "Posts da categoria: {$flag}";
});

Route::get('/categorias/{flag}', function($prim1){
    return "Categorias: {$prim1}";
});

Route::get('/', function () {
    return view('welcome');
});
