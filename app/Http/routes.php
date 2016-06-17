<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
 * 
 */

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'PagesController@index');

    Route::get('register/confirm/{token}', 'AuthController@confirmEmail');

    Route::get('/register', [
        'uses' => '\App\Http\Controllers\AuthController@getRegister',
        'as'   => 'auth.register',
        'middleware' => ['guest']
    ]);
    Route::post('/register', [
        'uses' => '\App\Http\Controllers\AuthController@postRegister',
        'as'   => 'auth.register',
    ]);
    Route::get('/login', [
        'uses' => '\App\Http\Controllers\AuthController@getLogin',
        'as'   => 'auth.login',
        'middleware' => ['guest']
    ]);
    Route::post('/login', [
        'uses' => '\App\Http\Controllers\AuthController@postLogin',
        'as'   => 'auth.login',
        'middleware' => ['guest'],
    ]);
    Route::get('/logout', [
        'uses' => '\App\Http\Controllers\AuthController@logout',
        'as'   => 'auth.logout'
    ]);

    /**************************
     * Password Reset Routes
     *************************/
    Route::get('/password/email', '\App\Http\Controllers\PasswordController@getEmail');
    Route::post('/password/email', '\App\Http\Controllers\PasswordController@postEmail');
    Route::get('/password/reset/{token}', '\App\Http\Controllers\PasswordController@getReset');
    Route::post('/password/reset', '\App\Http\Controllers\PasswordController@postReset');

   

    /*****************
     * Profile Routes
     ****************/
    

    /** Edit Profile. **/
    Route::post('/user/{username}/edit', [
        'uses' => '\App\Http\Controllers\ProfileController@editProfile',
        'as'   => 'profile.edit-profile',
        'middleware' => ['auth']
    ]);

    /** Submit a post request for profile photo upload **/
    Route::post('{username}/photos', 'ProfileController@addPhoto');

    /** Delete Profile photo. */
    Route::delete('{id}', [
        'uses' => '\App\Http\Controllers\ProfileController@destroyPhoto',
        'as'   => 'profile.delete'
    ]);

});


Route::group(['middleware' => ['web'],'namespace' => 'Admin'], function () {
    Route::get('admin', array('as' => 'admin-login','uses' => 'AuthController@getLogin'));
    Route::post('admin', ['as'=>'admin-login','uses'=>'AuthController@postLogin']);
 });
 Route::group(['middleware' => ['web','auth'],'namespace' => 'Admin','prefix'=>'admin'], function () {
        Route::get('dashboard', array('as' => 'dashboard','uses' => 'AuthController@getDashboard'));
        Route::get('logout', array('as' => 'admin-logout','uses' => 'AuthController@logout'));
});

//routes relared to roles
//routes related to roles
Route::group(['middleware' => ['web','auth'],'prefix' => 'role','namespace' => 'Admin'], function () {
    Route::get('add', array('as' => 'addRole','uses' => 'RolesController@addRole'));
    Route::post('add', array('as' => 'addRole','uses' => 'RolesController@postaddRole'));
    
    Route::get('view',['as'=>'viewRoles','uses'=>'RolesController@viewRoles']);
    
    Route::get('edit/{id}', array('as' => 'edit-role','uses' => 'RolesController@editRole'));
    Route::post('edit/{id?}', array('as' => 'edit-role','uses' => 'RolesController@posteditRole'));
    
    Route::get('delete/{id?}', array('as' => 'delete-role','uses' => 'RolesController@deleteRole'));
});

//routes related to permissions
Route::group(['middleware' => ['web','auth'],'prefix' => 'permission','namespace' => 'Admin'], function () {
    Route::get('add', array('as' => 'addPermission','uses' => 'RolesController@addPermission'));
    Route::post('add', array('as' => 'addPermission','uses' => 'RolesController@postaddPermission'));
    
    Route::get('view',['as'=>'viewPermissions','uses'=>'RolesController@viewPermissions']);
    
    Route::get('edit/{id}', array('as' => 'edit-permission','uses' => 'RolesController@editPermission'));
    Route::post('edit/{id?}', array('as' => 'edit-permission','uses' => 'RolesController@posteditPermission'));
    
    Route::get('delete/{id?}', array('as' => 'delete-permission','uses' => 'RolesController@deletePermission'));
 });