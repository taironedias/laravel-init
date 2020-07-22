<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Property;

class PropertyController extends Controller {
    
    public function index() {
        $properties = Property::all();

        return view('property.index')->with('properties', $properties);
    }

    public function show($name) {
        $property = Property::where('name', $name)->get();

        if (empty($property)) {
            return redirect()->action('PropertyController@index');
        }

        $property = $property[0];
        $property->rental_price = number_format($property->rental_price / 100, 2, ',', '.');
        $property->sale_price = number_format($property->sale_price / 100, 2, ',', '.');

        return view('property.show')->with('property', $property);
    }

    public function create() {
        return view('property.create');
    }

    public function store(Request $request) {

        $propertyName = $this->setName($request->title);

        $property = array(
            'title' => $request->title,
            'name' => $propertyName,
            'description' => $request->description,
            'rental_price' => $request->rental_price,
            'sale_price' => $request->sale_price
        );

        Property::create($property);

        return redirect()->action('PropertyController@index');
    }

    public function edit($name) {
        $property = Property::where('name', $name)->get();

        if (empty($property)) {
            return redirect()->action('PropertyController@index');
        }

        return view('property.edit')->with('property', $property[0]);
    }

    public function update(Request $request, $id) {
        $propertyName = $this->setName($request->title);

        $property = Property::find($id);

        $property->title = $request->title;
        $property->name = $propertyName;
        $property->description = $request->description;
        $property->rental_price = $request->rental_price;
        $property->sale_price = $request->sale_price;

        $property->save();

        return redirect()->action('PropertyController@index');
    }

    public function destroy($name){
        $property = Property::where('name', $name)->get();

        if (!empty($property)) {
            $sql = 'DELETE FROM properties WHERE name = ?';
            DB::delete($sql, array($name));
        }

        return redirect()->action('PropertyController@index');
    }

    private function setName($title) {
        $propertySlug = Str::slug($title);

        $registerNumbers = Property::select('*')->where('name', $propertySlug)->count();

        if ($registerNumbers > 0) {
            $propertySlug .= "-{$registerNumbers}";
        }

        return $propertySlug;
    }
}
