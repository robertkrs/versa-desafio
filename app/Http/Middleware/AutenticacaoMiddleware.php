<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        session_start();
        
        if(isset($_SESSION['email']) && $_SESSION['email'] != '') {
            return $next($request);
        } else {
            $erro = 'error';
            $mensagem = 'É necessário fazer login para ter acesso a plataforma!';

            session()->flash($erro, $mensagem);
            
            return redirect()->to('/');
        }
    }
}
