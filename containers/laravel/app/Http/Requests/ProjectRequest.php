<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
  public function authorize(): bool
  {
      return $this->user()->isAdmin();
  }
  public function rules()
  {
    return [
      'title' => 'required|string|max:255',
      'description' => 'string|max:255',
    ];
  }
}
