<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\DocumentoEntrada;
use App\ItemDocumentoEntrada;
use Response;

class MovimentosEstoqueEntradaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    //
    public function entrada()
    {
        if(view()->exists('entrada'))
        {
            return view('entrada');
        }
    }
    
    public function entradaIncluir()
        {
            $empresa = Request::input('estoqueEmpresa');
            $local = Request::input('estoqueLocal');
            $documento = Request::input('estoqueId');
            $tipodocumento = Request::input('estoqueTipo');
            $data = Request::input('estoqueDataDoc');
            $dataEntrada = Request::input('estoqueDataEnt');
            $usuario = Request::input('estoqueUsuario');
            $fornecedor = Request::input('estoqueFornecedor');
            $valor = Request::input('estoqueValor');
            $itemDoc=0;
            
            $Documento = new DocumentoEntrada();
            try {
                $Documento->Id = $documento;
                $Documento->CodigoEmpresa = $empresa;
                $Documento->CodigoLocal = $local;
                $Documento->TipoDocumento = $tipodocumento;
                $Documento->DataDocumento = $data;
                $Documento->DataEntrada = $dataEntrada;
                $Documento->UsuarioDocumento = $usuario;
                $Documento->IdFornecedor = $fornecedor;
                $Documento->Valor = $valor;
                $Documento->Status = 'A';
                $Documento->save();
                return redirect()->action('MovimentosEstoqueEntradaController@entrada')->withInput();
                //return response()->json(array('sms'=>'save sucess'));
            }
            catch (Exception $e) {
                return response()->json(array('err'=>'save error'));
            }
        }
        
        public function entradaItemIncluir(Request $request)
        {
            $empresa = Request::input('estoqueEmpresa');
            $local = Request::input('estoqueLocal');
            $documento = Request::input('estoqueId');
            $item = Request::input('estoqueItem');
            $quantidade = Request::input('estoqueQuantidade');
            $dataDocument = Request::input('estoqueDataEnt');
            $sequencia = 0;
            
            
            $ItemDocumentoEntrada = new ItemDocumentoEntrada();
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
            
        }
        
        public function entradaEstoqueItemDocumento()
        {
            $empresa = Request::input('estoqueEmpresa');
            $local = Request::input('estoqueLocal');
            $documento = Request::input('estoqueId');
            
            $ItemDoc = ItemDocumentoEntrada::where('CodigoEmpresa',$empresa)
            ->where('CodigoLocal',$local)
            ->where('IdDocumento',$documento)
            ->get();
            return Response::json($ItemDoc);
            //return view('MovEntradaEstoque')->with('IteDoc',$ItemDoc)->render();
        }
        
        
}
