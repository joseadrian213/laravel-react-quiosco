<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function register(RegistroRequest $request){//Importamos RegistroRequest para poder utilizar las reglas de validacion que se establecen en ese mismo archivo 
        //validamos el registro con el rules que se encuentra en RegistroRequest
        $data=$request->validate(); 

        //Crear el usuario 
        $user=User::create([
            "name"=> $data["name"],
            "email"=> $data["email"],
            "password"=> bcrypt($data["password"])
        ]);
        //Retornar una respuesta
        return [
            "token"=>$user->createToken('token')->plainTextToken,
            "user"=>$user
        ];
    }

    
    public function login(Request $request){
        
    }
    public function logout(Request $request){

    }

}
