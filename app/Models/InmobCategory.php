<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class InmobCategory extends Model
{
    use HasFactory;
    
     /**
     * Retornar el slug como llave
     *
     * @return string
     */
     
     
     public function getRouteKeyName()
    {
        return 'slug';
    }
     
      /**
     * Relacion uno a muchos
     *
     * @return class
     */
     public function inmueble()
     {
       
       return $this->hasMany('App\Models\Inmueble');
     
     }
     
      
}
