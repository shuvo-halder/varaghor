<?php

use Modules\Brand\Http\Controllers\BrandController;


Route::group(['as'=> 'admin.', 'prefix' => 'admin/listing', 'middleware' => ['XSS','DEMO','auth:admin']],function (){

    Route::resource('types', BrandController::class);

});
