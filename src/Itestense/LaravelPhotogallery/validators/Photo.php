<?php
namespace Itestense\LaravelPhotogallery\Validators;

class Photo extends ValidatorBase
{
  public static $rules = [
    'path' => 'image|required',
    'name' => 'required',
    'description' => 'max:255'
  ];
}
