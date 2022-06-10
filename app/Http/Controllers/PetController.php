<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Http\Requests\PetRequest;

class PetController extends Controller
{
    public function index(){

        return Pet::get();
    }

    public function store(PetRequest $request){

        $request->validate([
            
        ]);
        $dataRequest = $request->all();
        
        Pet::create($dataRequest);

        return $dataRequest;
    }
}
