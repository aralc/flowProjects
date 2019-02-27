@extends('principal')
@section('content')
@section('title_position','Parametros Gerais')
@section('position', 'Paramestros Gerais / Cadastro de Empresa')

<script type="text/javascript">
	function apagar(url)
	{
	if (window.confirm('Deseja realmente apagar ?'))
		{
			window.location = url;
		}
	
	}
</script>

<div class="col-md-12 portlets">
    <div class="panel panel-default">
    
    <?php
    
            if (old('NomeEmpresa') && (count($errors) == 0))
            {
                echo "<div class='alert alert-success'>
                        <strong> SUCESSO </strong>
                </div>";
                
            }
            else if (count($errors)>0)
            {
                
                echo "<div class='alert alert-danger'>";
                    echo  count($errors);
                    echo "<ul>";
                    foreach($errors->all() as $error)
                    {
                       
                        echo "<li>".$error."</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                    
            }

                    ?>
                    
                    
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
          			          		    <form class="form-horizontal" action="<?php if(( isset($acaoV)) && ($acaoV == "e")) 
          			          		                                               {
          			          		                 			          		    echo action('CadastrosGeraisController@empresaEditar');
          			          		                                               } 
          			          		                                               else 
          			          		                                               {
          			          		                                               echo action('CadastrosGeraisController@empresaIncluir');
          			          		                                               }
          			          		                                               ?>" method="post">
}
                    					<input type="hidden" name="_token" value="{{{csrf_token()}}}">
                    	                 
                    					<div class="form-group">
                        					<label class="control-label col-lg-2" for="title">Código de Empresa</label>
                        					<div class="col-lg-1">
                          						<input type="numeric" class="form-control" name="CodEmpresa" id="CodigoEmp" maxlength="4" size="4" required disabled>
                        					</div>
                      					</div>
                   		  
                      					<div class="form-group">
                        					<label class="control-label col-lg-2" for="title">Nome</label>
                        						<div class="col-lg-10">
                          							<input type="text" class="form-control" name="NomeEmpresa" id="NomeEmp" maxlength="100"  placeholder="Nome da Empresa" value="<?php echo old('NomeEmpresa');?>" required>
                        						</div>
                      					</div>
                            
                      					<div class="form-group">
                        					<label class="control-label col-lg-2" for="CNPJ">CNPJ</label>
                        						<div class="col-lg-2">
                        							<input type="numeric" class="form-control" name="CnpjEmpresa" id="CnpjEmp" maxlength="14" size="14" required>
                          						</div>
                      					</div>
                      					
                      					<div class="form-group">
                        					<label class="control-label col-lg-2" for="CNPJ">Telefone</label>
                        						<div class="col-lg-2">
                        							<input type="numeric" class="form-control" name="TelefoneEmpresa" id="CnpjEmp" maxlength="14" size="14" required>
                          						</div>
                      					</div>
                      
                      					<div class="form-group">
                        					<label class="control-label col-lg-2">Tipo</label>
                        						<div class="col-lg-2">
                          						<select class="form-control" name="TipoEmpresa">
                          						
                                             		<option value="">- Selecione -</option>
                                             		<option value="F">Pessoa Física</option>
                                             		<option value="J">Pessoa Juridica</option>
                                         		</select>
                        						</div>
                      					</div>
                      
                      					<div class="form-group">
                        					<label class="control-label col-lg-2" for="tags">Email</label>
                        						<div class="col-lg-10">
                          							<input type="email" class="form-control" name="EmailEmpresa" id="EmailEmp" maxlength="40">
                        						</div>
                      					</div>
                                            
                      					<div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-9">
                              					<button type="submit" class="btn btn-primary">SALVAR</button>
                              					<button type="reset" class="btn btn-danger">LIMPAR</button>
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
    <div class="panel panel-default">
        <div class="panel-heading">
          	<div class="pull-left">Empresas</div>
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
            		<td>Codigo</td>
            		<td>Nome</td>
            		<td>Cnpj</td>
            		<td>Tipo</td>
            		<td>Telefone</td>
            		<td>Email</td>
            		
            		<td>Ação</td>
            	</tr>
           	   <?php foreach ($empV as $value) { ?>
                	   
            	    
                        <td><?php echo $value->Codigo;    ?></td>
                        <td><?php echo $value->Nome;   ?></td>
                        <td><?php echo $value->Cnpj; ?></td>
                        <td><?php echo $value->Tipo;  ?></td>
                        <td><?php echo $value->Telefone; ?></td>
                        <td><?php echo $value->Email; ?></td>
                        <td><a href="<?php echo action('CadastrosGeraisController@empresaEditar', $value->Codigo);?>"><button type="submit" class="btn btn-default">EDITAR</button> </a>
                        <!-- <a href="<?php //echo action('ControllerCadastrosG@empresaDeletar', $value->Codigo);?>"><button type="submit" class="btn btn-default">EXCLUIR</button> </a> -->
                        <a href="#" onclick="apagar('<?php echo action('CadastrosGeraisController@empresaDelete', $value->Codigo);?>')"><button type="submit" class="btn btn-danger">EXCLUIR</button> </a>
                        </td>
            <!--        echo "<td><a href='".action("ClienteController@editar", $key)."'><span class='glyphicon glyphicon-pencil'>[editar]</span></a></td>"; -->
            </tr>
                   <?php    } ?>
            	</table>    
                  
                </div>
              </div>
            </div>
</div>

        <!-- </div>
        
        
      

  -->




@stop
