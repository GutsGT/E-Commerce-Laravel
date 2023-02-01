<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return Post::all();
    }

    public function show(Post $post){
        //  Por padrão, o Laravel não carrega a relação entre post e usuário,
        // para carregar a relação, use
        // $post->load('user');

        //Caso esse carregamento seja algo padrão que ocorrerá sempre,
        //essa relação pode ser colocada na variável $with da model do Post

        dd($post->user);
        return $post;
    }
}
