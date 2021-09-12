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
    /**
     * @param $arr
     */
    function sortArray ($arr)
    {
        for ( $i = 0; $i < sizeof($arr); $i++){
            for ($j = 0; $j < sizeof($arr); $j++){
                if ($arr[$j][0] < $arr[$i][0]) {
                  for ($k = 0; $k < 2; $k++){
                      $sorted[$k] = $arr[$i][$k];
                      $arr[$i][$k] = $arr [$j][$k];
                      $arr[$j][$k] = $sorted[$k];
                  }
                }
            }
        }
        return array_reverse($arr);
    }

    $myArray = [
        [1, 'a'],
        [15, 'b'],
        [4, 'c'],
        [8, 'd'],
        [12, 'e'],
        [22, 'f'],
    ];


    // Echo out sorted array.
    echo "<pre>";
    print_r(sortArray($myArray));
    echo "</pre>";


});
