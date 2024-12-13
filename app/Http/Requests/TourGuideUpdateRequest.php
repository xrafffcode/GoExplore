<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourGuideUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'place_id' => 'required|exists:places,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'phone' => 'required|string',
            'total_guides' => 'required|string',
            'total_years' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'place_id' => 'Destinasi',
            'image' => 'Image',
            'name' => 'Nama',
            'slug' => 'Slug',
            'description' => 'Deskripsi',
            'price' => 'Harga',
            'phone' => 'Nomor Telepon',
            'total_guides' => 'Total Guides',
            'total_years' => 'Total Years',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi',
            'image.image' => ':attribute harus berupa gambar',
            'image.mimes' => ':attribute harus berupa jpeg, png, jpg, gif, svg',
            'image.max' => ':attribute maksimal 2MB',
            'exists' => ':attribute tidak valid',
            'string' => ':attribute harus berupa teks',
            'max' => ':attribute maksimal 255 karakter',
            'unique' => ':attribute sudah ada',
        ];
    }
}
