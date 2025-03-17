<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\EmailVerification;
use App\Mail\emailAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function verifyauth(){
       /**  if(Auth::user()){//verifica se há um usuarioreturn redirect('/dashboard');//redireciona para a rota dashboard}*/
        return view('welcome');//se não entrar no if, significa que o usuario não está autenticado, então retorna a view welcome padrão
        
    }
    public function SendCodMail(){
        $dados = [
            'titulo' => 'Olá, bem-vindo ao Laravel!',
            'mensagem' => 'Este é um e-mail de teste enviado pelo Laravel.'
        ];

        Mail::to('destinatario@exemplo.com')->send(new MeuEmail($dados));

        return "E-mail enviado com sucesso!";
    }
    public function CreateCod(Request $request){
        $email = $request->input('email');
        $name = $request->input('name');
        $dateBirthday = $request->input('dateBirthday');
        $emailVerificationCode = strtoupper(Str::random(6));
        EmailVerification::create([
            'email' => $email,
            'verification_code' => $emailVerificationCode,
            'expires_at' => now()->addMinutes(10) // Expira em 10 minutos
        ]);
        $dados = [
            'name' => $name,
            'cod' => $emailVerificationCode
        ];
        Mail::to($email)->send(new emailAuth($dados));
        
        return view('partials.authcode-modal', ['email' => $email, 'name' => $name, 'dateBirthday' => $dateBirthday]);
    }

    public function ConfirmCode(Request $request){
        $email = $request->input('email');
        $name = $request->input('name') ;
        $dateBirthday = $request->input('dateBirthday');
        $codeVerify = $request->input('verification_code');
        $codVerify = EmailVerification::where('email', $email)->where('verification_code', $codeVerify)->first();

        if ($codVerify) {
            return view('partials.password-modal', ['email' => $email, 'name' => $name, 'dateBirthday' => $dateBirthday]);
        } else {
            return view('partials.register-modal');
        }

    }
    public function otherFun(Request $request){
        return view('partials.register-modal');
    }
    public function CreateUser(Request $request){
        //return view('partials.register-modal');
        $email = $request->input('email');
        $name = $request->input('name') ;//+ strtoupper(Str::random(10));
        $dateBirthday = $request->input('dateBirthday');
        $password = $request->input('password');
        User::create([
            'username' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        if (Auth::attempt(['email' => $email, 'password' => $password]))
	    {
            $user = Auth::user();
            //return '<h1>Deu certo</h1>';
            return 'deu certo';
            //return redirect('/home')->with(['message' => 'Usuario fez login com sucesso', 'user' => $user]);
        }
    }
    public function homePage(){
        $user = Auth::user();
        return view('home', ['user' => $user]);
    }
    
}

