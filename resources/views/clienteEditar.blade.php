@extends('principal')
@section('content')
@section('title_position','Cadastros de Estoque')
@section('position', 'Cadastros de Estoque / Cliente')
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
                    <form class="form-horizontal" method="post" action="<?php echo action('CadastrosEstoqueCliForController@clienteUpdate');?>">
                    <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                    	<!-- Código -->
                    		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Empresa</label>
                        		<div class="col-lg-10">
                          		<input class="form-control" type="numeric" value="<?php echo $cliV->CodigoEmpresa?>" name="clienteEmpresa" readonly>
                        		</div>
                      		</div>
                      		
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Local</label>
                        		<div class="col-lg-10">
                          		<input type="numeric" class="form-control" name="clienteLocal" value="<?php echo $cliV->CodigoLocal;?>" readonly>
                        		</div>
                      		</div>
                		
                     		  <!-- Title -->
                   		  <div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Cliente</label>
                        		<div class="col-lg-10">
                          		<input type="numeric" class="form-control" name="clienteCodigo" id="CodigoEmp" maxlength="4" size="4" value="<?php echo $cliV->id;?>" readonly>
                        		</div>
                      		</div>
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Nome</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" name="clienteNome" id="NomeEmp" maxlength="100"  placeholder="Nome da Empresa" value="<?php echo $cliV->Nome;?>" required>
                        		</div>
                      		</div>
                            <!-- Content -->
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">CNPJ</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="clienteCnpj" id="CnpjEmp" maxlength="14" size="14" value="<?php echo $cliV->Cnpj; ?>" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Endereco</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="clienteEndereco" id="CnpjEmp" maxlength="30" size="30" value="<?php echo $cliV->Endereco; ?>" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Cidade</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="clienteCidade" id="CnpjEmp" maxlength="30" size="30" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Bairro</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="clienteBairro" id="CnpjEmp" maxlength="20" size="20" value="<?php echo $cliV->Bairro;?>" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>

                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Contato</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="clienteContato" id="CnpjEmp" maxlength="30" size="30" value="<?php echo $cliV->Contato; ?>" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">Email</label>
                        			<div class="col-lg-10">
                        			<input type="numeric" class="form-control" name="clienteEmail" id="CnpjEmp" maxlength="20" size="20" value="<?php echo $cliV->Email;?>" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                      		
                      <!-- Cateogry -->
                      		<div class="form-group">
                        		<label class="control-label col-lg-2">UF</label>
                        			<div class="col-lg-10">
                          				<select class="form-control" name="clienteUf">
                                             <option value="">- Selecione -</option>
                                             <option value="MG">Minas Gerais</option>
                                             <option value="SP">São Paulo</option>
                                         </select>
                        			</div>
                      			</div>
                      <!-- Tags -->
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="tags">telefone</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" id="emailEmpresa" name="clienteTelefone" value="<?php echo $cliV->Telefone;?>">
                        	</div>
                      		</div>
                      
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          	<button type="submit" class="btn btn-primary">EDITAR</button>
                          	<button type="button" class="btn btn-danger">VOLTAR</button>
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

<!--   <div class="content border"> -->
    


        <!-- </div>  -->
        
 






@stop
