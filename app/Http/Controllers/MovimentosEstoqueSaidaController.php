<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Empresa;
use App\Local;
use Response;
use App\Requisicao;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\ItemRequisicao;
use App\ItemDocumentoEntrada;


class MovimentosEstoqueSaidaController extends Controller
{
    //
    
    public function saida()
    {
        if(view()->exists('saida'))
        {
        $emp = Empresa::all();
        $loc = Local::all();
        return view('saida')->with('empV',$emp)->with('locV',$loc);
        }
        else 
        {
            return "dev null";
        }
    }



    public function saidaIncluir()
    {
        $empresa = Request::input('saidaEmpresa');
        $local = Request::input('saidaLocal');
        $documento = Request::input('saidaId');
        $dataDocumento = Request::input('saidaDataDoc');
        $tipo = Request::input('saidaTipo');
        $descriacao = Request::input('saidaDescricao');
        $usuario = Request::input('saidaUsuario');
        $cliente = Request::input('saidaCliente');
        $contato = Request::input('saidaContatoCliente');
        $satus = 'A';
        $patrimonio = Request::input('saidaPatrimonio');
        
        $saida = new Requisicao();
        $saida->CodigoEmpresa = $empresa;
        $saida->CodigoLocal = $local;
        $saida->TipoRequisicao = $tipo;
        $saida->DescricaoRequisicao = $descriacao;
        $saida->DataRequisicao = $dataDocumento;
        $saida->UsuarioRequisitante = $usuario;
        $saida->IdCliente = $cliente;
        $saida->Documento = $documento;
        $saida->CodigoPatrimonio = $patrimonio;
        $saida->ContatoCliente = $contato;
        $saida->Status = $satus;
        $saida->save();
        
        return Redirect()->action('MovimentosEstoqueSaidaController@saida');
    }
    
    public function saidaItemIncluir(Request $request)
    {
            $empresa = Request::input('saidaEmpresa');
            $local = Request::input('saidaLocal');
            $documento = Request::input('saidaId');
            $item = Request::input('saidaItem');
            $quantidade = Request::input('saidaQuantidade');
            $dataDocument = Request::input('saidaDataDoc');
            $produto = Request::input('saidaItem');
            $sequencia = 0;
            
            
            $itemSaidaRequisicao = new ItemRequisicao();
            try {
                $count = ItemRequisicao::where('CodigoEmpresa', $empresa)
                                        ->where('CodigoLocal', $local)
                                        ->where('IdRequisicao', $documento)
                                        ->count();
                
                $sequencia = $count + 1;
                        
                $itemSaidaRequisicao->CodigoEmpresa = $empresa;
                $itemSaidaRequisicao->CodigoLocal = $local;
                $itemSaidaRequisicao->IdRequisicao = $documento;
                $itemSaidaRequisicao->Sequencia = $sequencia;
                $itemSaidaRequisicao->CodigoProduto = $produto;
                $itemSaidaRequisicao->DataRequisicao = $dataDocument;
                $itemSaidaRequisicao->Quantidade = $quantidade;
                $itemSaidaRequisicao->Status = 'A'; //aprovado //rejeitado //pendende
                $itemSaidaRequisicao->save();
               
                //return view('saida')->with('iteSai',$itemSaidaRequisicao);
                
                
                
                
            } catch (Exception $e) 
                {
                    return 'erro'. $e;
                }
            /*
            $ItemDocumentoEntrada = new ItemDocumentoEntrada('');
            try {
                
                
                $iteDoc = ItemDocumentoEntrada::where('CodigoEmpresa',$empresa)
                ->where('CodigoLocal',$local)
                ->where('IdDocumento',$documento)
                ->get();
                
                $cont=count($iteDoc);
                $sequencia = $cont + 1;
                
                $ItemDocumentoEntrada->CodigoEmpresa = $empresa;
                $ItemDocumentoEntrada->CodigoLocal = $local;
                $ItemDocumentoEntrada->IdDocumento = $documento;
                $ItemDocumentoEntrada->Sequencia = $sequencia;
                $ItemDocumentoEntrada->CodigoProduto = $item;
                $ItemDocumentoEntrada->DataDocumento = $dataDocument;
                //     $itemDocumentoEntrada->DataDocumento
                //   CodigoProduto varchar(10) not null,
                // DataDocumento datetime not null,
                $ItemDocumentoEntrada->Quantidade = $quantidade;
                // Quantidade int not null,
                // Valor double(10,2),
                // updated_at datetime,
                //created_at datetime,
                $ItemDocumentoEntrada->save();
                
                $ItemDoc = ItemDocumentoEntrada::where('CodigoEmpresa',$empresa)
                ->where('CodigoLocal',$local)
                ->where('IdDocumento',$documento)
                ->get();
                
                // return json_encode($ItemDoc);
                return view('entrada')->with('IteDoc',$ItemDoc);
                
            }
            catch ( Exception $e)
            {
                return $e;
            }
            
        */
        
        
    }
    
    public function saidaEstoqueItemSaida()
    {
        $empresa = Request::input('saidaEmpresa');
        $local = Request::input('saidaLocal');
        $documento = Request::input('saidaId');
        
               
        $ItemDoc = ItemRequisicao::where('CodigoEmpresa',$empresa)
        ->where('CodigoLocal',$local)
        ->where('IdRequisicao',$documento)
        ->get();
        
        if(count($ItemDoc) > 0 )
        {
        return Response::json($ItemDoc);
        } else 
        {
            return Response::json('error');
        }
        //return view('MovEntradaEstoque')->with('IteDoc',$ItemDoc)->render();
    }
    
    
    public function saidaItemDelete()
    {
        
    }
}