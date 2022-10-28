<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => 'required|unique:shipments,code',
            'shiper' => ['required', 'min:3'],
            'description' => ['required', 'min:10'],
            'weight' => ['required', 'numeric', 'min:0.1'],
            'img_path' => ['max:10240'],
        ];
    }
}
