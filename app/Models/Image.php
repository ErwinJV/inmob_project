<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    
      protected $guarded = ['id', 'create_at', 'updated_at'];
    
    /**
     * Relacion polimorfica
     *
     * @return array
     */
    public function imageable()
    {
    
      return $this->morphTo();
      
    }
    
    /**
     * Relacion uno a muchos inversa
     *
     * @return class
     */
     
     public function user()
     {
       
       return belongsTo('App\Models\User');
     
     }
    
}
