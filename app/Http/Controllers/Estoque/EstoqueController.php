<?php

namespace App\Http\Controllers\Estoque;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;


use App\Http\Requests\RefriStoreRequest;
use App\Http\Requests\RefriUpdateRequest;


use App\Refri;

class EstoqueController extends Controller
{
    public function store(RefriStoreRequest $request){
        try {
            if(Refri::where('marca', $request->marca)->where('litragem', $request->litragem)->first()){
                throw new \Exception('Ops! Marca e Litragem já existem!');
            }else{
                $refri = Refri::create($request->all());
                return Response::json([
                    'sucesso'=> true,
                    'mensagem'=> 'Refrigerante criado com sucesso!',
                    'dados'=> $refri
                ], 200);
            }
        } catch (\Exception $e) {
            return Response::json([
                'sucesso'=> false,
                'mensagem'=> 'Ops! Não foi possivel realizar esta ação!',
                'dados'=> $e->getMessage()
            ], 400);
        }
    }

    public function showRefri($idRefri){
        try {
            return Response::json([
                'sucesso'=> true,
                'mensagem'=> 'Sucesso!',
                'dados'=> Refri::where('id_refri', $idRefri)->first()
            ], 200);
        } catch (\Exception $e) {
            return Response::json([
                'sucesso'=> false,
                'mensagem'=> 'Ops! Não foi possivel realizar esta ação!',
                'dados'=> $e->getMessage()
            ], 400);
        }
    }

    public function update(RefriUpdateRequest $request, $idRefri)
    {
        try {
            $refri = Refri::where('id_refri',$idRefri)->first();

            if(!$refri) {
                throw new \Exception('Ops! refrigerante inexistente!');
            }

            $refri->fill($request->all())->save();

            return Response::json([
                'sucesso'=> true,
                'mensagem'=> 'Refri atualizado com sucesso!',
                'dados'=> $refri
            ], 200);
        } catch (\Exception $e) {
            return Response::json([
                'sucesso'=> false,
                'mensagem'=> 'Ops! Não foi possivel realizar esta ação!',
                'dados'=> $e->getMessage()
            ], 400);
        }
    }

    public function showAllWithPagination(){
        $search = $_GET['search'];
        return Refri::where('marca', 'like', "%$search%")
        ->orwhere('litragem', 'like', "%$search%")
        ->orwhere('quantidade', 'like', "%$search%")
        ->orwhere('valor_unidade', 'like', "%$search%")
        ->paginate(10);
    }

    public function excluirRefri($idRefri){
        try {
            $refri = Refri::where('id_refri',$idRefri)->first();

            if(!$refri) {
                throw new \Exception('Ops! refrigerante inexistente!');
            }

            $refri->delete();

            return Response::json([
                'sucesso'=> true,
                'mensagem'=> 'Refri excluido!',
                'dados'=> $refri
            ], 200);
        } catch (\Exception $e) {
            return Response::json([
                'sucesso'=> false,
                'mensagem'=> 'Ops! Não foi possivel realizar esta ação!',
                'dados'=> $e->getMessage()
            ], 400);
        }
    }
}
