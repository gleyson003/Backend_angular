<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Motorista;
use Illuminate\Http\Request;
Use Log;

class MotoristasController extends Controller
{
    public function getAll() {
      $data = Motorista::get();
      return response()->json($data, 200);
    }

    public function create(Request $request){
      $data['nome'] = $request['nome'];
      $data['cpf'] = $request['cpf'];
      $data['cnh'] = $request['cnh'];
      Motorista::create($data);
      return response()->json([
          'message' => "Criado com sucesso!",
          'success' => true
      ], 200);
    }

    public function delete($id){
      $res = Motorista::find($id)->delete();
      return response()->json([
          'message' => "Deletado com sucesso!",
          'success' => true
      ], 200);
    }

    public function get($id){
      $data = Motorista::find($id);
      return response()->json($data, 200);
    }

    public function update(Request $request,$id){
      $data['nome'] = $request['nome'];
      $data['cpf'] = $request['cpf'];
      $data['cnh'] = $request['cnh'];
      Motorista::find($id)->update($data);
      return response()->json([
          'message' => "Atualizado com sucesso!",
          'success' => true
      ], 200);
    }
}
