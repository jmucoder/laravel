<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\TestController;
use App\Http\Controllers\Listcontroller;
use App\Models\Students;
use App\database\migrations;
use App\Models\Post;
use App\Models\user;

	Route::get('/test', [TestController::class, 'index'])-> name('home');

	Route::get('/create', [TestController::class, 'create'])-> name('create');

	Route::post('/create', [TestController::class, 'store'])-> name('store');
	Route::resource('store', TestController::class,);

	Route::get('/edit/{id}', [TestController::class, 'edit'])-> name('edit');	
	Route::post('/update/{id}', [TestController::class, 'update'])-> name('update');

	Route::resource('edit', TestController::class,);
	Route::delete('/delete/{id}', [TestController::class, 'delete'])-> name('delete');

	Route::get('/list', [Listcontroller::class, 'index'])-> name('list');	

		Route::get('/test1', function () {
    $secret = encrypt('s');
    var_dump($secret);
    var_dump(decrypt($secret));

})->middleware();

Route::get('/', function () {
    return view('welcome');
});
