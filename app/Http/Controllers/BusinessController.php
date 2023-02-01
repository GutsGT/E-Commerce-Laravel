<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BusinessController extends Controller
{
    public function index(){

        $businesses = Business::all();

        return view('businesses', compact('businesses'));

        /*Exemplos
            // Esse comando é parte do Eloquent, 
            // em que ele cria uma consulta no banco 
            // de dados que pega todos os businesses

            // $businesses = Business::all();
            // dd($businesses);
            

            //Pesquisar de acordo com o ID
            // $business = Business::find(1);
            // dd($business);
            

            //Pesquisar usando where
            // $businessWhere = Business::where('name', 'Wehner PLC')->get();
            // $businessWhere2 = Business::where('name', 'LIKE', 'Wehner PLC')->get();
            // dd($businessWhere);
            // dd($businessWhere2);


            //Pesquisa e trás apenas o primeiro
            // $businessWhereFirst = Business::where('name', 'Wehner PLC')->first();
            // dd($businessWhereFirst);

            //Pesquisa com vários critérios
            // $businessWhere = Business::where('name', 'Wehner PLC')
            //     ->where('id', '1')
            //     ->orWhere('id', '2')
            //     ->get();
            // dd($businessWhere);

            // Ao fazer uma inserção como essa, deve ser colocado 
            // esses campos na variável $fillable da model. Pois se não for
            // colocado o Laravel impede para manter a segurança contra atualizações em massa
            
            // $business = Business::create([
            //     'name'=>'John Snow',
            //     'email'=>'john@snow.com',
            //     'address'=>'Rua A quadra B'
            // ]);
            // dd($business);

            //Exemplos de atualização através do Eloquent
                //Primeira opção:
                    // $business = Business::find(7);
                    // $business->name = 'Tiago';
                    // $business->email = 'tiago@laravel9.com';
                    // $business->address = 'Quadra C Rua B';
                    // $business->save();
                    // dd($business);
                //Segunda opção
                    // $business = Business::find(6)->update([
                    //     'name'=>'John',
                    //     'email'=>'sdsd@sdsd.com',
                    // ]);
                    // dd($business);
                //Terceira opção
                    // $input = [
                    //     'name'=>'John',
                    //     'email'=>'wasd@wasd.com'
                    // ];
                    // $business = Business::find(5);
                    // $business->fill($input);
                    // $business->save();
                    // dd($business);

            //Exemplo de delete
                // $business = Business::find(8);
                // $business->delete();
                // dd($business);

            //Outras formas de mostrar os dados da variável
                // $business = Business::find(8);
                // dd($business->toArray());
                // dd($business->toSql());

            //Mostrar a query que está sendo executada
                // $business = Business::find(8);
                // dd($business->toSql());
        */
    }

    public function store(Request $request){

        //Para ver regras de validação, acesse
        //https://laravel.com/docs/9.x/validation#available-validation-rules
        $input = $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'logo'=>'file'
        ]);
        $file = $input['logo'];

        $path = $file->store('logos', 'public');
        $input['logo'] = $path;

        Business::create($input);
        return Redirect::route('businesses.index');
    }
}
