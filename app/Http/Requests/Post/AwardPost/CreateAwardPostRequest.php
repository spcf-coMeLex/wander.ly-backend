<?php

namespace App\Http\Requests\Post\AwardPost;

use Illuminate\Foundation\Http\FormRequest;

class CreateAwardPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'principal_id'       => 'required|string|min:3|max:255',
            'community_post_id'  => 'required|string|min:3|max:255',
            'currentUserPoints'  => 'required|numeric'
        ];
    }
}
