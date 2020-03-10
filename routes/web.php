<?php

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

// Route::get('/login', function () {
//     return view('admin/dashboard');
// });


Route::get('/', 'PagesController@index');
Route::get('/index', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/car', 'PagesController@car');
Route::get('/checkout', 'PagesController@checkout');
Route::get('/contact', 'PagesController@contact');
Route::get('/body', 'PagesController@body');
Route::get('/brand', 'PagesController@brand');
Route::get('/cardetail', 'PagesController@cardetail');
Route::get('/brandindex', 'PagesController@brandindex');
Route::get('/send', 'PagesController@send');
Route::get('/galleryslider', 'PagesController@galleryslider');
Route::get('/hints', 'PagesController@hints');
Route::get('/spare', 'PagesController@spare');
Route::get('/new', 'PagesController@new');
Route::get('/feedback', 'PagesController@feedback');
Route::post('/contact/store',['uses'=>'ContactsController@store','as'=>'contact.store']);
Route::post('/sendemail/send','ContactsController@sendMessage');

Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Route::get('/login','Auth\LoginController@login');
Route::get('/admin/dashboard', 'AdminsDashboardController@index');
Route::get('/admin/testtest', 'AdminsDashboardController@index');
 Route::get('admin/menus/search','MenusController@result')->name('menusearch');
 Route::get('/admin/menus/create','MenusController@create');
 Route::post('/admin/menus/store',[
     'uses'=>'MenusController@store',
 'as'=>'admin.menus.store']);
 Route::get('/admin/menus/edit/{id}',[
     'uses'=>'MenusController@edit',
     'as' => 'admin.menus.update'
 ]);
 Route::post('admin/menus/update/{id}',[
     'uses' =>'MenusController@update',
     'as'  =>'admin.menus.update'
 ]);
 Route::get('admin/menus/{id}','MenusController@destroy');




 Route::get('/admin/introductions/','IntroductionsController@index');
 Route::get('/admin/introductions/create','IntroductionsController@create');
 Route::post('/admin/introductions/store',[
     'uses' => 'IntroductionsController@store',
     'as' => 'admin.introductions.store'
 ]);
 Route::get('/admin/introductions/edit/{id}',[
     'uses' => 'IntroductionsController@edit',
     'as'   => 'admin.introductions.edit'
 ]);
 Route::post('/admin/introductions/update/{id}',[
     'uses' => 'IntroductionsController@update',
     'as'   => 'admin.introductions.update'
  ]);
  Route::get('/admin/introductions/{id}','IntroductionsController@destroy');

//Brand
Route::get('/admin/brandii/','BrandiisController@index');
Route::get('admin/brandii/search','BrandiisController@result')->name('brandindexsearch');
Route::get('/admin/brandii/create','BrandiisController@create');
Route::post('/admin/brandii/store',[
    'uses'=>'BrandiisController@store',
'as'=>'admin.brandii.store']);
Route::get('/admin/brandii/edit/{id}',[
    'uses'=>'BrandiisController@edit',
    'as'=>'admin.brandii.edit']);
    Route::post('/admin/brandii/update/{id}',[
        'uses' => 'BrandiisController@update',
        'as' =>'admin.brandii.update'
    ]);
    Route::get('admin/brandii/{id}','BrandiisController@destroy');


Route::get('/admin/galleryindices/','GalleryindicesController@index');
Route::get('admin/galleryindices/search','GalleryindicesController@result')->name('galleryindicessearch');
Route::get('/admin/galleryindices/create','GalleryindicesController@create');
Route::post('/admin/galleryindices/store',[
    'uses'=>'GalleryindicesController@store',
'as'=>'admin.galleryindices.store']);
Route::get('/admin/galleryindices/edit/{id}',[
    'uses'=>'GalleryindicesController@edit',
    'as'=>'admin.galleryindices.edit']);
    Route::post('/admin/galleryindices/update/{id}',[
        'uses' => 'GalleryindicesController@update',
        'as' =>'admin.galleryindices.update'
    ]);
    Route::get('admin/galleryindices/{id}','GalleryindicesController@destroy');


Route::get('/admin/banners/','BannersController@index');
Route::get('admin/banners/search','BannersController@result')->name('bannersearch');
Route::get('/admin/banners/create','BannersController@create');
Route::post('/admin/banner/store',[
    'uses'=>'BannersController@store',
'as'=>'admin.banner.store']);
Route::get('/admin/banners/edit/{id}',[
    'uses'=>'BannersController@edit',
    'as'=>'admin.banners.edit']);
    Route::post('/admin/banners/update/{id}',[
        'uses' => 'BannersController@update',
        'as' =>'admin.banners.update'
    ]);
    Route::get('admin/banners/{id}','BannersController@destroy');

// Banner

Route::get('/admin/logos/','LogosController@index');
Route::get('admin/logos/search','LogosController@result')->name('logosearch');
Route::get('/admin/logos/create','LogosController@create');
Route::post('/admin/logo/store',[
    'uses'=>'LogosController@store',
'as'=>'admin.logos.store']);
Route::get('/admin/logos/edit/{id}',[
    'uses'=>'LogosController@edit',
    'as'=>'admin.logos.edit']);
    Route::post('/admin/logos/update/{id}',[
        'uses' => 'LogosController@update',
        'as' =>'admin.logos.update'
    ]);
    Route::get('admin/logos/{id}','LogosController@destroy');



     //Role
     Route::get('/admin/roles','RolesController@index');
     Route::get('/admin/roles/create','RolesController@create');
     Route::post('/admin/roles/store',[
         'uses' => 'RolesController@store',
         'as' => 'admin.roles.store'
     ]);
     Route::get('/admin/roles/edit/{id}','RolesController@edit');
     Route::post('/admin/roles/update/{id}',[
         'uses'=>'RolesController@update',
         'as' => 'admin.roles.update'
     ]);
     Route::get('/admin/roles/{id}','RolesController@destroy');

Route::get('/admin/users/profile',[
    'uses'=>'UsersController@profile',
    'as'=>'admin.users.profile'
]);
Route::get('/admin/users/create','UsersController@create');


Route::get('/admin/user/edit/{id}',[
    'uses'=> 'UsersController@edit',
    'as' => 'admin.user.edit'
]);
Route::post('/admin/users/updatestore/{id}',[

    'uses'=>'UsersController@updateStore',
    'as'=>'admin.users.updatestore'
]);
Route::post('/admin/users/update',[

    'uses'=>'UsersController@update',
    'as'=>'admin.users.update'
]);



Route::get('/admin/about/','AboutsController@index');
    Route::get('/admin/about/create','AboutsController@create');
    Route::post('/admin/about/store',[
        'uses' => 'AboutsController@store',
        'as' => 'admin.about.store'
    ]);
    Route::get('/admin/about/edit/{id}',[
        'uses' => 'AboutsController@edit',
        'as'   => 'admin.about.edit'
    ]);
    Route::post('/admin/about/update/{id}',[
        'uses' => 'AboutsController@update',
        'as'   => 'admin.about.update'
     ]);
     Route::get('/admin/about/{id}','AboutsController@destroy');


//Spare Parts     

Route::get('/admin/spares/','SparesController@index');
Route::get('admin/spares/search','SparesController@result')->name('spareimagesearch');
Route::get('/admin/spares/create','SparesController@create');
Route::post('/admin/spares/store',[
    'uses'=>'SparesController@store',
'as'=>'admin.spares.store']);
Route::get('/admin/spares/edit/{id}',[
    'uses'=>'SparesController@edit',
    'as'=>'admin.spares.edit']);
    Route::post('/admin/spares/update/{id}',[
        'uses' => 'SparesController@update',
        'as' =>'admin.spares.update'
    ]);
    Route::get('admin/spares/{id}','SparesController@destroy');


//Brand


Route::get('/admin/brands/','BrandsController@index');
Route::get('admin/brands/search','BrandsController@result')->name('brandsearch');
Route::get('/admin/brands/create','BrandsController@create');
Route::post('/admin/brands/store',[
    'uses'=>'BrandsController@store',
'as'=>'admin.brands.store']);
Route::get('/admin/brands/edit/{id}',[
    'uses'=>'BrandsController@edit',
    'as'=>'admin.brands.edit']);
    Route::post('/admin/brands/update/{id}',[
        'uses' => 'BrandsController@update',
        'as' =>'admin.brands.update'
    ]);
    Route::get('admin/brands/{id}','BrandsController@destroy');



//Google Map
Route::get('/admin/map','MapsController@index');
Route::get('/admin/map/create','MapsController@create');
Route::post('/admin/map/store',[
    'uses' => 'MapsController@store',
    'as' => 'admin.map.store'
]);
Route::get('/admin/map/edit/{id}','MapsController@edit');
Route::post('/admin/map/update/{id}',[
    'uses' => 'MapsController@update',
    'as' => 'admin.map.update'
]);
Route::get('/admin/map/{id}','MapsController@destroy');


Route::get('/admin/footers/','FootersController@index');
Route::get('/admin/footers/create','FootersController@create');
Route::post('/admin/footers/store',[
    'uses'=>'FootersController@store',
'as'=>'admin.footers.store']);
Route::get('/admin/footers/edit/{id}','FootersController@edit');
Route::post('admin/footers/update/{id}',[
    'uses' =>'FootersController@update',
    'as'  =>'admin.footers.update'
]);
Route::get('admin/footers/{id}','FootersController@destroy');



Route::get('/admin/gallery','GalleriesController@index');
Route::get('/admin/gallery/create','GalleriesController@create');
Route::post('/admin/gallery/store',[
    'uses'=>'GalleriesController@store',
    'as'=>'admin.gallery.store'
]);
Route::get('admin/gallery/search','GalleriesController@result')->name('gallerysearch');

Route::get('/admin/gallery/{id}','GalleriesController@show')->where('id', '[0-9]+');
Route::get('/admin/gallery/delete/{id}','GalleriesController@destroy')->where('id', '[0-9]+');

Route::get('/admin/gallery/edit/{id}',[
    'uses'=>'GalleriesController@edit',
    'as'=>'admin.gallery.edit'
]);

Route::post('/admin/gallery/update/{id}',[
    'uses'=>'GalleriesController@update',
    'as'=>'admin.gallery.update'
]);



Route::get('/admin/photos/create/{id}','PhotosController@create');
Route::post('/admin/photos/store/{id}',[
    'uses'=>'PhotosController@store',
    'as'=>'admin.photos.store'
]);
Route::get('/admin/photos/{id}','PhotosController@show');
 Route::get('/admin/photos/delete/{id}','PhotosController@destroy');


     // Pages

     Route::get('/admin/pages','AdminpagesController@index');
     Route::get('admin/pages/search','AdminpagesController@result')->name('pagesearch');
     Route::get('/admin/pages/create','AdminpagesController@create');
     Route::post('/admin/pages/store',[
         'uses'=>'AdminpagesController@store',
         'as' => 'admin.pages.store'
     ]);
     Route::get('/admin/pages/edit/{id}',[
         'uses'=>'AdminpagesController@edit',
         'as'=>'admin.pages.edit'
     ]);
     Route::post('/admin/pages/update/{id}',[
         'uses'=>'AdminpagesController@update',
         'as'=>'admin.pages.update'
     ]);
     Route::get('/admin/pages/{id}','AdminpagesController@destroy');
     
     
     

// Client Feedback
Route::get('/admin/feedbacks/','FeedbacksController@index');
Route::get('admin/feedbacks/search','FeedbacksController@result')->name('feedbacksearch');
Route::get('/admin/feedbacks/edit/{id}',[
    'uses'=>'FeedbacksController@edit',
    'as'=>'admin.feedbacks.edit'
]);
Route::post('/admin/feedbacks/update/{id}',[
    'uses'=>'FeedbacksController@update',
    'as'=>'admin.feedbacks.update'
]);
Route::get('/admin/feedbacks/{id}','FeedbacksController@destroy');



Route::get('/{slug}', [
	'uses' => 'PagesController@getPage'
])->where('slug', '([A-Za-z0-9\-\/]+)');
