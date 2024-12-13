<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'place_category_id' => 'required|exists:place_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'phone' => 'required|string',
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
            'name' => 'Nama',
            'description' => 'Deskripsi',
            'price' => 'Harga',
            'phone' => 'Nomor Telepon',
            'address' => 'Alamat',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
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
            'numeric' => ':attribute harus berupa angka',
            'string' => ':attribute harus berupa teks',
            'max' => ':attribute maksimal 255 karakter',
            'unique' => ':attribute sudah ada',
        ];
    }
}
