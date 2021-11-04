<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Inmueble extends Model
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
     * Relacion uno a muchos inversa
     *
     * @return array
     */
     
     public function users()
     {
         
         return belongsTo('App\Models\User');
              
     }
     
     /**
     * Relacion uno a muchos inversa
     *
     * @return array
     */
     
     public function inmobCategory()
     {
         
         return belongsTo('App\Models\InmobCategory');
              
     }
     
      /**
     * Relacion uno a muchos polimorfica
     *
     * @return array
     */
     
     public function images()
     {
      
      return $this->morphMany('App\Models\Image', 'imageable');
     
     }
     
}
