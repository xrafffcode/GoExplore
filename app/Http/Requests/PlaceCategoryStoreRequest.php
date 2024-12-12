<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceCategoryStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'is_featured' => 'boolean',
        ];
    }

    public function attributes(): array
    {
        return [
            'icon' => 'Gambar',
            'name' => 'Name',
            'is_featured' => 'Is Featured',
        ];
    }

    public function messages(): array
    {
        return [
            'icon.required' => 'Gambar wajib diisi',
            'icon.image' => 'Gambar harus berupa gambar',
            'icon.mimes' => 'Gambar harus berupa jpeg, png, jpg, gif, svg',
            'icon.max' => 'Gambar maksimal 2MB',
            'name.required' => 'Name wajib diisi',
            'name.string' => 'Name harus berupa string',
            'name.max' => 'Name maksimal 255 karakter',
            'is_featured.boolean' => 'Is Featured harus berupa boolean',
        ];
    }
}
