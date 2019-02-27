<?php


namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Local;
use App\Empresa;

class CadastrosGeraisLocalController extends Controller
{
       //
    public function __construct()
    {
        $this->middleware('auth');
    }
       
    public function local()
    {
        
        $emp = Empresa::all();
        if (!empty($emp))
        {
            if (view()->exists('local'))
            {
                
                $loc = Local::all();
                return view('local')->with('locV',$loc)->with('empV',$emp);
            }
        } 
        else 
        {
            return redirect()->action('CadastrosGeraisController@empresa');
        }
        
    }
    
    public function localIncluir()
    {
        $codigo = Request::input('CodigoLocal');
        $codigoEmpresa = Request::input('CodigoEmpresa');
        $nome = Request::input('NomeLocal');
        $cnpj = Request::input('CnpjLocal');
        $telefone = Request::input('TelefoneLocal');
        $email = Request::input('EmailLocal');
        
        $local = new Local();
        
        
        
        $local->CodigoEmpresa = $codigoEmpresa;
        $local->Codigo = $codigo;
        $local->Nome = $nome;
        $local->Cnpj = $cnpj;
        $local->Email = $email;
        $local->Telefone = $telefone;
        $local->save();
        
        //'$Local = new Local();
        //$Local->CodigoEmpresa = $codigoEmpresa;
          //'$Local->Codigo = $codigo; 
          //$Local->Cnpj = $cnpj;
          //$Local->Telefone = $telefone;
          //$Local->Email = $email;
          //$Local->Nome = $nome;
          //$Local->save();
          
          //return "teste";
          
        return redirect()->action('CadastrosGeraisLocalController@local')->withInput();
}

public function localEditar($CodigoEmpresa,$Codigo)
{
    if(view()->exists('localEditar'))
    {
        $local = Local::where('CodigoEmpresa',$CodigoEmpresa)
        ->where('Codigo', $Codigo)
        ->first();
        $loc = $local;
        if (!empty($local))
        {
            
            //return $local->Email;
         //return 'teste' ;// . $local->CodigoEmpresa;
         return view('localEditar')->with('locV',$local);   
        }
    }
}


public function localUpdate($CodigoEmpresa,$Codigo)
    {
        //$codigo = Request::input('CodigoLocal');
        //$codigoEmpresa = Request::input('CodigoEmpresa');
        $nome = Request::input('NomeLocal');
        $cnpj = Request::input('CnpjLocal');
        $telefone = Request::input('TelefoneLocal');
        $email = Request::input('EmailLocal');
        
       
        $local = Local::where('CodigoEmpresa',$CodigoEmpresa)
                        ->where('Codigo',$Codigo)
                        ->update(['Nome' => $nome, 
                                  'Cnpj' => $cnpj,
                                  'Telefone' => $telefone,
                                  'Email' => $email
                        ]);
                            
                                 
       
        //$local = Local::find($CodigoEmpresa,$Codigo);
        //return var_dump($local);
        /*          
        $local->Nome = $nome;
        $local->Cnpj = $cnpj;
        $local->Telefone = $telefone;
        $local->Email = $email;
        $local->save();
        */
        
        return redirect()->action('CadastrosGeraisLocalController@local')->withInput();
        
                        
    }




    
    public function localDelete($CodigoEmpresa,$Codigo)
    {
        
        $loc = Local::where('CodigoEmpresa',$CodigoEmpresa)
        ->where('Codigo', $Codigo)
        ->get();
        
        if (empty($loc))
        {
            return "dev null";
        }
        else
        {
            $loc = Local::where('CodigoEmpresa',$CodigoEmpresa)
            ->where('Codigo', $Codigo)
            ->delete();
            return redirect()->action('CadastrosGeraisLocalController@local');
        }
        
        
        
    }
    
    
    
    
    




}
