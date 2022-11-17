<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PersonController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});



### Check User's ROLE and goto their Page
Route::middleware([
    'auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {
       // return view('dashboard');
       if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                // return redirect()->route('admin#index');  // when login as Admin goto Admin Index
                return redirect()->route('admin#profile');
            }
            else if(Auth::user()->role == 'user'){
                return redirect()->route('user#index');
            }
       }
    })->name('dashboard');
});

///////////////////////////////////////////////////////////////////
### ADMIN PANEL
Route::group(['prefix'=>'admin','namespace' =>'Admin'],function(){
    /// Route::get('/','AdminController@index')->name('admin#index');    
    Route::get('/profile','CategoryController@profile')->name('admin#profile');
    
    /// Category
    Route::get('/category','CategoryController@category')->name('admin#categorylist');  // LIST Category
    Route::get('/addcategory','CategoryController@addCategory')->name('admin#addcategory');
    Route::post('/createCategory','CategoryController@createCategory')->name('admin#createCategory');
    Route::get('/deleteCategory/{id}','CategoryController@deleteCategory')->name('admin#deleteCategory'); // DELETE Category
    ### Edit & Update
    Route::get('/editCategory/{id}', 'CategoryController@editCategory')->name('admin#editCategory'); // Edit Category
    Route::post('/updateCategory' , 'CategoryController@updateCategory')->name('admin#updateCategory');   // # no need to id parameter because of category_id is located in Hidden Text Field
    ### Search
    Route::post('/category' , 'CategoryController@searchCategory')->name('admin#searchCategory');  // same Route name with categoryList for URL error 
    // Route::get('/searchCategory' , 'AdminController@searchCategory')->name('admin#searchCategory');  //  working with POST or GET( but need to same as Form Method and Route)

    
    /// Pizza
    Route::get('/pizza','PizzaController@pizza')->name('admin#pizza');
    Route::get('/createPizza' , 'PizzaController@createPizza')->name('admin#createPizza');
    Route::post('/insertPizza' , 'PizzaController@insertPizza')->name('admin#insertPizza');

});


    Route::get('/persons/{id}','PersonController@getPerson')->name('person#sp_getPerson');




### USER PANEL
Route::group(['prefix'=>'user'],function(){
    Route::get('/','UserContrller@index')->name('user#index');
});