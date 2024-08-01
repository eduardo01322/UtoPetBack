<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimaisFormRequest;
use App\Models\Animais;
use Illuminate\Http\Request;

class AnimaisController extends Controller
{
    // Cadastro de animais
    public function cadastroAnimais(AnimaisFormRequest $request){
        $animais = Animais::create([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'sexo' => $request->sexo,
            'raca' => $request->raca,
            'descricao' => $request->descricao,
            'vacina' => $request->vacina,
            'castração' => $request->castração
        ]);
        return response()->json([
            "success" => true,
            "message" => "Cadastrado com sucesso",
            "data" => $animais
        ], 200);
    }

    // Retornar todos
    public function retornarTodos(){
        $animais = Animais::all();
        return response()->json([
            'status' => true,
            'data' => $animais
        ]);
    }

     //Pesquisar por id
     public function pesquisarPorId($id){
        $animais = animais::find($id);
        if($animais == null){
            return response()->json([
                'status'=> false,
                'message' => "Animal não encontrada"
            ]);     
        }
        return response()->json([
            'status'=> true,
            'data'=> $animais
        ]);
    }


    //Pesquisar por Nome
    public function pesquisarPorNome(Request $request)
    {
        $animais = Animais::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($animais) > 0) {

            return response()->json([
                'status' => true,
                'data' => $animais
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhum animal"
        ]);
    }

    //Pesquisar por raca
    public function pesquisarPorRaca(Request $request){
        $animais = Animais::where('raca', 'like', '%' . $request->raca . '%')->get();
        if (count($animais) > 0) {
            return response()->json([
                'status' => true,
                'data' => $animais
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhuma animal"
        ]);
    }

    //Excluir
    public function excluir($id){
        $animais = animais::find($id);
        if(!isset($animais)){
            return response()->json([
                "status" => false,
                "message" => "Não foi encontrado nenhum animal"
            ]);
        }
        $animais->delete();
    
        return response()->json([
            'status' => false,
            'message' => 'Animal excluido com sucesso'
        ]);
    }

    public function update(animaisFormRequest $request){
        $animais = animais::find($request->id);
    
        if(!isset($animais)){
            return response()->json([
                "status" => false,
                "message" => "Não foi encontrado nenhum animal"
            ]);
        }
    
        if(isset($request->nome)){
            $animais->nome = $request->nome;
        }

        if(isset($request->idade)){
            $animais->idade = $request->idade;
        }
        
        if(isset($request->sexo)){
            $animais->sexo = $request->sexo;
        }
        
        if(isset($request->raca)){
            $animais->raca = $request->raca;
        }
        
        if(isset($request->descricao)){
            $animais->descricao = $request->descricao;
        }
        
        if(isset($request->vacina)){
            $animais->vacina = $request->vacina;
        }
        
        if(isset($request->castração)){
            $animais->castração = $request->castração;
        }

        $animais->update();
    
        return response()->json([
            "status" => false,
            "message" => "animal atualizado"
        ]);
    }
}
