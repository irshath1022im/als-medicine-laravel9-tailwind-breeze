<?php

use App\Http\Controllers\ItemController;
use App\Livewire\Item\ItemIndex;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('items', ItemIndex::class);
// Route::get('items/{item}', ItemShow::class);


Route::get('items', ItemIndex::class)->name('itemHome');

// Route::resource('items', ItemController::class);



require __DIR__.'/auth.php';
