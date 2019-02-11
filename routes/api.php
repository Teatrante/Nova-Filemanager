<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
 */
Route::get('data', \Wdgt\Filemanager\Http\Controllers\FilemanagerToolController::class.'@getData');
Route::get('data/{search}', \Wdgt\Filemanager\Http\Controllers\FilemanagerToolController::class.'@getSearchData');
Route::post('actions/create-folder', \Wdgt\Filemanager\Http\Controllers\FilemanagerToolController::class.'@createFolder');
Route::post('actions/delete-folder', \Wdgt\Filemanager\Http\Controllers\FilemanagerToolController::class.'@deleteFolder');
Route::post('actions/get-info', \Wdgt\Filemanager\Http\Controllers\FilemanagerToolController::class.'@getInfo');
Route::post('actions/remove-file', \Wdgt\Filemanager\Http\Controllers\FilemanagerToolController::class.'@removeFile');
Route::post('actions/move-file', \Wdgt\Filemanager\Http\Controllers\FilemanagerToolController::class.'@moveFile');

Route::post('uploads/add', \Wdgt\Filemanager\Http\Controllers\FilemanagerToolController::class.'@upload');
Route::get('uploads/update', \Wdgt\Filemanager\Http\Controllers\FilemanagerToolController::class.'@updateFile');
