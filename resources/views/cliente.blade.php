@extends('principal')
@section('content')
@section('title_position','Cadastros de Estoque')
@section('position', 'Cadastros de Estoque / Cliente')

<script type="text/javascript">
	function apagar(url)
	{
	if (window.confirm('Deseja realmente apagar ?'))
		{
			window.location = url;
		}
	
	}
</script>

<script>
$(document).ready(function()
{	
	//alert('working');
	function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#clienteEndereco").val("");
        $("#clienteBairro").val("");
        $("#clienteCidade").val("");
        $("#clienteUf").val("");
        
    }
    
    //Quando o campo cep perde o foco.
    $("#clienteCep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#clienteEndereco").val("...");
                $("#clienteBairro").val("...");
                $("#clienteCidade").val("...");
                $("#clienteUf").val("...");
                //$("#ibge").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#clienteEndereco").val(dados.logradouro);
                        $("#clienteBairro").val(dados.bairro);
                        $("#clienteCidade").val(dados.localidade);
                        $("#clienteUf").val(dados.uf);
                        //$("#ibge").val(dados.ibge);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});

</script>		





     <div class="col-md-12 portlets">
<!--   <div class="content border"> -->
    <div class="panel panel-default">
        <div class="panel-heading">
          	<div class="pull-left">Cadastro de Cliente</div>
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
                    <form class="form-horizontal" method="post" action="<?php echo action('CadastrosEstoqueCliForController@clienteIncluir');?>">
                    <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                    	<!-- Código -->
                    		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Empresa</label>
                        		<div class="col-lg-10">
                          		<select class="form-control" name="clienteEmpresa">
                        		 	<?php foreach ($empV as $val)       {         
                                    echo "<option value='" . $val->Codigo.  "'>" . $val->Codigo .'-'.$val->Nome. "</option>"; 
                                    } ?>
                        		</select>
                        		</div>
                      		</div>
                      		
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Local</label>
                        		<div class="col-lg-10">
                          		<select class="form-control" name="clienteLocal">
                        		 	<?php foreach ($locV as $val)       {         
                                    echo "<option value='" . $val->Codigo.  "'>" . $val->Codigo .'-'.$val->Nome. "</option>"; 
                                    } ?>
                        		</select>
                        		</div>
                      		</div>
                     		
                   		  <!-- Title -->
                   		  <div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Cliente</label>
                        		<div class="col-lg-10">
                          		<input type="numeric" class="form-control" name="clienteCodigo" id="CodigoEmp" maxlength="4" size="4" value='' placeholder="<?php if(isset($find->id))
                          		{ 
                          		    echo $find->id . "Codigo já utilizado" ;
                          		} else {
                          		    echo 'Digite um código não utilizado';
                          		}
                          		?>" required>

                        		</div>
                      		</div>
                      		
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Nome</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" name="clienteNome" id="NomeEmp" maxlength="100"  placeholder="Nome da Empresa" required>
                        		</div>
                      		</div>
                            <!-- Content -->
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">CNPJ</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="clienteCnpj" id="CnpjEmp" maxlength="14" size="14" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">CEP</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="clienteCep" id="clienteCep" maxlength="30" size="30" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2">UF</label>
                        			<div class="col-lg-10">
                        					<input type="numeric" class="form-control" name="clienteUf" id="clienteUf" maxlength="30" size="30" required readonly>
                        			</div>
                      			</div>
							<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Cidade</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="clienteCidade" id="clienteCidade" maxlength="30" size="30" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Bairro</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="clienteBairro" id="clienteBairro" maxlength="20" size="20" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Rua</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="clienteEndereco" id="clienteEndereco"  maxlength="30" size="30" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		

                      		
                      		
                      		
                      		
                      		
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Contato</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="clienteContato" id="CnpjEmp"  maxlength="30" size="30" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Email</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="clienteEmail" id="CnpjEmp" maxlength="20" size="20"  required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      <!-- Cateogry -->
                      		
                      <!-- Tags -->
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="tags">telefone</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" id="emailEmp" name="clienteTelefone"  maxlength="12" size="12">
                        	</div>
                      		</div>
                      
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          	<button type="submit" class="btn btn-primary">SALVAR</button>
                          	<button type="reset" class="btn btn-danger">LIMPAR</button>
                          <!-- <button type="reset" class="btn btn-default">Reset</button> -->
                        </div>
                      </div>
                    </form>
                  </div>


                </div>
                <div class="widget-foot">
                  
                </div>
              </div>
            </div>
</div>

        <!-- </div>  -->
<div class="col-md-12 portlets">
<!--   <div class="content border"> -->
    <div class="panel panel-default">
        <div class="panel-heading">
          	<div class="pull-left">Clientes</div>
           		<div class="widget-icons pull-right">
           			<a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
           			<a href="#" class="wclose"><i class="fa fa-times"></i></a>
           		</div>
                			<div class="clearfix"></div>
        </div>
              <div class="panel-body">
              <div class="widget-foot">
              <table border=1 class="table table-striped table-hover">
            	<tr>
            		<td>Empresa</td>
            		<td>Local</td>
            		<td>Codigo</td>
            		<td>Nome</td>
            		<td>Cnpj</td>
            		<td>Contato</td>
            		<td>Telefone</td>
            		<td>Ação</td>
            	</tr>
            	<?php foreach($cliV as $c) {?>
            	   <tr>
                        <td><?php echo $c->CodigoEmpresa;?></td>
                        <td><?php echo $c->CodigoLocal;?></td>
                        <td><?php echo $c->id;?></td>
                        <td><?php echo $c->Nome;?></td>
                        <td><?php echo $c->Cnpj;?></td>
                        <td><?php echo $c->Contato;?></td>
                        <td><?php echo $c->Telefone;?></td>
                        <td><a href="<?php echo action('CadastrosEstoqueCliForController@clienteEditar', array('CodigoEmpresa' => $c->CodigoEmpresa,'CodigoLocal' => $c->CodigoLocal,'Id' => $c->id ));?>"> <button type="submit" class="btn btn-default">EDITAR</button> </a>
						<a href="#" onclick="apagar('<?php echo action('CadastrosEstoqueCliForController@clienteDelete', array('CodigoEmpresa' => $c->CodigoEmpresa,'CodigoLocal' => $c->CodigoLocal,'Id' => $c->id ));?>')"><button type="submit" class="btn btn-danger">EXCLUIR</button> </a>
						</td>
                   </tr>
                   <?php }?>
                   
            	</table>              
                  <?php echo $cliV->links(); ?>
                </div>
              </div>
            </div>
</div>

        <!-- </div>  -->
        
 






@stop
