<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    protected $dontFlash = ['password', 'password_confirmation', '_token'];
}
