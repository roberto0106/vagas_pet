<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Empresa;
use App\Candidato;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255 '],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

       if ($data['type']==1) {
            $this->cadastroEmpresa($user);
            $this->redirectTo = '/steptwo_empresa';
            
        }else{
            $this->cadastroCandidato($user);
            $this->redirectTo = '/steptwo_candidato';
        }

        return $user;
        $this->redirectTo = '/vagas';

    }

    private function cadastroEmpresa($user){
        $empresa = Empresa::create([

        ]);

        $user->usertype()->associate($empresa);
        $user->save();
       
    }

        private function cadastroCandidato($user){
        $candidato = Candidato::create([

        ]);
        
        $user->usertype()->associate($candidato);
        $user->save(); 
    }
}
