<?php

namespace App\validations;

class CityValidation {
    public static function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'island' => 'required|string|max:255',
            'is_foreign' => 'required|boolean',
        ];
    }

    public static function messages(): array
    {
        return [
            'name.required' => 'Nama kota wajib diisi.',
            'name.string' => 'Nama kota harus berupa teks.',
            'name.max' => 'Nama kota maksimal 255 karakter.',

            'province.required' => 'Provinsi wajib diisi.',
            'province.string' => 'Provinsi harus berupa teks.',
            'province.max' => 'Provinsi maksimal 255 karakter.',

            'latitude.required' => 'Latitude wajib diisi.',
            'latitude.numeric' => 'Latitude harus berupa angka.',

            'longitude.required' => 'Longitude wajib diisi.',
            'longitude.numeric' => 'Longitude harus berupa angka.',

            'island.required' => 'Pulau wajib dipilih.',
            'island.string' => 'Pulau tidak valid.',
            'island.max' => 'Nama pulau maksimal 255 karakter.',

            'is_foreign.required' => 'Status luar negeri wajib dipilih.',
            'is_foreign.boolean' => 'Status luar negeri tidak valid.',
        ];
    }
}