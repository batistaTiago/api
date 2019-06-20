<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClientesController extends Controller
{
    private function validateData($nome, $cpf) {
        if (strlen($nome) == 0 || strlen($cpf) == 0) {
            return false;
        }
        return true;
    }

    public function index() {
        $result = Cliente::getAll();
        if (count($result) > 0) {
            return ResponseController::success($result);
        } else {
            return ResponseController::notFound();
        }
    }
    
    public function show($id) {
        $result = Cliente::getById($id);
        if (count($result) > 0) {
            return ResponseController::success($result);
        } else {
            return ResponseController::notFound();
        }
    }
    
    public function store(Request $req) {
        
        $nome = $req->input('nome');
        $cpf = str_replace('.', '', str_replace('-', '', $req->input('cpf')));
        
        if (!$this->validateData($nome, $cpf)) {
            return ResponseController::badRequest();
        } else {
            try {
                $result = Cliente::create($nome, $cpf);
                return ResponseController::created($result);
            } catch (\Throwable $exc) {
                return ResponseController::badRequest();
            }
        }
    }
    
    public function update(Request $req, $id) {

        $nome = $req->input('nome');
        $cpf = str_replace('.', '', str_replace('-', '', $req->input('cpf')));
        
        if (!$this->validateData($nome, $cpf)) {
            return ResponseController::badRequest();
        } else {
            try {
                $result = Cliente::updateEntry($id, $nome, $cpf);
                return ResponseController::success($result);
            } catch (\Throwable $exc) {
                return ResponseController::badRequest();
            }
        }       
    }
    
    
    public function destroy($id) {

        try {
            $result = Cliente::deleteEntry($id);
            return ResponseController::success($result);
        } catch (\Throwable $exc) {
            return ResponseController::notFound();
        }
    }
}