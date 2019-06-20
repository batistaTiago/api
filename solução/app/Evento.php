<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{

    /* relações */
    public function ingressos() {
        return $this->hasMany('App\Ingresso');
    }

    /* CRUD */

    public static function getAll() {
        return Evento::all();
    }

    public static function getById($id) {
        return Evento::where('id', $id)->get();
    }

    public static function create($categoria, $cidade, $data) {
        $evento = new Evento();
        $evento->categoria = $categoria;
        $evento->cidade = $cidade;
        $evento->data = $data;

        $evento->save();

        return $evento;
    }

    public static function updateEntry($id, $categoria, $cidade, $data) {
        $evento = Evento::find($id);
        
        if ($evento) {
            
            $evento->categoria = $categoria;
            $evento->cidade = $cidade;
            $evento->data = $data;
    
            $evento->save();
    
            return $evento;
            
        } else {
            
            return null;
            
        }
    }
    
    
    public static function deleteEntry($id) {
        $evento = Evento::find($id);
        $evento->destroy($id);
        return $evento;
    }
}
