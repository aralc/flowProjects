<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;

use App\Empresa;
use App\Local;
use App\Fornecedor;
use App\Cliente;

class CadastrosEstoqueCliForController extends Controller
{
    //
    public function cliente()
    {
        if(view()->exists('cliente'))
        {
            $emp = Empresa::all();
            $loc = Local::all();
            $cli = Cliente::paginate(1);
            return view('cliente')->with('empV',$emp)->with('locV',$loc)->with('cliV',$cli);
        }
    }
    
    public function fornecedor()
    {
        if(view()->exists('fornecedor'))
        {
            $emp = Empresa::all();
            $loc = Local::all();
            $for = Fornecedor::orderBy('created_at','dsc')->paginate(1);
            return view('fornecedor')->with('empV',$emp)->with('locV',$loc)->with('forV',$for);
        }
    }
    
    public function clienteIncluir()
    {   

        $empresa = Request::input('clienteEmpresa');
        $local = Request::input('clienteLocal');
        $codigo = Request::input('clienteCodigo');
        $nome = Request::input('clienteNome');
        $cnpj = Request::input('clienteCnpj');
        $cep = Request::input('clienteCep');
        $endereco = Request::input('clienteEndereco');
        $bairro = Request::input('clienteBairro');
        $rua = Request::input('clienteRua');
        $uf = Request::input('clienteUf');
        $contato = Request::input('clienteContato');
        $telefone = Request::input('clienteTelefone');
        $email = Request::input('clienteEmail');
        $cidade = Request::input('clienteCidade');
        
        $findCodigo = Cliente::where('CodigoEmpresa', $empresa)
                            ->where('CodigoLocal', $local)
                            ->where('id', $codigo)
                            ->first();
                                           
         //return count($fidCidade);
        if (count($findCodigo) > 0)
            {
                
                $emp = Empresa::all();
                $loc = Local::all();
                $cli = Cliente::paginate(1);
                return view('cliente')->with('empV',$emp)->with('locV',$loc)->with('cliV',$cli)->with('find',$findCodigo);
                
            } 
            else 
                {
                $cliente = new Cliente();
                $cliente->CodigoEmpresa = $empresa;
                $cliente->CodigoLocal = $local;
                $cliente->id = $codigo;
                $cliente->Nome = $nome;
                $cliente->Cnpj = $cnpj;
                $cliente->Cep = $cep;
                $cliente->UF = $uf;
                $cliente->Endereco = $endereco;
                $cliente->Cidade = $cidade;
                $cliente->Bairro = $bairro;
                $cliente->Contato = $contato;
                $cliente->Email = $email;
                $cliente->Telefone = $telefone;
                $cliente->save();
                
                return redirect()->action('CadastrosEstoqueCliForController@cliente');
            
                }

        
    }
    
    public function fornecedorIncluir()
    {
        $empresa = Request::input('fornecedorEmpresa');
        $local = Request::input('fornecedorLocal');
        $codigo = Request::input('fornecedorCodigo');
        $nome = Request::input('fornecedorNome');
        $cnpj = Request::input('fornecedorCnpj');
        $endereco = Request::input('fornecedorEndereco');
        $bairro = Request::input('fornecedorBairro');
        $rua = Request::input('fornecedorRua');
        $uf = Request::input('fornecedorUf');
        $cep = Request::input('fornecedorCep');
        $cidade = Request::input('fornecedorCidade');
        $contato = Request::input('fornecedorContato');
        $telefone = Request::input('fornecedorTelefone');
        $email = Request::input('fornecedorEmail');
        
        $findFor = Fornecedor::where('CodigoEmpresa',$empresa)
                            ->where('CodigoLocal',$local)
                            ->where('id',$codigo)
                            ->first();
        
        
         if (count($findFor) > 0)
        {
            
            $emp = Empresa::all();
            $loc = Local::all();
            $for = Fornecedor::orderBy('created_at','dsc')->paginate(1);
            return view('fornecedor')->with('empV',$emp)->with('locV',$loc)->with('forV',$for)->with('find',$findFor);
            
        }
        else
        {
           
        
        $fornecedor = new fornecedor();
        $fornecedor->CodigoEmpresa = $empresa;
        $fornecedor->CodigoLocal = $local;
        $fornecedor->id = $codigo;
        $fornecedor->Nome = $nome;
        $fornecedor->Cnpj = $cnpj;
        $fornecedor->Cep = $cep;
        $fornecedor->Cidade = $cidade;
        $fornecedor->UF = $uf;
        $fornecedor->Endereco = $endereco;
        $fornecedor->Bairro = $bairro;
        $fornecedor->Rua = $rua;
        $fornecedor->Contato = $contato;
        $fornecedor->Email = $email;
        $fornecedor->Telefone = $telefone;
        $fornecedor->save();
        
        return redirect()->action('CadastrosEstoqueCliForController@fornecedor');
        }
    }
    
    public function clienteEditar($CodigoEmpresa,$CodigoLocal,$Id)
    {
        
        $cli = Cliente::where('CodigoEmpresa',$CodigoEmpresa)
                        ->where('CodigoLocal',$CodigoLocal)
                        ->where('id',$Id)
                        ->first();
        
        if(view()->exists('clienteEditar'))
        {
            
            return view('clienteEditar')->with('cliV',$cli);
        }
    }
    
    public function fornecedorEditar($CodigoEmpresa,$CodigoLocal,$Id)
    {
        $for = Fornecedor::where('CodigoEmpresa',$CodigoEmpresa)
                           ->where('CodigoLocal',$CodigoLocal)
                           ->where('id',$Id)
                            ->first();
        
        if(view()->exists('fornecedorEditar'))
        {
            return view('fornecedorEditar')->with('forV',$for);
        }
    }
    
    public function clienteUpdate()
    {
        $empresa = Request::input('clienteEmpresa');
        $local = Request::input('clienteLocal');
        $codigo = Request::input('clienteCodigo');
        $nome = Request::input('clienteNome');
        $cnpj = Request::input('clienteCnpj');
        $endereco = Request::input('clienteEndereco');
        $bairro = Request::input('clienteBairro');
        $rua = Request::input('clienteRua');
        $uf = Request::input('clienteUf');
        $contato = Request::input('clienteContato');
        $telefone = Request::input('clienteTelefone');
        $email = Request::input('clienteEmail');
        
        $cliente = Cliente::where('CodigoEmpresa',$empresa)
                           ->where('CodigoLocal',$local)
                           ->where('id',$codigo)
                           ->update(['Nome' => $nome,
                                     'Cnpj' => $cnpj,
                                     'UF' => $uf,
                                    'Endereco' => $endereco,
                                    'Bairro' => $bairro,
                                    'Rua' => $rua,
                                    'Contato' => $contato,
                                    'Email' => $email,
                                   'Telefone' => $telefone ]);
                           
        return redirect()->action('CadastrosEstoqueCliForController@cliente');                          
    }
    
    public function fornecedorUpdate()
    {
        
        $empresa = Request::input('fornecedorEmpresa');
        $local = Request::input('fornecedorLocal');
        $codigo = Request::input('fornecedorCodigo');
        $nome = Request::input('fornecedorNome');
        $cnpj = Request::input('fornecedorCnpj');
        $endereco = Request::input('fornecedorEndereco');
        $bairro = Request::input('fornecedorBairro');
        $rua = Request::input('fornecedorRua');
        $uf = Request::input('fornecedorUf');
        $contato = Request::input('fornecedorContato');
        $telefone = Request::input('fornecedorTelefone');
        $email = Request::input('fornecedorEmail');
        
        $fornecedor = Fornecedor::where('CodigoEmpresa',$empresa)
                                ->where('CodigoLocal',$local)
                                ->where('id',$codigo)
                                ->update(['Nome' => $nome,
                                          'Cnpj' => $cnpj,
                                           'UF' => $uf,
                                           'Endereco' => $endereco,
                                            'Bairro' => $bairro,
                                            'Rua' => $rua,
                                            'Contato' => $contato,
                                            'Email' => $email,
                                            'Telefone' => $telefone]);
                                
        return redirect()->action('CadastrosEstoqueCliForController@fornecedor');                                    
        
        
    }
    
    public function clienteDelete($CodigoEmpresa,$CodigoLocal,$Id)
    {
        $cliente = Cliente::where('CodigoEmpresa',$CodigoEmpresa)
                            ->where('CodigoLocal',$CodigoLocal)
                            ->where('id',$Id)
                            ->delete();
        return redirect()->action('CadastrosEstoqueCliForController@cliente');
                            
    }
    public function fornecedorDelete($CodigoEmpresa,$CodigoLocal,$Id)
    {
        $fornecdor = Fornecedor::where('CodigoEmpresa',$CodigoEmpresa)
                                ->where('CodigoLocal',$CodigoLocal)
                                ->where('Id',$Id)
                                ->delete();
        return redirect()->action('CadastrosEstoqueCliForController@fornecedor');        
                                
    }
    
}
