<?php
namespace Itestense\LaravelPhotogallery\Validators;

class Gallery extends ValidatorBase
{
  public static $rules = [
    'name' => 'required'
  ];
}
