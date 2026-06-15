<?php

declare(strict_types=1);

namespace App\Http\Requests\Webinar;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWebinarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->can(
            'manage webinars'
        );
    }

    public function rules(): array
    {
        return [

            'title' => [
                'required',
                'string',
                'max:255'
            ],

            'description' => [
                'nullable',
                'string'
            ],

            'webinar_date' => [
                'required',
                'date'
            ],

            'completion_date' => [
                'required',
                'date'
            ],

            'access_duration_days' => [
                'required',
                'integer',
                'min:1'
            ],
        ];
    }
}
