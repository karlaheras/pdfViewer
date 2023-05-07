<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable/*, SoftDeletes*/;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "rol_id",
        "sucursal_id",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function formColumns(){
        return [
            [
                "field"=>"name",
                "required"=>true,
                "type"=>"text",
                "label"=>"Nombre completo",
            ],
            [
                "field"=>"email",
                "required"=>true,
                "type"=>"text",
                "label"=>"Usuario",
            ],
            [
                "field"=>"password",
                "required"=>true,
                "type"=>"password",
                "label"=>"Contraseña",
            ],
            [
                "field"=>"rol_id",
                "required"=>true,
                "type"=>"select",
                "label"=>"Nivel de acceso",
                "options"=>static::roles(),
                "select_value"=>"id",
                "select_name"=>"nombre",
            ],
        ];
    }

    public function updateFormColumns(){
        $form = static::formColumns();
        foreach($form as $key => $input){
            $field = $input["field"];
            if($field != "password")
                $form[$key]["value"] = $this->$field;
        }
        return $form;
    }

    public static function validateArray(){
        return [
            "name"=>"required",
            "password"=>[
                'required',
                'string',
                'min:10',             // must be at least 10 characters in length
                'regex:/[0-9]/',      // must contain at least one digit
            ],
            "email"=>"required|unique:users",
            "rol_id"=>"required",
            "sucursal_id"=>"nullable" //required_if
        ];
    }

    public static function updateValidateArray($id){
        return [
            "name"=>"required",
            "password"=>[
                'nullable',
                'min:10',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                'confirmed'
            ],
            "email"=>"required|unique:users,email,".$id,
            "rol_id"=>"required",
            "sucursal_id"=>"nullable" //required_if
        ];
    }

    private static function roles(){
        $obj = new class {
            public function __construct()
            {
                $this->nombre = "admin";
                $this->id = 1;
            }
        };
        $obj2 = new class {
            public function __construct()
            {
                $this->nombre = "empleado";
                $this->id = 2;
            }
        };
        
        return [$obj, $obj2];
    }

    public function nombreRol(){
        $roles = static::roles();
        foreach($roles as $rol){
            if($rol->id == $this->rol){
                return $rol->nombre;
            }
        }
        return "Sin rol";
    }

    public function canDelete(){
        return true;
    }

   
}
