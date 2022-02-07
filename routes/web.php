<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SingleImageUpload;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/student',[SingleImageUpload::class,'index'])->name('student.index');
Route::get('/addStudent',[SingleImageUpload::class,'addStudent'])->name('addStudent');
Route::post('/addStudent',[SingleImageUpload::class,'storeStudent']);
Route::get('/edit-student/{id}',[SingleImageUpload::class,'edit'])->name('student.edit');
Route::put('/update-student/{id}',[SingleImageUpload::class,'update'])->name('student.update');
Route::delete('/delete-student/{id}',[SingleImageUpload::class,'destroy'])->name('student.destroy');