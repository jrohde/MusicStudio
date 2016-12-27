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


//WEB
Route::get('/', 'PagesController@getIndex');
Route::get('promociones', 'PagesController@getPromotions');
Route::get('proyectos', 'PagesController@getProjects');
Route::get('proyectos/producciones/imagenes/{produccion}', 'PagesController@getImgProd');
Route::get('proyectos/producciones/videos/{produccion}', 'PagesController@getVideoProd');
Route::get('proyectos/eventos/imagenes/{evento}', 'PagesController@getImgEvent');
Route::get('proyectos/eventos/videos/{evento}', 'PagesController@getVideoEvent');
Route::get('proyectos/grabaciones/imagenes/{grabacion}', 'PagesController@getImgRecord');
Route::get('proyectos/grabaciones/videos/{grabacion}', 'PagesController@getVideoRecord');
Route::get('radio', 'PagesController@getRadio');
Route::get('radio/programa/{id}', [ 'as' => 'program.single', 'uses' => 'PagesController@getSingleProgram']);
Route::get('blog', ['as' => 'blog.main', 'uses' => 'PagesController@getBlog']);
Route::get('blog/post/{id}', [ 'as' => 'post.single', 'uses' => 'PagesController@getPost']);
Route::post('/', ['as' => 'contact_footer', 'uses' => 'ContactController@postContact']);
Route::post('promociones', ['as' => 'contact_promo', 'uses' => 'ContactController@postContactPromo']);

//lOGIN

//Authentication Routes(login) -->built in
Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', [ 'as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

//Registration Routes(new users) -->built in
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Reset Password -->built in
//Route::get('password/reset/{token?}', 'Auth\PasswordController@ShowResetForm');
//Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
//Route::post('password/reset', 'Auth\PasswordController@reset');


/////////////////// AUTH /////////////////////////////////////// AUTH ////////////////////
/////////////////// AUTH /////////////////////////////////////// AUTH ////////////////////

//GENERAL ADMIN
Route::get('admin', function(){ return view('pages.admin');});
Route::resource('admin/posts', 'PostController');
Route::resource('admin/radio', 'ProgramController');

// MAIN DETAILS RADIO PROGRAM
Route::get('admin/radio/programa/create/{id}', 'ProgramDetailController@index');
Route::post('admin/radio/programa/create/{id}', 'ProgramDetailController@store');
Route::put('admin/radio/programa/create/{id}', 'ProgramDetailController@update');
Route::delete('admin/radio/programa/create/{id}', 'ProgramDetailController@destroy');

//IMAGES HISTORIAL RADIO PROGRAM
Route::get('admin/radio/programa/{programa}/images', ['as' => 'images.main', 'uses' => 'ImgRadioProgController@index']);
Route::post('admin/radio/programa/images', ['as' => 'imgsRadio.store', 'uses' => 'ImgRadioProgController@storeImg']);
Route::delete('admin/radio/programa/{programa}/images', ['as' => 'imgRadio.destroy', 'uses' => 'ImgRadioProgController@destroyImgs']);

//VIDEOS HISTORIAL RADIO PROGRAM
Route::get('admin/radio/programa/{programa}/videos', ['as' => 'videos.main', 'uses' => 'VideoRadioProgController@index']);
Route::post('admin/radio/programa/videos', ['as' => 'videosRadio.store', 'uses' => 'VideoRadioProgController@storeVideo']);
Route::delete('admin/radio/programa/{programa}/videos', ['as' => 'videoRadio.destroy', 'uses' => 'VideoRadioProgController@destroyVideos']);
Route::put('admin/radio/programa/{programa}/videos', ['as' => 'videoRadio.update', 'uses' => 'VideoRadioProgController@updateVideo']);

//HISTORIAL RADIO PROGRAM
Route::get('admin/radio/programa/{programa}/historial', ['as' => 'historial.main', 'uses' => 'HistoryRadioProgController@index']);
Route::post('admin/radio/programa/historial', ['as' => 'historialRadio.store', 'uses' => 'HistoryRadioProgController@storeHistories']);
Route::delete('admin/radio/programa/{programa}/historial', ['as' => 'historialRadio.destroy', 'uses' => 'HistoryRadioProgController@destroyHistories']);
Route::put('admin/radio/programa/{programa}/historial', ['as' => 'historialRadio.update', 'uses' => 'HistoryRadioProgController@updateHistories']);

//CONDUCTORES RADIO PROGRAM
Route::get('admin/radio/programa/{programa}/conductores', ['as' => 'conductores.main', 'uses' => 'ConductorRadioController@index']);
Route::post('admin/radio/programa/conductores', ['as' => 'conductores.store', 'uses' => 'ConductorRadioController@storeConductor']);
Route::put('admin/radio/programa/{programa}/conductores', ['as' => 'conductores.update', 'uses' => 'ConductorRadioController@updateConductor']);
Route::delete('admin/radio/programa/{programa}/conductores', ['as' => 'conductores.destroy', 'uses' => 'ConductorRadioController@destroyConductor']);

//IMAGES HOME CATEGS
Route::resource('admin/imagenes', 'CategImageController', ['except' => ['create', 'show']]);
Route::resource('admin/imagenes/new', 'ImageHomeController', ['except' => ['create', 'show']]);

//PROYECTS
Route::get('admin/proyectos', function(){return view('pages.adminProjects');});

//PROYECTS->EVENTS
Route::resource('admin/eventos', 'EventController', ['except' => ['create', 'show']]);

//PROYECTS->EVENTS->IMAGES
Route::get('admin/eventos/{evento}/imagenes', 'EventImageController@index');
Route::post('admin/eventos/{evento}/imagenes', ['as' => 'imagesEvento.store', 'uses' => 'EventImageController@storeImg']);
Route::delete('admin/eventos/{evento}/imagenes', ['as' => 'imagesEvento.destroy', 'uses' => 'EventImageController@destroyImagen']);

//PROYECTS->EVENTS->VIDEOS
Route::get('admin/eventos/{evento}/videos', 'EventVideoController@index');
Route::post('admin/eventos/{evento}/video', ['as' => 'videosEvento.store', 'uses' => 'EventVideoController@storeVideo']);
Route::delete('admin/eventos/{evento}/video', ['as' => 'videosEvento.destroy', 'uses' => 'EventVideoController@destroyVideo']);
Route::put('admin/eventos/{evento}/video', ['as' => 'videosEvento.update', 'uses' => 'EventVideoController@updateVideo']);

//PROYECTS->PRODUCTIONS
Route::resource('admin/producciones', 'ProductionController', ['except' => ['create', 'show']]);
Route::get('admin/producciones/{produccion}/musica', 'MusicProductionController@index');
Route::get('admin/producciones/{produccion}/musica/edit', ['as' => 'musicProd.getUpdate', 'uses' => 'MusicProductionController@getUpdate']);
Route::post('admin/producciones/{produccion}/musica', ['as' => 'musicProd.store', 'uses' => 'MusicProductionController@storeMusic']);
Route::put('admin/producciones/{produccion}/musica', ['as' => 'musicProd.update', 'uses' => 'MusicProductionController@updateMusic']);
Route::delete('admin/producciones/{produccion}/musica', ['as' => 'musicProd.destroy', 'uses' => 'MusicProductionController@destroyMusic']);

//PROYECTS->PRODUCTIONS->IMAGES
Route::get('admin/producciones/{produccion}/imagenes', 'ProdImageController@index');
Route::post('admin/producciones/{produccion}/imagenes', ['as' => 'imagesProd.store', 'uses' => 'ProdImageController@storeImg']);
Route::delete('admin/producciones/{produccion}/imagenes', ['as' => 'imagesProd.destroy', 'uses' => 'ProdImageController@destroyImagen']);

//PROYECTS->PRODUCTIONS->VIDEOS
Route::get('admin/producciones/{produccion}/videos', 'ProdVideoController@index');
Route::post('admin/producciones/{produccion}/videos', ['as' => 'videosProd.store', 'uses' => 'ProdVideoController@storeVideo']);
Route::delete('admin/producciones/{produccion}/videos', ['as' => 'videosProd.destroy', 'uses' => 'ProdVideoController@destroyVideo']);
Route::put('admin/producciones/{produccion}/videos', ['as' => 'videosProd.update', 'uses' => 'ProdVideoController@updateVideo']);

//PROYECTS->RECORDS
Route::resource('admin/grabaciones', 'RecordController', ['except' => ['create', 'show']]);
Route::get('admin/grabaciones/{grabacion}/musica', 'MusicRecordController@index');
Route::get('admin/grabaciones/{grabacion}/musica/edit', ['as' => 'musicRec.getUpdate', 'uses' => 'MusicRecordController@getUpdate']);
Route::post('admin/grabaciones/{grabacion}/musica', ['as' => 'musicRec.store', 'uses' => 'MusicRecordController@storeMusic']);
Route::put('admin/grabaciones/{grabacion}/musica', ['as' => 'musicRec.update', 'uses' => 'MusicRecordController@updateMusic']);
Route::delete('admin/grabaciones/{grabacion}/musica', ['as' => 'musicRec.destroy', 'uses' => 'MusicRecordController@destroyMusic']);

//PROYECTS->RECORDS->IMAGES
Route::get('admin/grabaciones/{grabacion}/imagenes', 'RecordImageController@index');
Route::post('admin/grabaciones/{grabacion}/imagenes', ['as' => 'imagesRec.store', 'uses' => 'RecordImageController@storeImg']);
Route::delete('admin/grabaciones/{grabacion}/imagenes', ['as' => 'imagesRec.destroy', 'uses' => 'RecordImageController@destroyImagen']);

//PROYECTS->RECORDS->VIDEOS
Route::get('admin/grabaciones/{grabacion}/videos', 'RecordVideoController@index');
Route::post('admin/grabaciones/{grabacion}/videos', ['as' => 'videosRec.store', 'uses' => 'RecordVideoController@storeVideo']);
Route::delete('admin/grabaciones/{grabacion}/videos', ['as' => 'videosRec.destroy', 'uses' => 'RecordVideoController@destroyVideo']);
Route::put('admin/grabaciones/{grabacion}/videos', ['as' => 'videosRec.update', 'uses' => 'RecordVideoController@updateVideo']);

// TYPES
Route::get('admin/articulos', 'TypeController@index');
Route::post('admin/articulos', ['as' => 'type.store', 'uses' => 'TypeController@storeType']);
Route::put('admin/articulos/{id}', ['as' => 'type.update', 'uses' => 'TypeController@updateType']);
Route::delete('admin/articulos/{id}', ['as' => 'type.destroy', 'uses' => 'TypeController@destroyType']);

// ARTICLES
Route::get('admin/articulos/{id}/todos', ['as' => 'article.get', 'uses' => 'ArticleController@index']);
Route::post('admin/articulos/store', ['as' => 'article.store', 'uses' => 'ArticleController@storeArticle']);
Route::put('admin/articulos/{id}/edit', ['as' => 'article.update', 'uses' => 'ArticleController@updateArticle']);
Route::delete('admin/articulos/{id}/delete', ['as' => 'article.destroy', 'uses' => 'ArticleController@destroyArticle']);

//PROMOTIONS
Route::get('admin/promociones', ['as' => 'promotion.get', 'uses' => 'PromoController@index']);
Route::post('admin/promociones/store', ['as' => 'promotion.store', 'uses' => 'PromoController@storePromo']);
Route::delete('admin/promociones/{id}/delete', ['as' => 'promotion.destroy', 'uses' => 'PromoController@destroyPromo']);
Route::put('admin/promociones/{id}/update', ['as' => 'promotion.update', 'uses' => 'PromoController@updatePromo']);

//PROMOTIONS CONTENTS

Route::get('admin/promociones/{id}/contenido', ['as' => 'promoContent.get', 'uses' => 'PromoContentController@index']);
Route::post('admin/promociones/{id}/contenido/store', ['as' => 'promoContent.store', 'uses' => 'PromoContentController@storeContent']);
