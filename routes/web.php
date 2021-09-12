<?php

use App\Http\Controllers\ArrayController;
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

Route::get('/sort', function () {
    /*
     *  Print Sorted array when route visited.
     */
    $myArray = [
        [1, 'a'],
        [15, 'b'],
        [4, 'c'],
        [8, 'd'],
        [12, 'e'],
        [22, 'f'],
    ];

    array_multisort($myArray);

    // Echo out sorted array.
    echo "<pre>";
    print_r($myArray);
    echo "</pre>";


});
