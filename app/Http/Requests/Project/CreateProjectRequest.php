<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'deadline_date' => 'required|date',
            'ts' => 'required|mimes:pdf|max:51200', // 50mb=51200kb
            'avatar' => 'required|file|mimes:jpeg,jpg,png|max:10240', // 10mb=10240kb
        ];
    }
}
