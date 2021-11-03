<?php

Route::view('/view','welcome');

Route::redirect('/redirect1','/redirect2');

//Route::get('redirect1', function ($idproduct = ''){
//    return redirect('/redirect2');
//});

Route::get('redirect2', function (){
    return "Redirect 02";
});

Route::get('/produtos/{idproduct?}', function ($idproduct = ''){
    return "Produto(s) {$idproduct}";
});

Route::get('/categoria/{flag}/posts', function($flag){
    return "Posts da categoria: {$flag}";
});

Route::get('/categorias/{flag}', function($prim1){
    return "Categorias: {$prim1}";
});

Route::get('/', function () {
    return view('welcome');
});
