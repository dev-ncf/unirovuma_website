<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidaturaController;
use App\Http\Middleware\AdminAuth;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/manutencao', function () {
    return view('manutencao');
})->name('manutencao');


Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::get('/admissao-ensino-a-distancia', [CandidaturaController::class, 'index'])->name('candidatura.index');
// Página Separada do Formulário de Inscrição
Route::get('/admissao-ensino-a-distancia/inscrever', [CandidaturaController::class, 'create'])->name('candidatura.create');
Route::post('/admissao-ensino-a-distancia/inscrever', [CandidaturaController::class, 'store'])->name('candidatura.store');


// Rotas Protegidas de Gestão
// Rotas Protegidas de Gestão (Passando a classe diretamente)
Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/admissao-ensino-a-distancia/admin/gestao', [CandidaturaController::class, 'gestao'])->name('candidatura.gestao');
    Route::delete('/admissao-ensino-a-distancia/admin/gestao/{id}', [CandidaturaController::class, 'destroy'])->name('candidatura.destroy');
});