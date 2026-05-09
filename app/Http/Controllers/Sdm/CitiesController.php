<?php

namespace App\Http\Controllers\Sdm;

use App\Http\Controllers\Controller;
use App\repositories\interfaces\CitiesRepositoryInterface;
use App\validations\CityValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CitiesController extends Controller
{
    protected CitiesRepositoryInterface $citiesRepository;

    public function __construct
    (
        CitiesRepositoryInterface $citiesRepository
    )
    {
        $this->citiesRepository = $citiesRepository;
    }

    public function cities() {
        $cities = $this->citiesRepository->getAll();

        return view('sdm.cities.cities', compact('cities'));
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), CityValidation::rules(), CityValidation::rules());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            $this->citiesRepository->create($request->all());

            return redirect()->back()->with('success', 'Data kota berhasil ditambahkan.');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan data kota.')->withInput();
        }
    }

    public function update(Request $request, int $id) {
        $validator = Validator::make($request->all(), CityValidation::rules(), CityValidation::rules());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            
            $this->citiesRepository->update($request->all(), $id);

            return redirect()->back()->with('success', 'Data kota berhasil diperbarui.');
        
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan data kota.')->withInput();
        }
    }

    public function delete(int $id) {
        $this->citiesRepository->delete($id);

        return redirect()->back()->with('success', 'Data kota berhasil dihapus.');
    }
}