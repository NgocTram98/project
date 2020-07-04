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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/dangnhap','UsersController@getDangNhapAdmin');
Route::post('admin/dangnhap','UsersController@postDangNhapAdmin');
Route::get('admin/logout','UsersController@getDangXuatAdmin');
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'baithuoc'],function(){
		//admin/baithuoc/danhsach 
		Route::get('danhsach','BaiThuocController@getDanhSach');
		Route::get('sua/{id}','BaiThuocController@getSua');
		Route::post('sua/{id}','BaiThuocController@postSua');
		Route::get('them','BaiThuocController@getThem');
		Route::post('them','BaiThuocController@postThem');
		Route::get('xoa/{id}','BaiThuocController@getXoa');
	});
	Route::group(['prefix'=>'benh'],function(){
		//admin/benh/danhsach 
		Route::get('danhsach','BenhController@getDanhSach');
		Route::get('sua/{id}','BenhController@getSua');
		Route::post('sua/{id}','BenhController@postSua');
		Route::get('them','BenhController@getThem');
		Route::post('them','BenhController@postThem');
		Route::get('xoa/{id}','BenhController@getXoa');
	});
	Route::group(['prefix'=>'caythuoc'],function(){
		//admin/caythuoc/danhsach 
		Route::get('danhsach','CayThuocController@getDanhSach');
		Route::get('sua/{id}','CayThuocController@getSua');
		Route::post('sua/{id}','CayThuocController@postSua');
		Route::get('them','CayThuocController@getThem');
		Route::post('them','CayThuocController@postThem');
		Route::get('xoa/{id}','CayThuocController@getXoa');
	});
	Route::group(['prefix'=>'duoclieu'],function(){
		//admin/duoclieu/danhsach 
		Route::get('danhsach','DuocLieuController@getDanhSach');
		Route::get('sua/{id}','DuocLieuController@getSua');
		Route::post('sua/{id}','DuocLieuController@postSua');
		Route::get('them','DuocLieuController@getThem');
		Route::post('them','DuocLieuController@postThem');
		Route::get('xoa/{id}','DuocLieuController@getXoa');
	});
	Route::group(['prefix'=>'users'],function(){
		//admin/user/danhsach 
	Route::get('danhsach','UsersController@getDanhSach');
		Route::get('sua/{id}','UsersController@getSua');
		Route::post('sua/{id}','UsersController@postSua');
		Route::get('them','UsersController@getThem');
		Route::post('them','UsersController@postThem');
		Route::get('xoa/{id}','UsersController@getXoa');
	});
		
		

		Route::group(['prefix'=>'slide'],function()
	{
		Route::get('danhsach','SlideController@getDanhSach');
		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');
		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');
		Route::get('xoa/{id}','SlideController@getXoa');

	});
		Route::group(['prefix'=>'comment'],function(){
		Route::get('xoa/{id}/{Idbaithuoc}','CommentController@getXoa');
		Route::get('xoa/{id}/{Idcaythuoc}','CommentController@getXoa1');
		Route::get('xoa/{id}/{Idduoclieu}','CommentController@getXoa2');
	});

	
});


Route::get('trangchu','PageController@trangchu');
Route::get('lienhe','PageController@lienhe');
//Route::get('baithuoc/{id}')
Route::get('benh/{id}','PageController@benh');
Route::get('danhsachbenh','PageController@danhsachbenh');
Route::get('danhsachduoclieu','PageController@danhsachduoclieu');
Route::get('danhsachcaythuoc','PageController@danhsachcaythuoc');
Route::get('danhsachbaithuoc','PageController@danhsachbaithuoc');
Route::get('chitietduoclieu/{id}','PageController@chitietduoclieu');
Route::get('chitietcaythuoc/{id}','PageController@chitietcaythuoc');
Route::get('chitietbaithuoc/{id}','PageController@chitietbaithuoc');

Route::get('dangnhap','PageController@getDangnhap');
Route::post('dangnhap','PageController@postDangnhap');
Route::get('dangxuat','PageController@getDangxuat');

Route::get('nguoidung','PageController@getNguoidung');
Route::post('nguoidung','PageController@postNguoidung');

Route::get('dangky','PageController@getDangky');
Route::post('dangky','PageController@postDangky');

Route::post('binhluan','PageController@postBinhLuan');

Route::post('timkiem','PageController@timkiem');
Route::get('gioithieu','PageController@gioithieu');
Route::get('chuyengiaduoclieu','PageController@chuyengiaduoclieu');