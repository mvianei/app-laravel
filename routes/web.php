<?php

Route::resource('products','ProductController');
Route::resource('produtos','ProdutoController');

/*Route::delete('products/{id}','ProductController@destroy')->name('products.destroy');
Route::put('products/{id}/update','ProductController@update')->name('products.update');
Route::get('products/{id}/edit','ProductController@edit')->name('products.edit');
Route::get('products/create','ProductController@create')->name('products.create');
Route::get('products/{id}/show','ProductController@show')->name('products.show');
Route::get('products','ProductController@index')->name('products.index');
Route::post('products','ProductController@store')->name('products.store');*/

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'name' => 'admin.'
        ], function () {
            Route::get('/dashboard', 'TesteController@Teste')->name('dashboard');
            Route::get('/financeiro', 'TesteController@Teste')->name('financeiro');
            Route::get('/produtos', 'TesteController@Teste')->name('produtos');
            Route::get('/', function () {
                return redirect()->route('dashboard');
            })->name('home');
        });

//Rota nomeada
Route::get('redirect3', function () {
    return redirect()->route("url.name");
});

Route::get('/name-url', function () {
    return "Hey hey hey";
})->name("url.name");

Route::view('/view', 'welcome');

Route::redirect('/redirect1', '/redirect2');

//Route::get('redirect1', function ($idproduct = ''){
//    return redirect('/redirect2');
//});

Route::get('redirect2', function () {
    return "Redirect 02";
});

Route::get('/produtos/{idproduct?}', function ($idproduct = '') {
    return "Produto(s) {$idproduct}";
});

Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});

Route::get('/categorias/{flag}', function ($prim1) {
    return "Categorias: {$prim1}";
});

Route::get('/', function () {
    return view('welcome');
});
