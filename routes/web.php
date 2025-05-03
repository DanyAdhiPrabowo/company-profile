<?php

Route::get('/', function(){return redirect('/home');});
Route::get('/home', 'UserController@home')->name('home');
Route::get('/blog', 'UserController@blog')->name('blog');
Route::get('/blog/{slug}', 'UserController@show_article')->name('blog.show');
Route::get('/catalog', 'UserController@catalog')->name('catalog');
Route::get('/contact', 'UserController@contact')->name('contact');

Route::prefix('admin')->group(function(){

  Route::get('/', function(){
    return redirect('/admin/login');
  });

  Route::get('/register', function () {
    return redirect('/admin');
  })->name('admin.register');

  Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'Auth\LoginController@login')->name('login.post');

  Route::middleware(['auth'])->group(function () {

    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/change-password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('change-password');
    Route::put('/change-password', 'Auth\ChangePasswordController@changePassword')->name('change-password.update');

    // Route Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // route catalogs
    Route::get('/catalogs', 'CatalogController@index')->name('catalogs.index');
    Route::get('/catalogs/create', 'CatalogController@create')->name('catalogs.create');
    Route::post('/catalogs/store', 'CatalogController@store')->name('catalogs.store');
    Route::get('/catalogs/{catalog}/edit', 'CatalogController@edit')->name('catalogs.edit');
    Route::put('/catalogs/{catalog}', 'CatalogController@update')->name('catalogs.update');
    Route::delete('/catalogs/{catalog}', 'CatalogController@destroy')->name('catalogs.destroy');
    Route::resource('catalogs', 'CatalogController');

    // route categories
    Route::get('/categories/{category}/restore', 'CategoryController@restore')->name('categories.restore');
    Route::delete('/categories/{category}/delete-permanent', 'CategoryController@deletePermanent')->name('categories.delete-permanent');
    Route::get('/ajax/categories/search', 'CategoryController@ajaxSearch');
    Route::resource('categories', 'CategoryController');

    // route article
    Route::post('/articles/upload', 'ArticleController@upload')->name('articles.upload');
    Route::resource('/articles', 'ArticleController');


    Route::middleware('role:admin')->group(function () {
      // route employee
      Route::resource('/employees', 'EmployeeController');

      // Route about
      Route::get('/abouts', 'AboutController@index')->name('abouts.index');
      Route::get('/abouts/{about}/edit', 'AboutController@edit')->name('abouts.edit');
      Route::put('/abouts/{about}', 'AboutController@update')->name('abouts.update');
    });
  });
});
