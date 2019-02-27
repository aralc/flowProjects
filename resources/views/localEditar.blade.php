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
                    <form class="form-horizontal" method="post" action="<?php echo action('CadastrosGeraisLocalController@localUpdate',array('CodigoEmpresa' => $locV->CodigoEmpresa,'Codigo' => $locV->Codigo)); ?>">
            					<input type="hidden" name="_token" value="{{{csrf_token()}}}">
            					
            			           
                 
                      		
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Empresa</label>
                        		<div class="col-lg-2">
							<input type="numeric" class="form-control" id="CodigoLocal" name="CodigoEmpresa" maxlength="4" size="4" value="<?php echo $locV->CodigoEmpresa;?>" disabled>                        		                        		</div>
                      		</div>
                    	
                    	
                    	<!-- CÃ³digo -->
                    	
                    	
                    	
                    		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Código de Local</label>
                        		<div class="col-lg-2">
                          		<input type="numeric" class="form-control" id="CodigoLocal" name="CodigoLocal" maxlength="4" size="4" value="<?php echo $locV->Codigo;?>" disabled>
                        		</div>
                      		</div>
                   		  <!-- Title -->
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="title">Nome</label>
                        		<div class="col-lg-10">
                          		<input type="text" class="form-control" id="NomeLocal" name="NomeLocal"  maxlength="100"  placeholder="Nome do Local" value="<?php echo $locV->Nome;?>">
                        		</div>
                      		</div>
                      		                            
                      		<div class="form-group">
                        		<label class="control-label col-lg-2" for="CNPJ">CNPJ</label>
                        			<div class="col-lg-3">
                        			<input type="numeric" class="form-control" id="CnpjLocal" name="CnpjLocal" maxlength="14" size="14" value="<?php echo $locV->Cnpj;?>">
                          			<!--  <textarea class="form-control" id="content"></textarea> -->
                        			</div>
                      		</div>
                          <!-- Tags -->
                      		<div class="form-group">
                        	<label class="control-label col-lg-2" for="tags">Email</label>
                        		<div class="col-lg-10">
                          		<input type="email" class="form-control" id="EmailLocal" name="EmailLocal" maxlength="40" value="<?php echo $locV->Email;?>">
                        	</div>
                      		</div>
                      				<div class="form-group">
		                        	<label class="control-label col-lg-2" for="tags">Telefone</label>
                        				<div class="col-lg-3">
                          				<input type="text" class="form-control" id="TelefoneLocal" name="TelefoneLocal" maxlength=20 value="<?php echo $locV->Telefone;?>">
                        				</div>
                      		</div>
                      
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          	<button type="submit" class="btn btn-primary">ALTERAR</button>
                          	
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
   
</div>

        <!-- </div>  -->
        
        
        
        






@stop