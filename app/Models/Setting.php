<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Setting extends Model
{
  use HasFactory ,Translatable;

  protected $with=['translations'];
  protected $translatedAttributes=['value'];

  protected $fillable=['key','is_translatable','plain_value'];

  protected $casts=['is_translatable'=>'boolean'];

  static function setMany($settings){
    foreach($settings as $key => $value){
      self::set($key,$value);
    }
  }

  static function set($key,$value){
    if($key === 'translatable'){
      return static::setTranslatetableSettings($value);
    }
    if(is_array($value)){
      $value=json_encode($value);
    }
    static::updateOrCreate(
      ['key'=>$key],['plain_value'=>$value]
    );
  }

  static function setTranslatetableSettings($settings=[]){
    foreach($settings as $key => $value){
      static::updateOrCreate(
        ['key'=>$key],['is_translatable'=>true,'value'=>$value]
      );
    }
  }
}
