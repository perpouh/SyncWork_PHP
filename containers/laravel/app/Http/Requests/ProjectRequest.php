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
      'members.*.id' => 'nullable',
      'members.*.user_id' => 'required|exists:users,id',
      'members.*.role' => 'required|string|max:255',
      'members.*.status' => 'required|string|max:255',
      'members.*.assigned_at' => 'required|date',
    ];
  }
}
