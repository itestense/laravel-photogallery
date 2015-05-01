<?php
namespace Itestense\LaravelPhotogallery\Validators;

class Photo extends ValidatorBase
{
  public static $rules = [
    'images' => 'min:1',
    'name' => 'max:255',
    'description' => 'max:255'
  ];
}
