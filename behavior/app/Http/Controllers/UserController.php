<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {

    public function index() {
        return '<h1>Listagem do usuário 1</h1>';
    }

    public function getData(Request $request) {
        echo '<h1>Disparou a action de GET</h1>';
        var_dump($request);
    }

    public function postData(Request $request) {
        echo '<h1>Disparou a action de POST</h1>';
        var_dump($request);
    }

    public function putData(Request $request) {
        echo '<h1>Disparou a action de PUT</h1>';
        var_dump($request);
    }

    public function patchData(Request $request) {
        echo '<h1>Disparou a action de PATCH</h1>';
        var_dump($request);
    }

    public function matchData(Request $request) {
        if ($request->isMethod('PUT')) {
            echo '<h1>Disparou a action de PUT (USING MATCH)</h1>';
        } else {
            echo '<h1>Disparou a action de PATCH (USING MATCH)</h1>';
        }
        var_dump($request);
    }

    public function destroy() {
        return '<h1>Disparou a action de DELETE</h1>';
    }

    public function any() {
        return '<h1>Qualquer verbalização é aceita</h1>';
    }
}
