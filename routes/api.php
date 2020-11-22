<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('site', 'Api\V1\SiteController')->except([
             'edit'
        ]);Route::resource('site', 'Api\V1\SiteController')->except([
             'edit'
        ]);Route::resource('region', 'Api\V1\RegionController')->except([
             'edit'
        ]);Route::resource('subregion', 'Api\V1\SubRegionController')->except([
             'edit'
        ]);Route::resource('mbu', 'Api\V1\MBUController')->except([
             'edit'
        ]);