<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; //importamos la clase HasFactory para poder utilizar los factories
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute; //importamos la clase Attribute para poder utilizar los mutadores y accesores
use Illuminate\Support\Str; // importamos la clase Str para generar slugs

class Post extends Model
{

    protected $fillable = [ //campos que se pueden asignar masivamente
        'title',
        'slug',
        'content',
        'category',
        'published_at',
        'user_id',
    ];

    use HasFactory; //activa el acceso a Model::factory().
    
    protected $table = 'posts'; //nombre en plural de la tabla definida en la migracion.

    protected function casts():array{ //funcion para definir los tipos de datos de los campos de la tabla
        return [
            'published_at' => 'datetime', //convertimos el campo published_at a tipo fecha y hora 
        ];
    }

    public static function generateSlug($title){
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
            
        return $slug;
    }

    protected function title(): Attribute{ // mutador y accesor para el campo title
        
        return Attribute::make( //mutador: se ejecuta cuando se guarda el valor en la base de datos
            set:function($value){ 
                return strtolower($value);//convertimos el valor a minusculas antes de guardarlo en la base de datos
            },
            get: function($value){ //accesor: se ejecuta cuando se obtiene el valor de la base de datos
                return ucwords($value); // Convertimos la primera letra de cada palabra a mayúscula al obtener el valor
            }   
        );
    }

    public function getRouteKeyName(){
        return 'slug'; //esto permite que al buscar un post por su slug, se utilice el campo slug en lugar del id
    }

    public function comments(){
        return $this->hasMany(Comment::class); //relacion uno a muchos con el modelo Comment, un post puede tener muchos comentarios
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
 