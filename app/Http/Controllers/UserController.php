<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users', [
            'users'=>$users,
        ]);
    }


    public function show(User $user, Request $request){

        $user->load('teams');
        
        $team = Team::find(1);
        $team->load('users');
        // $team->users()->attach(3); 
        
        return $team;

        
        return $user;
        
        //Criar post para o usuário
        // $user->posts()->create([
        //     'title'=>'Meu primeiro Post',
        //     'body'=>'Isso é um post'
        // ]);

        //Deletar todos os posts do usuário
        // $user->posts()->delete();
        // dd($user->posts);

        // return view('user', [
        //     'name'=>'John Snow',
        //     'user'=>$user
        // ]);

        /*Exemplos de conexão com outra tabela
            //Fazer a conexão deste user com team 1
            // $user->teams()->attach([1, 2]);

            //Apagar todas as relações que já existem e colocar novas
            //$user->teams()->sync([2,3]);

            //Colocar novas relações sem apagar as relações já existentes
            //$user->teams()->syncWithoutDetaching([1]);
            
            //Para desfazer a conexão
            //$user->teams()->detach([1, 2, 3]);
        */
    }
}
