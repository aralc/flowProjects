<?php


namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Empresa;
use App\Local;
use App\User;
//use App\Usuario;

class CadastrosGeraisUsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
        public function usuario()
        {
            if(view()->exists('usuario'))
            {
                $emp = Empresa::all();
                $usu = User::all();
                
                return view('usuario')->with('usuV',$usu)->with('empV',$emp);
            }
            else 
            {
                return "dev null";
            }
        }
        
        public function usuarioIncluir()
        {
            $empresa = Request::input('empresaUsuario');
            $nome = Request::input('nomeUsuario');
            $login = Request::input('loginUsuario');
            $senha = Request::input('senhaUsuario');
            $grupo = Request::input('grupoUsuario');
            $email = Request::input('emailUsuario');
            $telefone = Request::input('telefoneUsuario');
            
            $usuario = new Usuario();
            
            $usuario->CodigoEmpresa = $empresa;
            $usuario->Login = $login;
            $usuario->Senha = $senha;
            $usuario->Nome = $nome;
            $usuario->Email = $email;
            $usuario->Telefone = $telefone;
            $usuario->Grupo = $grupo;
            $usuario->save();
            
            return redirect()->action('CadastrosGeraisUsuarioController@usuario')->withInput();
            

        }
        
        
        
        //
}
