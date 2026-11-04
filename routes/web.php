<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidaturaController;
use App\Http\Middleware\AdminAuth;
use App\Models\UnidadeAcademica;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/manutencao', function () {
    return view('manutencao');
})->name('manutencao');

Route::livewire('/unidade/projectos/{id}', 'pages::projeto-detalhe')->name('projeto.detalhe');
Route::livewire('/unidade/{slug}', 'pages::unidade-detalhe')->name('unidade.detalhe');
Route::livewire('/noticia/{id}', 'pages::noticia-detalhe')->name('noticia.detalhe');
Route::livewire('/direcao/{slug}', 'pages::direcao-detalhe')->name('direcao.detalhe');
Route::livewire('/gabinete/{slug}', 'pages::gabinete-detalhe')->name('gabinete.detalhe');
Route::livewire('/centro-estudo/{slug}', 'pages::centro-detalhe')->name('centro.detalhe');
Route::livewire('/direccao-central/{slug}', 'pages::direccao-central-detalhe')->name('direccao.central.detalhe');


Route::get('/admissao-ensino-a-distancia/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admissao-ensino-a-distancia/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admissao-ensino-a-distancia/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

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