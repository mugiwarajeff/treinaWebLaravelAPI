<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adocao;

class AdocaoController extends Controller
{
    public function index(Request $request){

        $request->validate([
            "e-mail" => ["required", "email"],
            "valor" => ["required", "numeric", "between:10, 100"],
            "pet_id" => ["required", "int", "exists:pets,id"]
        ]);

        $dadosDaAdocao = $request->all();

        Adocao::create($dadosDaAdocao);
        
        return $dadosDaAdocao;
    }
}
