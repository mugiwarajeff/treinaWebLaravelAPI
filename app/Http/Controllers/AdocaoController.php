<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adocao;
use App\Http\Resources\AdocaoCollection;
use App\Rules\AdocaoUnicaPet;

class AdocaoController extends Controller
{
    public function store(Request $request){
        $request->validate([
            "e-mail" => ["required", "email", new AdocaoUnicaPet($request->input("pet_id", 0))],
            "valor" => ["required", "numeric", "between:10, 100"],
            "pet_id" => ["required", "int", "exists:pets,id"]
        ]);

        $dadosDaAdocao = $request->all();

        Adocao::create($dadosDaAdocao);
        
        return $dadosDaAdocao;
    }

    public function index(){

        $adocoes = Adocao::with("pet")->get();

        return new AdocaoCollection($adocoes);
    }
}
