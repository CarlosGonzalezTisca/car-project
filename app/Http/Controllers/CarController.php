<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Helpers\ResponseWith;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
           $data = Car::paginate(5);
           return ResponseWith::success($data);
        } catch (\Throwable $th) {
            return ResponseWith::error($th);       
         }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            $request -> validate([
            'car_name'=>'required|max:255|string',
            'model'=> 'required|max:255|string',
            'year' =>'required|max:255|string',
            'description'=> 'required|max:255|string',
            ]);
            $data = Car::create([
                'car_name' => $request -> car_name,
                'model'=> $request -> model,
                'year'=> $request -> year,
                'description'=> $request -> description,
            ]);

        return ResponseWith::success($data);
        } catch (\Throwable $th) {
            return ResponseWith::error($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
