@extends('principal')
@section('content')
@section('title_position','Movimentos')
@section('position', 'Movimentos / Saida de Estoque')

<html>
<head>
<meta name="csrf_token" content="{!!csrf_token()!!}" />
</head>
<body>
<script>
function apagar(url)
{
if (window.confirm('Deseja realmente apagar ?'))
	{
		window.location = url;
	}

}

function finalizar(url)
{
if (window.confirm('Deseja realmente finalizar o documento ?'))
	{
		window.location = url;
	}

}


		

</script>

<script>



$.ajaxSetup({
		headers: 
			{
			'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
			}
		}); //ajax setup --fim

$(document).ready(function()
{	
	alert('working');

	/*
	$("#btn-fn").click(function()
			{
				alert('ok');
				var token = '<input type="hidden" value="{!!csrf_token()!!}" id="toMovi">' ;
				$('#Movisaida').html(token);
		 	 	alert(token);
			});
		*/
	
	$("#btn-gi").click(function()
	//$("#saidaEntrada").submit(function()
			{
			var empresa = $("#saidaEmpresa").val();
			var local = $("#saidaLocal").val();
			var documento = $("#saidaId").val();
			var tipodocumento = $("#tip").val();
        	var data = $("#dtd").val();
        	var dataEntrada = $("#dte").val();
        	var usuario = $("#usu").val();
			var fornecedor = $("#for").val();
			var valor = $("#val").val();
			var token = $("#tok").val();
			var tipodocumento = $("#tip").val();
			var saidaDescricao = $("#saidaDescricao").val();
			//alert(saidaDescricao);
			 
				$.ajax({
					type:"POST",
					url: '<?php echo url("/RequisicaoEstoque/Incluir");?>',
					data: { 'saidaEmpresa': empresa,
						 	'saidaLocal': local,
							'saidaId' : $('input[name=saidaId]').val(),
							'saidaDataDoc' : $('input[name=saidaDataDoc]').val(),
							'saidaDescricao' : saidaDescricao,
							'saidaUsuario' : $('input[name=saidaUsuario]').val(),
							'saidaCliente' : $('input[name=saidaCliente]').val(),
							'saidaTipo' : tipodocumento,
							'statusDocumento' : $('input[name=statusDocumento]').val(),
							'saidaPatrimonio' : $('input[name=saidaPatrimonio]').val(),
						'saidaContatoCliente' : $('input[name=saidaContatoCliente]').val()
							},
						success: function(data)
								{
								console.log(data);
								$('#teste').html('documento ' + documento + ' implantando');
								}
								}); //fim ajax 
			});// funciont click 	

			$('#btn-ie').click(function()
				{
				//alert('teste btnE');
				var empresa = $("#saidaEmpresa").val();
				var local = $("#saidaLocal").val();
					$.ajax({
							type:"POST",
							url: '<?php echo url("/RequisicaoEstoque/Item/Incluir");?>',
							data: { 'saidaEmpresa': empresa,
									'saidaLocal': local,
									'saidaId' : $('input[name=saidaId]').val(),
									'saidaDataDoc' : $('input[name=saidaDataDoc]').val(),
									'saidaItem' : $('input[name=saidaItem]').val(),
									'saidaQuantidade' : $('input[name=saidaQuantidade]').val()
							},
						success: function(data)
								{
								console.log(data);
								$('#teste').html('Item implantando');
								var empresa = $("#saidaEmpresa").val();
								var local = $("#saidaLocal").val();
									$.ajax({
										type:"POST",
										url: '<?php echo url("/RequisicaoEstoque/item/listar");?>',
										dataType: 'json',
										data: { 'saidaEmpresa':empresa,
											'saidaLocal': local,
											'saidaId' : $('input[name=saidaId]').val()
												}
												,success: function(data)
													{
													alert('Incluido');
													var dados = ' <table  class="table table-striped table-hover"><tr>';
														dados += '	<td>Documento</td><td>Sequencia</td><td>Item</td>';
							                    		dados += '<td>Quantidade</td><td>Ação</td></tr>';
													
													for (i=0;data.length >i;i++)
													{
														alert( data[i].idRequisicao);
														dados += '<tr><td>' +data[i].IdRequisicao +'</td>';
														dados += '<td>' +data[i].Sequencia + '</td>';
														dados += '<td>' +data[i].CodigoProduto + '</td>';
														dados += '<td>' +data[i].Quantidade + '</td>';
														dados += '<td> <button type="reset" class="btn btn-danger">EXCLUIR</button> </td></tr>';
														//$('#Doc').html(data[i].IdDocumento);
														//$('#Seq').html(data[i].Sequencia);
														//$('#Ite').html(data[i].CodigoProduto);
														//$('#Qtd').html(data[i].Quantidade);
														
													}	
													dados += '</table>';
														$('#dados').html(dados);
																																		
							                    				
													
												        				
													
													}
											});	
								
								}
								}); //fim ajax

					 
			
				});


}); // documento ready
</script>
	<div id="teste" class="alert" "alert-success"> 
	
	</div>
	


        
         <div class="col-md-12 portlets">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Requisição de Estoque</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <div class="padd">

                  <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                     <!--  <form class="form-horizontal" method="post" action="<?php echo action('MovimentosEstoqueSaidaController@saida');?>">-->
                     <form class="form-horizontal" method="post" action="<?php echo action('MovimentosController@saidaEstoque');?>">
                     <div id='Movisaida'>
                     
                     </div>
                    <input type="hidden" value="{!!csrf_token()!!}" id="tok">
                      <!-- Title -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Codigo Empresa</label>
                        <div class="col-lg-10">
                        <select class="form-control" name="saidaEmpresa" id="saidaEmpresa" required>
                        	<?php foreach($empV as $e )
                        	{
                        	    echo "<option value='". $e->Codigo . "'>" . $e->Nome ."</option>";
                        	}
                        	 ?>
                        </select>
                          
                        </div>
                      </div>
                              
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Codigo Local</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="saidaLocal" id="saidaLocal" required>
                        	<?php foreach($locV as $l )
                        	{
                        	    echo "<option value='" . $l->Codigo . "'>". $l->Nome ."</option>";
                        	}
                        	 ?>
                        </select>
                        </div>
                      </div>
                           
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Numero Doc Saída</label>
                        <div class="col-lg-10">
                          <input type="text" maxlenght=15 name="saidaId" class="form-control" id="saidaId" value="<?php echo old('saidaId');?>" placeholder="Informe o documento de saida, rat, requisicao">
                        </div>
                    </div>
        			<div class="form-group">
                        <label class="control-label col-lg-2"  for="title">Data Saida</label>
                        <div class="col-lg-10">
                           <input type="date" class="form-control" name="saidaDataDoc" id="saidaDataDoc" value="<?php echo old('saidaDataDoc');?>">
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="control-label col-lg-2">Tipo de Requisicao</label>
                        <div class="col-lg-10">
                          <select name="saidaTipo" class="form-control"  id="tip" >
                                                  <option value="R">Requisicao Estoque</option>
                                                  <option value="A">Relatório de Atedimento </option>                                                  
                                                  <option value="T">Transferencia</option>
                            </select>
                        </div>
                        </div>
                        
                       
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Descrição</label>
                        <div class="col-lg-10">
                           <textarea rows="5" cols="2" class="form-control" name="saidaDescricao" id ="saidaDescricao" required></textarea>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Usuário</label>
                        <div class="col-lg-10">
                          <input type="text" masxlenght=50 class="form-control" name="saidaUsuario" id="saidaUsuario" value="<?php echo old('saidaUsuario');?>">
                        </div>
                        </div>
        
                        
                        <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Cliente</label>
                        <div class="col-lg-10">
                          <input type="numeric" masxlenght=4 class="form-control" name="saidaCliente" id="saidaCliente" value="<?php echo old('saidaFornecedor');?>">
                        </div>
                        </div>
        
                        
                        <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Contato Cliente</label>
                        <div class="col-lg-10">
                          <input type="text" masxlenght=4 class="form-control" id="saidaContatoCliente" name="saidaContatoCliente" value="<?php old('saidaContatoCliente');?>">
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Satus Documento</label>
                        <div class="col-lg-10">
                         <input type="numeric" masxlenght=10 name="statusDocumento" class="form-control" id="statusDocumento" value="<?php echo old('statusDocumento');?>" disabled placeholder="A-Aprovado,P-Pendente,R-Rejeitado">
                        </div>
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Codigo Patrimonio</label>
                        <div class="col-lg-10">
                         <input type="numeric" masxlenght=10 name="saidaPatrimonio" class="form-control" id="saidaPatrimonio" value="<?php echo old('"saidaPatrimonio"');?>"  >
                        </div>
                        </div>

                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <!-- <a href="#" onclick="saveDoc('<?php echo action("MovimentosEstoqueSaidaController@saida");?>')"><button type="button" class="btn btn-primary">GRAVAR E INCLUIR ITENS</button></a> -->
                         <!--   <button type="button" class="btn btn-primary" id="btn-gi">GRAVAR E INCLUIR ITENS</button>-->
                          <!-- <button type="submit" class="btn btn-primary" >GRAVAR e INCLUIR - submit</button> -->
                          <button type="button" id="btn-gi" class="btn btn-primary">GRAVAR E INCLUIR ITENS</button>
                          <!--  <button type="reset" class="btn btn-danger">LIMPAR</button>-->
                          <!--  <button type="reset" class="btn btn-default">Reset</button>-->
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" id="btn-fn"> FINALIZA NOTA REQUISICAO</button>
                     </form> 
                  </div>


                </div>
                <div class="widget-foot">
                  <!-- Footer goes here -->
                </div>
              </div>
            </div>

          </div>

          <div class="col-md-5 portlets">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Incluir Itens</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <div class="padd">

                  <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" action="#" id="saidaItem">
                    <input type="hidden" value="{!!csrf_token()!!}" id="tok">
                       <!-- Title -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Item</label>
                        <div class="col-lg-10">
                          <input type="text" name="saidaItem" class="form-control" id="saidaItem">
                        </div>
                      </div>
                      <!-- Content -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="content">Quantidade</label>
                        <div class="col-lg-10">
                          <input type="text" name="saidaQuantidade" class="form-control" id="itQ">
                        </div>
                      </div>
                      <!-- Cateogry -->
                      
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="button" class="btn btn-primary" id="btn-ie">INCLUIR ITEM</button>
                          <button type="reset" class="btn btn-danger">LIMPAR</button>
                          
                        </div>
                      </div>
                    </form>
                  </div>


                </div>
                <div class="widget-foot">
                  <!-- Footer goes here -->
                </div>
              </div>
            </div>

          </div>

        
        
        <!-- marcos -->
        <div class="col-md-7 portlets">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Itens Incluidos</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <div class="padd">

                  <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                   
					<div id="dados">
						<td id="Doc"> </td>
						<td id="Seq"> </td>
						<td id="Ite"> </td>
						<td id="Qtd"> </td>
						<td id="Act"> <button type="reset" class="btn btn-danger">EXCLUIR</button> </td>
				

					</div>
										                    	
                    	
                    </table>
              
                  </div>


                </div>
                
              </div>
            </div>
 			
          </div>
          
          
          
        
       
       
        <!--  fim marcos -->
        <!-- project team & activity end -->
        
        <!--  itens incluidos na requisição  -->
        

</div>
      </body>
</html>
@stop

