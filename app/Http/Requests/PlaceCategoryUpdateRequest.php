<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceCategoryUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'is_featured' => 'boolean',
        ];
    }

    public function attributes(): array
    {
        return [
            'image' => 'Gambar',
            'name' => 'Name',
            'is_featured' => 'Is Featured',
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Gambar wajib diisi',
            'image.image' => 'Gambar harus berupa gambar',
            'image.mimes' => 'Gambar harus berupa jpeg, png, jpg, gif, svg',
            'image.max' => 'Gambar maksimal 2MB',
            'name.required' => 'Name wajib diisi',
            'name.string' => 'Name harus berupa string',
            'name.max' => 'Name maksimal 255 karakter',
            'is_featured.boolean' => 'Is Featured harus berupa boolean',
        ];
    }
}
