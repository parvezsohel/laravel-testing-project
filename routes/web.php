<?php


  Auth::routes();
  Route::get('/home', 'HomeController@index')->name('home');

  // all backend routing start
  Route::group(['middleware' => 'auth'], function () {
    Route::get('product/add/view', 'ProductController@view_product');
    Route::get('product/viewlist', 'ProductController@productviewlist');
    Route::post('product/insert', 'ProductController@insert_product');
    Route::get('product/delete/{product_id}', 'ProductController@delete_product');
    Route::get('product/edit/{product_id}', 'ProductController@edit_product');
    Route::post('product/edit/insert', 'ProductController@edit_insert_product');
    Route::get('product/delete/restore/{product_id}', 'ProductController@product_restore');
    Route::get('product/delete/parmanet/delete/{deleted_product_id}', 'ProductController@product_parmanet_delete');
    Route::get('category/add/view', 'CategoryController@categoryview');
    Route::post('category/insert', 'CategoryController@categoryinsert');
    Route::get('category/edit/{category_id}', 'CategoryController@categoryeditview');
    Route::post('category/edit/insert', 'CategoryController@categoryeditinsert');
    Route::get('category/delete/{category_id}', 'CategoryController@categorydelete');
  });
// all backend routing end

// all frontend roution start

Route::get('/', 'FrontendController@index');
// all frontend roution end
