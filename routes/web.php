<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'BookController@view6')->name('home');
Route::get('/timkiem', 'BookController@search');
Route::get('/khogame', 'BookController@view');
Route::get('/khogame.fps', 'BookController@fps_games');
Route::get('/khogame.rpg', 'BookController@rpg_games');
Route::get('/khogame.rts', 'BookController@rts_games');
Route::get('/khogame.thethao', 'BookController@sport_games');
Route::get('/', 'BookController@view6')->name('welcome');
Route::get('/nhaphathanh', 'PublisherController@publishersindex');
Route::get('/nhaphathanh_game.{id}', 'PublisherController@publisherbooks');
Route::get('/lienhe', 'UserController@contactindex');
Route::post('/save_cart', 'BookController@save_cart');
Route::get('/giohang', 'BookController@show_cart');
Route::get('/xoatatca_giohang', 'BookController@delete_all_cart');
Route::post('/delete_to_cart{rowId}', 'BookController@delete_to_cart');
Route::post('/update_cart_quantity', 'BookController@update_cart_quantity');
Route::get('/chitietgame.{id}', 'BookController@chitietsach');
Route::get('/checkout', 'HomeController@checkout');
Route::post('/save_checkout', 'HomeController@save_checkout');
Route::get('/complete_payment.{payment_id}', 'HomeController@complete_payment');
Route::get('/xemdonhang.{user_id}', 'HomeController@user_order');
Route::post('/load_comment', 'HomeController@load_comment');
Route::post('/dangbinhluan/{book_id}', 'HomeController@post_comment');
Route::post('/traloibinhluan/{book_isbn}/{comment_id}', 'HomeController@reply_comment');
Route::post('/update_user/{id}', 'HomeController@update_user');
Route::post('/change_pass/{id}', 'HomeController@change_pass');
Route::post('/send_contact', 'BookController@send_contact');


Route::get('/admin', 'AdminController@loginindex');
Route::get('/admin_home', 'AdminController@admin_home');
Route::get('/admin_logout', 'AdminController@logout');
Route::get('/dashboard', 'AdminController@add_book');
Route::post('/admin_dashboard', 'AdminController@dashboard');
Route::get('/show_table.1', 'AdminController@show_table');
Route::get('/show_publisher', 'AdminController@show_publisher');
Route::get('/delete_publisher/{publisher_id}', 'AdminController@delete_publisher');
Route::get('/xembinhluan', 'AdminController@view_comment');
Route::post('/traloibinhluan', 'AdminController@reply_comment');
Route::get('/duyetbinhluan/{comment_id}', 'AdminController@check_comment');
Route::get('/xoabinhluan/{comment_id}', 'AdminController@delete_comment');
Route::get('/xoaphanhoi/{comment_id}', 'AdminController@delete_reply_comment');
Route::get('/boduyetbinhluan/{comment_id}', 'AdminController@uncheck_comment');
Route::get('/order', 'AdminController@order_manager');
Route::get('/view_order/{payment_id}', 'AdminController@view_order');
Route::get('/delete_order/{order_id}', 'AdminController@delete_order');
Route::get('/add_book', 'AdminController@add_book');
Route::post('/save_book/', 'AdminController@save_book');
Route::get('/delete_book_table1/{book_id}', 'AdminController@delete_book_table1');
Route::get('/delete_book_table2/{book_id}', 'AdminController@delete_book_table2');
Route::get('/delete_book_table3/{book_id}', 'AdminController@delete_book_table3');
Route::get('/delete_book_table4/{book_id}', 'AdminController@delete_book_table4');
Route::get('/edit_book/{book_id}.{publisher_id}', 'AdminController@edit_book');
Route::get('/edit_publisher/{publisher_id}', 'AdminController@edit_publisher');
Route::post('/update_publisher/{publisher_id}', 'AdminController@update_publisher');
Route::post('/update_book/{book_id}', 'AdminController@update_book');
Route::post('/save_publisher/', 'AdminController@save_publisher');
Route::post('/autocomplete-ajax', 'BookController@autocomplete_ajax')->name('autocomplete-ajax');
Route::get('/thongke', 'AdminController@orderByDay');
Route::post('/tk', 'AdminController@tk');

Route::prefix('adminn')->group(function () {
    Route::get('/',function(){
        return view('');
    });
});
