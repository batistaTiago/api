<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingresso;

class IngressosController extends Controller {

    
    private function validateData($preco, $zona, $cadeira, $tipo_ingresso_id, $evento_id) {
        if (strlen($preco) == 0 || strlen($zona) == 0 || strlen($cadeira) == 0 || strlen($tipo_ingresso_id) == 0 || strlen($evento_id) == 0) {
            return false;
        }
        return true;
    }
    
    public function index() {
        $result = Ingresso::getAll();
        if (count($result) > 0) {
            return ResponseController::success($result);
        } else {
            return ResponseController::notFound();
        }
    }
    
    public function show($id) {
        $result =  Ingresso::getById($id);
        if (count($result) > 0) {
            return ResponseController::success($result);
        } else {
            return ResponseController::notFound();
        }
    }
    
    public function store(Request $req) {
        
        $preco = $req->input('preco');
        $zona = $req->input('zona');
        $cadeira = $req->input('cadeira');
        $tipo_ingresso_id = $req->input('tipo_ingresso_id');
        $evento_id = $req->input('evento_id');
        
        if (!$this->validateData($preco, $zona, $cadeira, $tipo_ingresso_id, $evento_id)) {
            return ResponseController::badRequest();
        } else {
            try {
                $result = Ingresso::create($preco, $zona, $cadeira, $tipo_ingresso_id, $evento_id);
                return ResponseController::success($result);
            } catch (\Throwable $exc) {
                return ResponseController::badRequest();
            }
        }
    }
    
    public function update(Request $req, $id) {
        
        $preco = $req->input('preco');
        $zona = $req->input('zona');
        $cadeira = $req->input('cadeira');
        $tipo_ingresso_id = $req->input('tipo_ingresso_id');
        $evento_id = $req->input('evento_id');
        
        if (!$this->validateData($preco, $zona, $cadeira, $tipo_ingresso_id, $evento_id)) {
            return ResponseController::badRequest();
        } else {
            try {
                $result = Ingresso::updateEntry($id, $preco, $zona, $cadeira, $tipo_ingresso_id, $evento_id);
                return ResponseController::created($result);
            } catch (\Throwable $exc) {
                return ResponseController::badRequest();
            }
        }
    }
    
    public function destroy($id) {
        
        try {
            $result = Ingresso::deleteEntry($id);
            return ResponseController::success($result);
        } catch (\Throwable $exc) {
            return ResponseController::notFound();
        }
        
    }






    
    public function getByCityName($cidade) {
        $result = Ingresso::getWithFilter('cidade', $cidade);
        if (count($result) > 0) {
            return ResponseController::success($result);
        } else {
            return ResponseController::notFound();
        }
    }
    
    
    public function getByCategory($categoria) {
        $result = Ingresso::getWithFilter('categoria', $categoria);
        if (count($result) > 0) {
            return ResponseController::success($result);
        } else {
            return ResponseController::notFound();
        }
    }
    
}
