<?php

namespace App\validations;

class BusinessTripValidation {
    public static function rules(): array 
    {
        return [

            // Maksud / tujuan perdin
            'purpose' => 'required|string|max:1000',

            // Kota
            'origin_city_id' => 'required|exists:cities,id',
            'destination_city_id' => 'required|exists:cities,id|different:origin_city_id',

            // Tanggal
            'departure_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:departure_date',

        ];
    }

    public static function messages(): array
    {
        return [

            // Purpose
            'purpose.required' => 'Maksud tujuan perdin wajib diisi.',
            'purpose.string' => 'Maksud tujuan perdin harus berupa teks.',
            'purpose.max' => 'Maksud tujuan perdin maksimal 1000 karakter.',

            // Kota asal
            'origin_city_id.required' => 'Kota asal wajib dipilih.',
            'origin_city_id.exists' => 'Kota asal tidak valid.',

            // Kota tujuan
            'destination_city_id.required' => 'Kota tujuan wajib dipilih.',
            'destination_city_id.exists' => 'Kota tujuan tidak valid.',
            'destination_city_id.different' => 'Kota tujuan tidak boleh sama dengan kota asal.',

            // Tanggal berangkat
            'departure_date.required' => 'Tanggal berangkat wajib diisi.',
            'departure_date.date' => 'Tanggal berangkat tidak valid.',

            // Tanggal pulang
            'return_date.required' => 'Tanggal pulang wajib diisi.',
            'return_date.date' => 'Tanggal pulang tidak valid.',
            'return_date.after_or_equal' => 'Tanggal pulang harus setelah atau sama dengan tanggal berangkat.',

        ];
    }
}