<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SclassController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\SubjectController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Student Class Routes
Route::get('/class', [SclassController::class, 'Index']);
Route::post('/class/store', [SclassController::class, 'Store']);
Route::get('/class/edit/{id}', [SclassController::class, 'Edit']);
Route::post('/class/update/{id}', [SclassController::class, 'Update']);
Route::get('/class/delete/{id}', [SclassController::class, 'Delete']);

//Subject Class Routes
Route::get('/subject', [SubjectController::class, 'Index']);
Route::post('/subject/store', [SubjectController::class, 'Store']);
Route::get('/subject/edit/{id}', [SubjectController::class, 'subEdit']);
Route::post('/subject/update/{id}', [SubjectController::class, 'Update']);
Route::get('/subject/delete/{id}', [SubjectController::class, 'Delete']);

//Section Class Routes
Route::get('/section', [SectionController::class, 'sectionIndex']);
Route::post('/section/store', [SectionController::class, 'sectionStore']);
Route::get('/section/edit/{id}', [SectionController::class, 'sectionEdit']);
Route::post('/section/update/{id}', [SectionController::class, 'sectionUpdate']);
Route::get('/section/delete/{id}', [SectionController::class, 'Delete']);
