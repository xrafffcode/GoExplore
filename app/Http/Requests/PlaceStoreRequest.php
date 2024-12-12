<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'place_category_id' => 'required|exists:place_categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'address' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'place_category_id' => 'Kategori Destinasi',
            'image' => 'Image',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'address' => 'Address',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }

    public function messages(): array
    {
        return [
            'place_category_id.required' => 'Kategori Destinasi wajib diisi',
            'image.required' => 'Image wajib diisi',
            'image.image' => 'Image harus berupa gambar',
            'image.mimes' => 'Image harus berupa jpeg, png, jpg, gif, svg',
            'image.max' => 'Image maksimal 2MB',
            'name.required' => 'Name wajib diisi',
            'name.string' => 'Name harus berupa string',
            'name.max' => 'Name maksimal 255 karakter',
            'description.required' => 'Description wajib diisi',
            'description.string' => 'Description harus berupa string',
            'price.required' => 'Price wajib diisi',
            'price.numeric' => 'Price harus berupa angka',
            'address.required' => 'Address wajib diisi',
            'address.string' => 'Address harus berupa string',
            'latitude.required' => 'Latitude wajib diisi',
            'latitude.string' => 'Latitude harus berupa string',
            'longitude.required' => 'Longitude wajib diisi',
            'longitude.string' => 'Longitude harus berupa string',
        ];
    }
}
