<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public static function getAll() {
        return Cliente::all();
    }

    public static function getById($id) {
        return Cliente::where('id', $id)->get();
    }

    public static function create($nome, $cpf) {
        $cliente = new Cliente();
        $cliente->nome = $nome;
        $cliente->cpf = $cpf;

        $cliente->save();

        return $cliente;
    }

    public static function updateEntry($id, $nome, $cpf) {
        $cliente = Cliente::find($id);
        
        if ($cliente) {
            
            $cliente->nome = $nome;
            $cliente->cpf = $cpf;
            
            $cliente->save();
            return $cliente;
            
        } else {
            
            return null;
            
        }
    }
    
    
    public static function deleteEntry($id) {
        $cliente = Cliente::find($id);
        $cliente->destroy($id);
        return $cliente;
    }
}
