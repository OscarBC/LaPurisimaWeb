<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
  protected $fillable = [
    'nombre',
    'email',
    'password',
    'calle',
    'colonia',
    'referencia',
    'codigo_postal',
    'imagen_usuario',
    'tipo_usuario_id',
    'remember_token',
    'api_token'
  ];
  protected $hidden = [
      'password',
      'remember_token'
  ];

  public function save(array $options = array())
{
    if(empty($this->api_token)) {
        $this->api_token = str_random(60);
    }
    return parent::save($options);
}

  public function setPasswordAttribute($value) {
    $this->attributes['password'] = bcrypt($value);
  }

}
