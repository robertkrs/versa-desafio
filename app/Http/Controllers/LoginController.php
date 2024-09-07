<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth-login');
    }

    public function index()
    {
        return view('site.login');
    }

    private function checkData(Request $request) {
        $rules = [
            'usuario' => 'required|email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.required' => 'O campo usuário é obrigatório!',
            'usuario.email' => 'O campo usuário precisa ser um email!',
            'senha.required' => 'O campo senha é obrigatório!'
        ];

        return $request->validate($rules, $feedback);
    }

    public function login(Request $request)
    {        
        $user = new User();
        $erro = 'success';
        $mensagem = 'Login efetuado com sucesso!';

        $arrData = $this->checkData($request);

        if (isset($arrData['error'])) {
            return $arrData;
        }

        $user = User::query()
            ->where('users.email', $arrData['usuario'])
            ->where('users.password', md5($arrData['senha']))
            ->first();

        if(empty($user)){
            $erro = 'error';
            $mensagem = 'Usuário não encontrado! Verifique os campos de email e senha!';

            session()->flash($erro, $mensagem);

            return redirect()->to('/')
            ->withInput(['usuario' => $arrData['usuario']]);
        }

        session_start();
        $_SESSION['nome'] = $user->name;
        $_SESSION['email'] = $user->email;

        session()->flash($erro, $mensagem);
        return redirect()->to('/painel/home');
    }

    public function logout(Request $request)
    {
        if(session_start() == 2){
            session_destroy();
        }

        return redirect()->route('site.login-index');
    }

}
