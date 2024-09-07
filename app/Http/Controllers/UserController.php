<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('site.cadastro-usuario', ['model' => new User]);
    }

    private function checkData(Request $request)
    {
        $id = $request->input('id', null);

        $regras = [
            'name'      => 'required|min:3|max:50',
            'email'     => 'required_without:telefone|unique:users,email',
            'telefone'  => 'required_without:email|unique:users,telefone',
            'cpf'       => 'required|unique:users,cpf',
            'senha'     => (!$id ? 'required|' : 'nullable|') . 'min:6',
        ];

        $feedback = [
            'name.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 50 caracteres',
            'email.unique' => 'O email informado já está cadastrado',
            'telefone.unique' => 'O telefone informado já está cadastrado',
            'email.email' => 'O email informado não é válido',
            'cpf.unique' => 'O CPF cadastrado já está cadastrado',
            'required' => 'O campo :attribute deve ser preenchido',
            'required_without' => 'O campo :attribute deve ser preenchido',

        ];

        return $request->validate($regras, $feedback);
    }

    public function store(Request $request) 
    {
        $user = new User;
        $erro = 'success';
        $mensagem = 'Usuário criado com sucesso.';
        $arrData = $this->checkData($request);

        if (isset($arrData['error'])) {
            return $arrData;
        }
        
        if($request->input('senha') != $request->input('outra-senha')){
            $erro = 'error';
            $mensagem = 'As senhas devem ser iguais';

            session()->flash($erro, $mensagem);
            
            return redirect()->to('/user');
        }

        $user->fill($arrData);
        $user->password = md5($request->input('senha'));
        $user->telefone = preg_replace('/[^0-9]/','', $arrData['telefone']);
        
        if(!$user->celular && !$user->email){
            $erro = 'error';
            $mensagem = 'Informe o e-mail ou o celular para continuar.';
        }elseif(!$user->save()){
            $erro = 'error';
            $mensagem = 'Aconteceu um erro ao salvar o usuário';
        }

        session()->flash($erro, $mensagem);

        if($erro == 'error'){
            return redirect()->to('/user');
        }

        return redirect()->to('/');
    }

    public function minhaArea(Request $request)
    {
        session_start();

        if(!isset($_SESSION['email']) && $_SESSION['email'] == ''){
            $erro = 'error';
            $mensagem = 'Usuário não encontrado!';

            session()->flash($erro, $mensagem);
            return redirect()->to('/');
        }

        $user = User::query()->where('email', $_SESSION['email'])->first();

        if(empty($user)){
            $erro = 'error';
            $mensagem = 'Usuário não encontrado!';

            session()->flash($erro, $mensagem);
            return redirect()->to('/');
        }

        return view('site.cadastro-usuario', ['model' => $user, '_method' => 'put']);
    }

    public function update(Request $request, User $user) 
    {
        $erro = 'success';
        $mensagem = 'Usuário atualizado com sucesso.';
        $arrData = $this->checkData($request);

        if (isset($arrData['error'])) {
            return $arrData;
        }
        
        $senhaAntiga = $user->password;

        if($request->input('senha') != $request->input('outra-senha')){
            $erro = 'error';
            $mensagem = 'As senhas devem ser iguais';

            session()->flash($erro, $mensagem);
            
            return redirect()->back();
        }

        $user->password = $request->input('senha');
        $user->fill($arrData);

        if(!empty($passowrd)){
            $user->password = md5($request->input('senha'));
        }else{
            $user->password = $senhaAntiga;
        }
        
        $user->telefone = preg_replace('/[^0-9]/','', $arrData['telefone']);
        
        if(!$user->celular && !$user->email){
            $erro = 'error';
            $mensagem = 'Informe o e-mail ou o celular para continuar.';
        }elseif(!$user->save()){
            $erro = 'error';
            $mensagem = 'Aconteceu um erro ao salvar o usuário';
        }

        session()->flash($erro, $mensagem);

        if($erro == 'error'){
            return redirect()->back();
        }

        return redirect()->to('/');
    }
}
