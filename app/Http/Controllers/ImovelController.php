<?php

namespace App\Http\Controllers;

use App\Imovel;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class ImovelController extends Controller
{

   protected $model;
   public function __construct(Imovel $imovel)
   {
       // seta o modelo
       $this->model = new Repository($imovel);
   }

   public function index()
   {
       return view('imovel.listar', ['listaImoveis' => $this->model->all()]);
   }

   public function all()
   {
       return $this->model->all();
   }

   public function create()
   {
       return view('imovel.editar');
   }

   public function store(Request $request)
   {

       // $this->model->create($request->only($this->model->getModel()->fillable));
       // create record and pass in only fields that are fillable
       $this->model->create($request->only($this->model->getModel()->fillable));
       //return $this->index();
   }
   public function show($id)
   {
       return $this->model->show($id);
   }
   public function update(Request $request, $id)
   {
       // atualiza o modelo e somente passa os campos iguais
       $this->model->update($request->only($this->model->getModel()->fillable), $id);
       return $this->model->find($id);
   }
   public function destroy($id)
   {
       return $this->model->delete($id);
   }
}