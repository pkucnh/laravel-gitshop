<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
//test
Route::match(['get','post'],'registers',[
    'as'=> 'register',  
    'uses'=> 'loginController@register'
]);
    Route::name('/')->group(function () {
        //LOGIN
        // Route::match(['get','post'],'/logins',[
        //     'as'=> 'logins',  
        //     'uses'=> 'loginController@index'
        // ]);
        //LOGOUT
        // Route::get('/logout',[
        //     'as'=> '/logout',  
        //     'uses'=> 'loginController@logout'
        // ]);
        //DASHBOARD
        Route::get('/dashboard',[
            'as'=> '/dashboard',  
            'uses'=> 'LoginController@dashboard'
        ])->middleware('auth', 'Quantri');
        //REGISTER
        // Route::match(['get','post'],'register',[
        //     'as'=> 'register',  
        //     'uses'=> 'loginController@register'
        // ]);
    }); 
    //SHOP-HOME-BYCATEGORY
    Route::name('/')->group(function () {
        Route::get('/', [
            'as'=> 'shop.index',  
            'uses'=> 'ShopController@index'
        ]);
        Route::get('/bycategory/{slug}/{id}',[
            'as'=> 'shop.category',  
            'uses'=> 'ShopController@bycategory'
        ]);
        Route::get('/detail-product/{slug}/{id}',[
            'as'=> 'shop.detail',  
            'uses'=> 'ShopController@detailproduct'
        ]);
    }); 
  
    // PRODUCT
    Route::prefix('product')->middleware('auth', 'product')->group(function () {
        Route::get('/index', [
            'as'=> 'product.index',  
            'uses'=> 'productController@index'
        ]);

        Route::match(['get','post'],'/add',[
        'as'=> 'product.add',  
        'uses'=> 'productController@add'
        ]);
        Route::match(['get','post'],'/update/{id}',[
            'as'=> 'product.update',  
            'uses'=> 'productController@update'
            ]);
        Route::post('/delete/{id}',[
            'as'=> 'product.delete',  
            'uses'=> 'productController@delete'
        ]);
        Route::get('/delete/{id}',[
            'as'=> 'product.delete',  
            'uses'=> 'productController@delete'
        ]);
    });
    // CATEGORY
    Route::prefix('category')->middleware('auth', 'product')->group(function () {
        Route::get('/index', [
            'as'=> 'category.index',  
            'uses'=> 'CategoryController@index'
        ]);
        Route::match(['get','post'],'/add',[
            'as'=> 'category.add',  
            'uses'=> 'CategoryController@add'
        ]);
        Route::match(['get','post'],'/update/{id}',[
            'as'=> 'category.update',  
            'uses'=> 'CategoryController@update'
        ]);
        Route::post('/delete/{id}',[
            'as'=> 'category.delete',  
            'uses'=> 'CategoryController@delete'
        ]);     
        Route::get('/delete/{id}',[
            'as'=> 'category.delete',  
            'uses'=> 'CategoryController@delete'
        ]);      
    });
    // MENU
     Route::prefix('menu')->middleware('auth', 'product')->group(function () {
        Route::get('/index', [
            'as'=> 'menu.index',  
            'uses'=> 'MenuController@index'
        ]);
        Route::match(['get','post'],'/add',[
            'as'=> 'menu.add',  
            'uses'=> 'MenuController@add'
        ]);
        Route::match(['get','post'],'/update/{id}',[
            'as'=> 'menu.update',  
            'uses'=> 'MenuController@update'
        ]);
        Route::post('/delete/{id}',[
            'as'=> 'Menu.delete',  
            'uses'=> 'MenuController@delete'
        ]);     
        Route::get('/delete/{id}',[
            'as'=> 'menu.delete',  
            'uses'=> 'MenuController@delete'
        ]);      
    });
        // COUPON
        Route::prefix('coupon')->middleware('auth', 'voucher')->group(function () {
            Route::get('/index', [
                'as'=> 'coupon.index',  
                'uses'=> 'CouponController@index'
            ]);
            Route::match(['get','post'],'/add',[
                'as'=> 'coupon.add',  
                'uses'=> 'CouponController@add'
            ]);
            Route::match(['get','post'],'/update/{id}',[
                'as'=> 'coupon.update',  
                'uses'=> 'CouponController@update'
            ]);
            Route::post('/delete/{id}',[
                'as'=> 'coupon.delete',  
                'uses'=> 'CouponController@delete'
            ]);      
            Route::get('/delete/{id}',[
                'as'=> 'coupon.delete',  
                'uses'=> 'CouponController@delete'
            ]);  
        });
        //FEESHIP
        Route::prefix('feeship')->middleware('auth', 'feeship')->group(function () {
            Route::get('/index', [
                'as'=> 'feeship.index',  
                'uses'=> 'FeeshipController@index'
            ]);
            Route::match(['get','post'],'/add-feeship',[
                'as'=> 'feeship.add',  
                'uses'=> 'FeeshipController@AddFeeship'
            ]);
            Route::match(['get','post'],'/add',[
                'as'=> 'feeship.add',  
                'uses'=> 'FeeshipController@add'
            ]);
            
            Route::post('/delete/{id}',[
                'as'=> 'feeship.delete',  
                'uses'=> 'FeeshipController@delete'
            ]);      
            Route::get('/delete/{id}',[
                'as'=> 'feeship.delete',  
                'uses'=> 'FeeshipController@delete'
            ]);  
        });
        //BÌNH LUẬN
         Route::prefix('comment')->middleware('auth', 'comment')->group(function () {
            Route::get('/index', [
                'as'=> 'comment.index',  
                'uses'=> 'CommentController@index'
            ]);
            Route::post('/delete/{id}',[
                'as'=> 'comment.delete',  
                'uses'=> 'CommentController@delete'
            ]);      
            Route::get('/delete/{id}',[
                'as'=> 'comment.delete',  
                'uses'=> 'CommentController@delete'
            ]);  
        });
        // ADMIN ĐƠN HÀNG
        Route::prefix('order')->middleware('auth', 'order')->group(function () {
            Route::get('/index', [
                'as'=> 'order.index',  
                'uses'=> 'OrderController@index'
            ]);
            Route::match(['get','post'],'/update/{id}',[
                'as'=> 'order.update',  
                'uses'=> 'OrderController@update'
            ]);
            Route::match(['get','post'],'/delete/{id}',[
                'as'=> 'delete.add',  
                'uses'=> 'OrderController@delete'
            ]);
            // Route::post('/delete',[
            //     'as'=> 'coupon.delete',  
            //     'uses'=> 'CouponController@delete'
            // ]);      
        });
        // USER
    Route::prefix('user')->middleware('auth', 'user')->group(function () {
        Route::get('/index', [
            'as'=> 'user.index',  
            'uses'=> 'userController@index'
        ]);
        Route::match(['get','post'],'/add',[
            'as'=> 'user.add',  
            'uses'=> 'userController@add'
        ]);
        Route::match(['get','post'],'/update/{id}',[
            'as'=> 'user.update',  
            'uses'=> 'userController@update'
        ]);
        Route::post('/delete/{id}',[
            'as'=> 'user.delete',  
            'uses'=> 'userController@delete'
        ]);      
        Route::get('/delete/{id}',[
            'as'=> 'user.delete',  
            'uses'=> 'userController@delete'
        ]);
    });
    // COMMENT
    Route::post('/send-comment','ShopController@SendComment');
    Route::post('/load-comment','ShopController@LoadComment');

    // ADD-CART
    Route::post('/add-cart','CartController@AddCart');
    // DELETE-CART
    Route::match(['get','post'],'/delete-cart/{session_id}',[
        'as'=> 'cart.delete',  
        'uses'=> 'CartController@DeleteCart'
    ]);         
    // UPDATE-CART
    Route::match(['get','post'],'/update-cart',[
        'as'=> 'cart.update',  
        'uses'=> 'CartController@UpdateCart'
    ]);     
    // SHOW-CART
    Route::match(['get','post'],'/cart',[
        'as'=> 'cart.add',  
        'uses'=> 'CartController@ShowCart'
    ]);    
    // COUPON
    Route::post('/check_coupon','CartController@CheckCoupon');
    // DELETE COUPON delete-coupon
    Route::post('/delete-coupon','CartController@DeleteCoupon');
    Route::get('/delete-coupon','CartController@DeleteCoupon');
    // SHIP
    Route::post('/select-delivery-home','CartController@SelectDeliveryHome');
    //FeeShip
    Route::post('/calculate-fee','CartController@CalculateFee');
    //Delete Feeship
    Route::post('/delete-fee','CartController@DeleteFee');
    Route::get('/delete-fee','CartController@DeleteFee');
    //Order
    Route::post('/confirm-order','CartController@ConfirmOrder');
    // Route::get('/confirm-order','CartController@ConfirmOrder');
    //Mailcoupon send-email-coupon
    // Route::post('/send-email-coupon','CouponController@SendMail');
    Route::get('/send-email-coupon/{amount}/{code}/{conditions}/{number}','CouponController@SendMail');
    //History
    Route::get('/history','CartController@History');
    //DETAIL_HISTORY
    Route::get('/view-history-order/{order_code}','CartController@ViewHistoryOrder');
    // Đăng nhập user
    Route::get('/dang-nhap','LoginController@LoginUser');
    Route::post('/dang-nhap','LoginController@LoginUser');
    // Đăng xuất user
    Route::get('/dang-xuat','LoginController@LogoutUser');
    //Đăng nhập bằng facebook
    Route::get('/dang-nhap-facebook','LoginController@LoginFacebook');
    Route::get('/dang-nhap/facebook/callback','LoginController@CallbackFacebook');
    //Đăng nhập bằng google
    Route::get('/dang-nhap-google','LoginController@LoginGoogle');
    Route::get('/dang-nhap/google/callback','LoginController@CallbackGoogle');
    // TÌM KIẾM
    // Route::get('/tim-kiem','ShopController@Search');
    Route::post('/tim-kiem','ShopController@Search');
    // Route::match(['get','post'],'/tim-kiem','ShopController@Search');  
    // Liên  hệ
    Route::get('/lien-he','ShopController@Contact');
    Route::post('/lien-he','ShopController@Contact');
    // Báo cáo
    Route::get('/bao-cao', function(){
        return view('baocao.baocao');
    });

    Auth::routes();

    // Route::get('/das', function(){
    //     return view('admin/dashboard');
    // })->middleware('auth', 'Quantri');;

    // Route::get('/dang-nhap-admin', function(){
    //     return view('auth.login');
    // })->middleware('auth', 'Quantri');
    // Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class,'login']);


    // Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class,'login']);
    Route::get('logout', function(){
        Auth::logout();
        return redirect()->route('login');
    });
    // Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class,'logout']);
    // Route::get('/home', 'HomeController@index')->name('home');
 
    // Phân quyền
    Route::prefix('level')->middleware('auth', 'level')->group(function () {
        Route::get('/index', [
            'as'=> 'user.index',  
            'uses'=> 'userController@ShowLevel'
        ]);
        
        Route::match(['get','post'],'/up/{id}',[
            'as'=> 'level.up',  
            'uses'=> 'userController@UpLevel'
        ]);
       
    });
    // Route::get('/login','LoginController@index');
        // Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class,'login']);
        // Route::post('/login', function(){
        //     $admin_id = Auth::id();
        //     if($admin_id){
        //        return redirect::to('dashboard');
        //     }else{
        //         return redirect()->route('login');
        //     }
  
        // });
          Route::post('/login','LoginController@LoginAdmin');