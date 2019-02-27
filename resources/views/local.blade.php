@extends('principal')
@section('content')
@section('title_position','Parametros Gerais')
@section('position', 'Paramestros Gerais / Cadastro de Local')

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
<!--   <div class="content border"> -->
    <div class="panel panel-default">
        <div class="panel-heading">
          	<div class="pull-left">Cadastro de Local</div>
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
                    <form class="form-horizontal" method="post" action="<?php echo action('CadastrosGeraisLocalController@localIncluir');?>">
            					<input type="hidden" name="_token" value="{{{csrf_token()}}}">
            					
            			           
                 
                      		
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Empresa</label>
                        		<div class="col-lg-2">
                          	<select class="form-control" name="CodigoEmpresa">
                          	<?php foreach ($empV as $val)       {         
                            echo "<option value='" . $val->Codigo.  "'>" . $val->Codigo .'-'.$val->Nome. "</option>"; 
                            } ?>
								                                             		
                            </select>
                        		</div>
                      		</div>
                    	
                    	
                    	<!-- CÃ³digo -->
                    	
                    	
                    	
                    		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Local</label>
                        		<div class="col-lg-2">
                          		<input type="numeric" class="form-control" id="CodigoLocal" name="CodigoLocal" maxlength="4" size="4" required>
                        		</div>
                      		</div>
                   		  <!-- Title -->
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Nome</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" id="NomeLocal" name="NomeLocal"  maxlength="100"  placeholder="Nome do Local" required>
                        		</div>
                      		</div>
                      		                            
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">CNPJ</label>
                        			<div class="col-lg-3">
                        			<input type="numeric" class="form-control" id="CnpjLocal" name="CnpjLocal" maxlength="14" size="14" required>
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                          <!-- Tags -->
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="tags">Email</label>
                        		<div class="col-lg-10">
                          		<input type="email" class="form-control" id="EmailLocal" name="EmailLocal" maxlength="40">
                        	</div>
                      		</div>
                      				<div class="form-group">
		                        	<label class="control-label col-lg-2" for="tags">Telefone</label>
                        				<div class="col-lg-3">
                          				<input type="text" class="form-control" id="TelefoneLocal" name="TelefoneLocal" maxlength=20>
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
          	<div class="pull-left">Locais</div>
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
            		<td>Codigo Empresa</td>
            		<td>Codigo Local</td>
            		<td>Nome</td>
            		<td>CNPJ</td>
            		<td>Email</td>
            		<td>Telefone</td>
            		<td>AÃ§Ã£o</td>
            	</tr>
            	   <tr>
            	   <?php foreach ($locV as $value) {?>
                        <td><?php echo $value->CodigoEmpresa; ?></td>
                        <td><?php echo $value->Codigo; ?></td>
                        <td><?php echo $value->Nome; ?></td>
                        <td><?php echo $value->Cnpj; ?></td>
                        <td><?php echo $value->Email; ?></td>
                        <td><?php echo $value->Telefone; ?></td>
                        <td><a href="<?php echo action('CadastrosGeraisLocalController@localEditar', array('CodigoEmpresa' => $value->CodigoEmpresa,'Codigo' => $value->Codigo ));?>"> <button type="submit" class="btn btn-default">EDITAR</button> </a>
<a href="#" onclick="apagar('<?php echo action('CadastrosGeraisLocalController@localDelete', array('CodigoEmpresa' => $value->CodigoEmpresa,'Codigo' => $value->Codigo ));?>')"><button type="submit" class="btn btn-danger">EXCLUIR</button> </a>
                        

                        
                         
                        
            <!--        echo "<td><a href='".action("ClienteController@editar", $key)."'><span class='glyphicon glyphicon-pencil'>[editar]</span></a></td>"; -->
            </td>
                   </tr>
                   <?php }?>
            	</table>              
            	
                  
                </div>
              </div>
            </div>
</div>

        <!-- </div>  -->
        
        
        
        






@stop