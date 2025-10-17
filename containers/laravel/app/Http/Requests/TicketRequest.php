<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|max:255',
            'priority' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'reporter_id' => 'required|exists:users,id',
        ];
    }
}