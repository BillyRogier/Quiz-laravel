<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'answers' => 'array|size:4',
            'answers.*.id' => 'nullable|exists:answers,id',
            'answers.*.answer_text' => 'nullable|string|max:255',
            'answers.*.is_correct' => 'nullable|boolean',
        ];
    }
}
