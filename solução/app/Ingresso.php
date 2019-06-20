<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingresso extends Model {
    
    /* relações */
    public function tipoIngresso() {
        return $this->belongsTo('App\TipoIngresso');
    }
    
    public function evento() {
        return $this->belongsTo('App\Evento');
    }
    
    
    /* CRUD */
    
    public static function getAll() {
        return Evento::with('ingressos')->get();
    }
    
    public static function getById($id) {
        return Ingresso::where('id', $id)->get();
    }


    /* TODO: refatorar para interface? */
    
    public static function create($preco, $zona, $cadeira, $tipo_ingresso_id, $evento_id) {
        
        $ingresso = new Ingresso();
        $ingresso->preco = $preco;
        $ingresso->zona = $zona;
        $ingresso->cadeira = $cadeira;
        $ingresso->tipo_ingresso_id = $tipo_ingresso_id;
        $ingresso->evento_id = $evento_id;
        
        $ingresso->save();
        
        return $ingresso;

    }
    

    public static function updateEntry($id, $preco, $zona, $cadeira, $tipo_ingresso_id, $evento_id) {
        $ingresso = Ingresso::find($id);
        
        if ($ingresso) {
            
            $ingresso->preco = $preco;
            $ingresso->zona = $zona;
            $ingresso->cadeira = $cadeira;
            $ingresso->tipo_ingresso_id = $tipo_ingresso_id;
            $ingresso->evento_id = $evento_id;
            
            $ingresso->save();
            return $ingresso;
            
        } else {
            
            return null;
            
        }
    }
    
    
    public static function deleteEntry($id) {
        $ingresso = Ingresso::find($id);
        $ingresso->destroy($id);
        return $ingresso;
    }
    
    
    
    
    
    public static function getWithFilter($filterKey, $filterValue) {
        $eventosFiltrados = Evento::with('ingressos')->where($filterKey, $filterValue)->get();        
        return $eventosFiltrados;
    }
}
