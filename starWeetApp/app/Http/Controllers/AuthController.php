<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\EmailVerification;
use App\Models\Post;
use App\Mail\emailAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function verifyauth(){
         if(Auth::user()){
            return redirect('/home');
        }
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
        
        return view('partials.authcode-modal', ['email' => $email, 'name' => $name]);
    }
    public function ConfirmCode(Request $request){
        $email = $request->input('email');
        $name = $request->input('name') ;
        $codeVerify = $request->input('verification_code');
        $codVerify = EmailVerification::where('email', $email)->where('verification_code', $codeVerify)->first();

        if ($codVerify) {
            return response()->json([
                'view' => view('partials.password-modal', ['email' => $email, 'name' => $name])->render(),
                'viewType' => 'passwordview'
            ]);
        } else {
            session()->flash('messageErrorCode', 'Código de verificação inválido');
            
            return response()->json([
                'view' => view('partials.authcode-modal', ['email' => $email, 'name' => $name])->render(),
                'viewType' => 'authcodeview'
            ]);
        }

    }
    public function CreateUser(Request $request){
        $email = $request->input('email');
        $name = $request->input('name') . strtoupper(Str::random(10));
        $password = $request->input('password');

        if(!User::where('email', $email)->first()){
            User::create([
                'username' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);
        }else{
            session()->flash('messageErrorRegister', 'Email já existe');
            return view('partials.register-modal');
        }
        

        if (Auth::attempt(['email' => $email, 'password' => $password]))
	    {
            $user = Auth::user();;
            return ;
        }
    }
    public function homePage(){
        $posts = Post::orderBydesc('id')->get();
        return view('home', ['userAuth' => Auth::user(), 'posts' => $posts, 'users' => User::where('username', '!=', Auth::user()->username)->limit(3)->get()]);
    }
    public function logout(Request $request){
        Auth::logout(); 

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function login(Request $request){
        //return view('partials.authcode-modal');
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password]))
	    {
            return ;
        }
        session()->flash('messageErrorLogin', 'Email ou senha errados');
        return view('partials.login-modal');
    }
    
    public function imageTreat($requestImage, $path){
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/'. $path), $imageName);
            return $imageName;
    }
    public function updateProfile(Request $request){
        if($request->hasFile('avatar_image') && $request->file('avatar_image')->isValid()){
            $imageName = $this->imageTreat($request->avatar_image, 'avatar_images');
            Auth::user()->profile->update([
                'avatar_image' => $imageName
            ]);
        }
        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()){
            $imageName = $this->imageTreat($request->cover_image, 'cover_images');
            Auth::user()->profile->update([
                'cover_image' => $imageName
            ]);
        }
        
        Auth::user()->profile->update([
            'name' => $request->name,
            'bio' => $request->bio, 
            'location' => $request->location,
            'website' => $request->website,
        ]);
        return redirect('/edit_profile');
    }
    
}

