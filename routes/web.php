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

// Route::get('/', function () {
//     return view('home');
// });
Route::view('/', 'home');

// Route::get('/contact', function () {
//     return view('contact');
// });
Route::view('/contact', 'contact');

Route::get('/blog-post/{id}/{welcome?}',function($id, $welcome = 1){
    $pages = [
        1 => [
            'title'=>' from page 1'
        ]
        ,2 => [
            'title'=>' from page 2'
        ]
    ];
    $welcomes = [
        1 => 'Hello'
        // 1 => '<b>Hello</b>'
        ,2 => 'Welcome'
    ];
    return view('blog-post', [
        'data' => $pages[$id]
        ,'welcome' => $welcomes[$welcome]
    ]);
});