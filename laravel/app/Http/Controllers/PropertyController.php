<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertyController extends Controller {
    
    public function index() {
        $properties = DB::select('SELECT * FROM properties');
        
        return view('property/index')->with('properties', $properties);
    }

    public function show($name) {
        $sql = 'SELECT * FROM properties WHERE name = ?';
        $property = DB::select($sql, array($name));

        if (empty($property)) {
            return redirect()->action('PropertyController@index');
        }

        $property = $property[0];
        $property->rental_price = number_format($property->rental_price / 100, 2, ',', '.');
        $property->sale_price = number_format($property->sale_price / 100, 2, ',', '.');

        return view('property/show')->with('property', $property);
    }

    public function create() {
        return view('property/create');
    }

    public function store(Request $request) {

        $propertyName = $this->setName($request->title);

        $property = array(
            $request->title,
            $propertyName,
            $request->description,
            $request->rental_price,
            $request->sale_price
        );

        DB::insert('INSERT INTO properties (title, name, description, rental_price, sale_price)
            VALUES (?, ?, ?, ?, ?)', $property);

        return redirect()->action('PropertyController@index');
    }

    public function edit($name) {
        $sql = 'SELECT * FROM properties WHERE name = ?';
        $property = DB::select($sql, array($name));

        if (empty($property)) {
            return redirect()->action('PropertyController@index');
        }

        return view('property/edit')->with('property', $property[0]);
    }

    public function update(Request $request, $id) {
        $propertyName = $this->setName($request->title);

        $property = array(
            $request->title,
            $propertyName,
            $request->description,
            $request->rental_price,
            $request->sale_price,
            $id
        );

        DB::update('UPDATE properties SET title = ?, name = ?, description = ?, rental_price = ?, sale_price = ? WHERE id = ?', $property);

        return redirect()->action('PropertyController@index');
    }

    public function destroy($name){
        $sql = 'SELECT * FROM properties WHERE name = ?';
        $property = DB::select($sql, array($name));

        if (!empty($property)) {
            $sql = 'DELETE FROM properties WHERE name = ?';
            DB::delete($sql, array($name));
        }

        return redirect()->action('PropertyController@index');
    }

    private function setName($title) {
        $propertySlug = Str::slug($title);

        $sql = 'SELECT COUNT(*) AS qtd FROM properties WHERE name = ?';
        $registerNumbers = DB::select($sql, array($propertySlug))[0];
        $registerNumbers = $registerNumbers->qtd;

        if ($registerNumbers > 0) {
            $propertySlug .= "-{$registerNumbers}";
        }

        return $propertySlug;
    }
}
