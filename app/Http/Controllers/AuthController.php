<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function register(RegistroRequest $request){//Importamos RegistroRequest para poder utilizar las reglas de validacion que se establecen en ese mismo archivo 
        //validamos el registro con el rules que se encuentra en RegistroRequest
        $data=$request->validated(); 
    
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

    
    public function login(loginRequest $request){
        $data=$request->validated(); 

//Siempre se debe de retornar un error al usuario en la parte del backend y en la parte del frontend se debe de colocar un try-catch para mostrar el error que enviamos 
        if (!Auth::attempt($data)) { //En caso de que el usuario no se haya autenticado correctamente generamos un error .
            return response([
                "errors"=> ["El email o el password son incorrectos"]
            ],422); 
        }
        //Autenticar al usuario y retornaremos un token 
        $user=Auth::user();
        return[
            "token"=>$user->createToken("token")->plainTextToken,
            "user"=>$user
        ]; 

    }
    public function logout(Request $request){
        $user=$request->user(); //Obtenemos a el usuario
        $user->currentAccessToken()->delete();//Eliminamos el token del usuario 
        return [
            'user'=> null,//Reiniciamos el usuario 
        ]; 
    }

}





