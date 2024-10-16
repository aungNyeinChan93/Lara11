<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            "user_id"=>"nullable",
            "title"=>"required",
            "body"=>"required",
            "image"=> "nullable|file|mimes:png,jpg",
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ];
    }
}
