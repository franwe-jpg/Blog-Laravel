<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; //importamos la clase HasFactory para poder utilizar los factories
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute; //importamos la clase Attribute para poder utilizar los mutadores y accesores

class Post extends Model
{
    use HasFactory; //activa el acceso a Model::factory().
    protected $table = 'posts'; //nombre en plural de la tabla definida en la migracion.

    protected function casts():array{ //funcion para definir los tipos de datos de los campos de la tabla
        return [
            'published_at' => 'datetime', //convertimos el campo published_at a tipo fecha y hora 
        ];
    }

    protected function title(): Attribute{ // mutador y accesor para el campo title
        
        return Attribute::make( //mutador: se ejecuta cuando se guarda el valor en la base de datos
            set:function($value){ 
                return strtolower($value);//convertimos el valor a minusculas antes de guardarlo en la base de datos
            },
            get: function($value){ //accesor: se ejecuta cuando se obtiene el valor de la base de datos
                return ucfirst($value); //convertimos la primera letra a mayuscula antes de mostrarlo
            }   
        );
    }
}
 