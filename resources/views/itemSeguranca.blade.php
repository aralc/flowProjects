@extends('principal')
@section('content')
@section('title_position','Cadastros de Estoque')
@section('position', 'Cadastros de Estoque / Item Segurança')



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
          	<div class="pull-left">Cadstro de Item Segurança</div>
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
                    <form class="form-horizontal" method="post" action="<?php echo action('CadastrosEstoqueItemController@itemSegurancaIncluir')?>">
                    <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                    	<!-- Código -->
                    		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Empresa</label>
                        		<div class="col-lg-10">
               	            		<select class="form-control" name="itemSegEmpresa">
                        		 	<?php foreach ($empV as $val)       {         
                                    echo "<option value='" . $val->Codigo.  "'>" . $val->Codigo .'-'.$val->Nome. "</option>"; 
                                    } ?>
                        		</select>
                          		
                        		</div>
                      		</div>
                      			<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Local</label>
                        		<div class="col-lg-10">
                          			<select class="form-control" name="itemSegLocal">
                        		 	<?php foreach ($locV as $val)       {         
                                    echo "<option value='" . $val->Codigo.  "'>" . $val->Codigo .'-'.$val->Nome. "</option>"; 
                                    }
                                    ?>
                        		</select>
                        		</div>
                      		</div>
                    		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Codigo</label>
                        		<div class="col-lg-10">
                          		<select class="form-control" name="itemSegCodigo">
                        		 	<?php foreach ($iteV as $val)       {         
                                    echo "<option value='" . $val->Id.  "'>" . $val->Id .' - '.$val->Descricao. "</option>"; 
                                    } 
                                    ?>
                        		</select>
                        		</div>
                      		</div>
                   		  
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Quantidade de Segurança</label>
                        		<div class="col-lg-10">
                          		<input type="numeric" class="form-control" name="itemSegQuantidade" id="itemSegQuantidade" maxlength="4"  placeholder="Descrição do produto" required>
                        		</div>
                      		</div>
                      		
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Quantidade de Compra Automática</label>
                        		<div class="col-lg-10">
                          		<input type="numeric" class="form-control" name="itemSegQuantidadeCom" id="itemSegQuantidadeCom" maxlength="4"  placeholder="Descrição do produto" required>
                        		</div>
                      		</div>
                            <!-- Content -->
                            
                      			
                      			
                      			
                      		                    		
                      
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          	<button type="submit" class="btn btn-primary">Salvar</button>
                          	<button type="reset" class="btn btn-danger">Reset</button>
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
          	<div class="pull-left">Itens Estoque Segurança</div>
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
            		<td>Id</td>
            		<td>Estoque minimo</td>
            		<td>Estoque Compra</td>
            		<td>Ação</td>
            	</tr>
            	<?php foreach($iteVS as $i) { ?>
            	   <tr>
                        <td><?php echo $i->CodigoEmpresa;?></td>
                        <td><?php echo $i->CodigoLocal;?></td>
                        <td><?php echo $i->IdPS; ?></td>
                        <td><?php echo $i->EstoqueMinimo;?></td>
                        <td><?php echo $i->EstoqueCompraAut;?></td>
                           <br>
                        <td>
                        <a href="#" onclick="apagar('<?php echo action('CadastrosEstoqueItemController@itemSegurancaDelete', array('CodigoEmpresa' => $i->CodigoEmpresa,'Codigo' => $i->CodigoLocal,'IdPS' => $i->IdPS ));?>')"><button type="submit" class="btn btn-danger">EXCLUIR</button> </a>
                        
            <!--        echo "<td><a href='".action("ClienteController@editar", $key)."'><span class='glyphicon glyphicon-pencil'>[editar]</span></a></td>"; -->
                   </tr>
                   <?php } ?>
            	</table>              
                  
                </div>
              </div>
            </div>
</div>

        <!-- </div>  -->
        
        
        
        






@stop
