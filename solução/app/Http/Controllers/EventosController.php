<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Http\Middleware\AuthHandler;

class EventosController extends Controller
{
    
    private function validateData($categoria, $cidade, $data) {
        if ((strlen($categoria) == 0) || (strlen($cidade) == 0) || (strlen($data) == 0)) {
            return false;
        }
        
        return true;
    }
    
    public function index() {
        $result = Evento::getAll();
        if (count($result) > 0) {
            return ResponseController::success($result);
        } else {
            return ResponseController::notFound();
        }
    }
    
    public function show($id) {
        $result = Evento::getById($id);
        if (count($result) > 0) {
            return ResponseController::success($result);
        } else {
            return ResponseController::notFound();
        }
    }
    
    public function store(Request $req) {
        $categoria = $req->input('categoria');
        $cidade = $req->input('cidade');
        $data = $req->input('data');
        
        if (!$this->validateData($categoria, $cidade, $data)) {
            return ResponseController::badRequest();
        } else {
            try {
                $result = Evento::create($categoria, $cidade, $data);
                return ResponseController::created($result);
            } catch (\Throwable $ecx) {
                return ResponseController::badRequest();
            }
        }
    }
    
    public function update(Request $req, $id) {
        
        $categoria = $req->input('categoria');
        $cidade = $req->input('cidade');
        $data = $req->input('data');
        
        if (!$this->validateData($categoria, $cidade, $data)) {
            return ResponseController::badRequest();
        } else {
            try {
                $result = Evento::updateEntry($id, $categoria, $cidade, $data);
                return ResponseController::success($result);
            } catch (\Throwable $exc) {
                return ResponseController::badRequest();
            }
        }       
    }
    
    
    public function destroy($id) {
        try {
            $result = Evento::deleteEntry($id);
            return ResponseController::success($result);
        } catch (\Throwable $exc) {
            return ResponseController::notFound();
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function getByCategory(Request $req, $categoria) {
        $eventos = Evento::where('categoria', $categoria)->get();
        if (isset($eventos) && (count($eventos) > 0)) {
            return ResponseController::success($eventos);
        }
        return ResponseController::notFound();
    }
    
    public function getByCityName(Request $req, $cidade) {
        $eventos = Evento::where('cidade', $cidade)->get();
        if (isset($eventos) && (count($eventos) > 0)) {
            return ResponseController::success($eventos);
        }
        return ResponseController::notFound();
    }
    
    public function getByDate(Request $req, $data) {
        $eventos = Evento::where('data', 'like', "$data%")->get();
        if (isset($eventos) && (count($eventos) > 0)) {
            return ResponseController::success($eventos);
        }
        return ResponseController::notFound();
    }
}
