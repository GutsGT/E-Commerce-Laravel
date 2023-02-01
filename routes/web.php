<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

/*  Route::get('request', function(\Illuminate\Http\Request $request){
        //Exemplos 
        // $r = $request->all();
        // $r = $request->query();
        // $r = $request->input('keyword');
        // $r = $request->path();
        // $r = $request->url();
        // $r = $request->fullUrl();
        // $r = $request->header();
        // $r = $request->has('keyword');
        // $r = $request->whenHas('keyword', function($input){
        //     dd('x', $input);
        // });
        // $r = $request->whenFilled('keyword', function($input){
        //     dd('x', $input);
        // });
        $r = $request->ip();

        // if($r){
        //     dd('faça alguma coisa');
        // }

        dd($r);
        return 'x';
    });
*/

//Colocando apenas "{user}" ele irá pesquisar de acordo com o id, porém colocando "{user:email}", ele pesquisa através do email
/*  Route::get('user/{user:email}', function(\App\Models\User $user){
        return $user;
    });
*/

/* //Exemplos: Grupo de rotas
    Route::prefix('usuarios')->group(function(){
        Route::get('', function(){
            return 'usuário';
        })->name('usuarios');
        Route::get('/{id}', function(){
            return 'Mostrar detalhes';
        })->name('usuarios.show');
        Route::get('/{id}/tags', function(){
            return 'Tags do usuário';
        })->name('usuarios.tags');
    });
*/


/*  Route::get('/a-empresa/{string?}', function ($string = null){
        return $string;
        //return view('welcome');
    })->name('a-empresa');
*/

// Exemplo
/*  Route::get('/users/{paramA}/{paramB}', function ($paramA, $paramB){
        return $paramA.' - '.$paramB;
        //return view('welcome');
    });
*/



Route::get('businesses', [BusinessController::class, 'index'])->name('businesses.index');
Route::post('businesses', [BusinessController::class, 'store'])->name('businesses.store');
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/{user}', [UserController::class, 'show'/*Nome do método*/])->name('users.show');

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('', function(){
    return view('welcome');
})->name('home');