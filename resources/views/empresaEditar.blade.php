@extends('principal')
@section('content')
@section('title_position','Parametros Gerais')
@section('position', 'Paramestros Gerais / Cadastro de Empresa')
<div class="col-md-12 portlets">
    <div class="panel panel-default">
        <div class="panel-heading">
          	<div class="pull-left">Cadastro de Empresa</div>
           		<div class="widget-icons pull-right">
           			<a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
           			<a href="#" class="wclose"><i class="fa fa-times"></i></a>
           		</div>
                			<div class="clearfix"></div>
        </div>
              			<div class="panel-body">
                					<div class="padd">
		                    			<div class="form quick-post">
          			               
                    					<form class="form-horizontal" action="<?php echo action('CadastrosGeraisController@empresaUpdate',$empV->Codigo); ?>" method="post">
                    					<input type="hidden" name="_token" value="{{{csrf_token()}}}">
                    	                 
                    					<div class="form-group">
                        					<label class="control-label col-lg-2" for="title">Código de Empresa</label>
                        					<div class="col-lg-1">
                          						<input type="numeric" class="form-control" name="CodEmpresa" id="CodigoEmp" value="<?php echo $empV->Codigo;?>" maxlength="4" size="4"  disabled>
                        					</div>
                      					</div>
                   		  
                      					<div class="form-group">
                        					<label class="control-label col-lg-2" for="title">Nome</label>
                        						<div class="col-lg-10">
                          							<input type="text" class="form-control" name="NomeEmpresa" id="NomeEmp" maxlength="100" value="<?php echo $empV->Nome;?>" placeholder="Nome da Empresa" >
                        						</div>
                      					</div>
                            
                      					<div class="form-group">
                        					<label class="control-label col-lg-2" for="CNPJ">CNPJ</label>
                        						<div class="col-lg-2">
                        							<input type="numeric" class="form-control" name="CnpjEmpresa" id="CnpjEmp" value="<?php echo $empV->Cnpj;?>" maxlength="14" size="14" required>
                          						</div>
                      					</div>
                      					
                      					<div class="form-group">
                        					<label class="control-label col-lg-2" for="CNPJ">Telefone</label>
                        						<div class="col-lg-2">
                        							<input type="numeric" class="form-control" name="TelefoneEmpresa" id="CnpjEmp" value="<?php echo $empV->Telefone;?>" maxlength="14" size="14" required>
                          						</div>
                      					</div>
                      
                      					<div class="form-group">
                        					<label class="control-label col-lg-2">Tipo</label>
                        						<div class="col-lg-2">
                          						<select class="form-control" name="TipoEmpresa" >
                                             		<option value="">- Selecione -</option>
                                             		<option value="F">Pessoa Física</option>
                                             		<option value="J">Pessoa Juridica</option>
                                         		</select>
                        						</div>
                      					</div>
                      
                      					<div class="form-group">
                        					<label class="control-label col-lg-2" for="tags">Email</label>
                        						<div class="col-lg-10">
                          							<input type="email" class="form-control" name="EmailEmpresa" id="EmailEmp" maxlength="40" value="<?php echo $empV->Email;?>">
                        						</div>
                      					</div>
                                            
                      					<div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-9">
                              					<button type="submit" class="btn btn-primary">ALTERAR</button>
                              					
                                		    </div>
                      					</div>
                    				</form>
                  				</div>


                </div>
                
              </div>
            </div>
</div>

<!-- Visualização dos cadastros  -->
<div class="col-md-12 portlets">
<!--   <div class="content border"> -->
    
</div>

        <!-- </div>
        
        
      

  -->




@stop