<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/news', [HomeController::class, 'news'])->name('news.index');
Route::get('/news/{id}', [HomeController::class, 'showNews'])->name('news.show');
Route::get('/reports', [HomeController::class, 'reports'])->name('reports.index');
Route::get('/about', [HomeController::class, 'about'])->name('about.index');
Route::get('/contacts', [HomeController::class, 'contacts'])->name('contacts.index');
Route::get('/management/board', [HomeController::class, 'board'])->name('board.index');
Route::get('/tenders', [HomeController::class, 'tenders'])->name('tenders.index');
Route::get('/branches', [HomeController::class, 'branches'])->name('branches.index');
Route::get('/branches/{id}', [HomeController::class, 'showBranch'])->name('branches.show');
Route::get('/feedback', [HomeController::class, 'feedback'])->name('feedback.index');
Route::post('/feedback', [HomeController::class, 'feedbackStore'])->name('feedback.store');
Route::get('/management/directors', [HomeController::class, 'directors'])->name('directors.index');
Route::get('/management/audit-commission', [HomeController::class, 'auditCommission'])->name('audit.index');
