<!DOCTYPE html>
<html lang="en" lang="{{ app()->getLocale() }}">
	   <title>{{ config('app.name', 'NetFlow') }}</title>
	    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<head>
  		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<meta name="description" content="NetService">
  		<meta name="author" content="GeeksLabs">
  		<meta name="keyword" content="NetService, Projetos">
  		<link rel="shortcut icon" href="img/favicon.png">
  		<meta name="csrf_token" content="{{csrf_token()}}" />
  		
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  		
  	  <!--  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>-->
  <!-- javascripts -->
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
  <script src="<?php echo url('js/jquery.js');?>"></script>
  <script src="<?php echo url('js/jquery-ui-1.10.4.min.js');?>"></script>
  <script src="<?php echo url('js/jquery-1.8.3.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo url('js/jquery-ui-1.9.2.custom.min.js');?>"></script>
  <!-- bootstrap -->
  <script src="<?php echo url('js/bootstrap.min.js');?>"></script>
  <!-- nice scroll -->
  <script src="<?php echo url('js/jquery.scrollTo.min.js');?>"></script>
  <script src="<?php echo url('js/jquery.nicescroll.js');?>" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="<?php echo url('assets/jquery-knob/js/jquery.knob.js');?>"></script>
  <script src="<?php echo url('js/jquery.sparkline.js');?>" type="text/javascript"></script>
  <script src="<?php echo url('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js');?>"></script>
  <script src="<?php echo url('js/owl.carousel.js');?>"></script>
  <!-- jQuery full calendar -->
  <script src="<?php echo url('js/fullcalendar.min.js');?>"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="<?php echo url('assets/fullcalendar/fullcalendar/fullcalendar.js');?>"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
  		

  <title>NetService - Projeto</title>
		  <!-- Bootstrap CSS -->
  		<link href="<?php echo url('css/bootstrap.min.css');?>" rel="stylesheet">
        <!-- bootstrap theme -->
  		<link href="<?php echo url('css/bootstrap-theme.css');?>" rel="stylesheet">
           <!--external css-->
           <!-- font icon 
                <link href="css/elegant-icons-style.css" rel="stylesheet" />
                <link href="css/font-awesome.min.css" rel="stylesheet" /> -->
           <!-- full calendar css-->
  				<link href="<?php echo url('assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css');?>" rel="stylesheet" />
  				<link href="<?php echo url('assets/fullcalendar/fullcalendar/fullcalendar.css');?>" rel="stylesheet" />
           <!-- easy pie chart-->
  				<link href="<?php echo url('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css');?>" rel="stylesheet" type="text/css" media="screen" />
                <!-- owl carousel -->
  				<link rel="stylesheet" href="<?php echo url('css/owl.carousel.css');?>" type="text/css">
  				<link href="<?php echo url('css/jquery-jvectormap-1.2.2.css');?>" rel="stylesheet">
           <!-- Custom styles -->
                  <link rel="stylesheet" href="<?php echo url('css/fullcalendar.css');?>">
                  <link href="<?php echo url('css/widgets.css');?>" rel="stylesheet">
                  <link href="<?php echo url('css/style.css');?>" rel="stylesheet">
                  <link href="<?php echo url('css/style-responsive.css');?>" rel="stylesheet" />
                  <link href="<?php echo url('css/xcharts.min.css');?>" rel=" stylesheet">
                  <link href="<?php echo url('css/jquery-ui-1.10.4.min.css');?>" rel="stylesheet">
		<body>
		    <div id="app">
                    <!-- container section start -->
  			<section id="container" class="">
		    <header class="header dark-bg">
      		<div class="toggle-nav">
      			<div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom">
      			<i class="icon_menu">MENU</i></div>
        		
      		</div>
		      <!--logo start-->
      			<a href="index.html" class="logo">NetService <span class="lite"> Projetos </span></a>
              <!--logo end-->
           <!-- 
	      <div class="nav search-row" id="top_menu">
    		     search form start 
        		<ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>
         search form end  
      </div> --> 

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
	                      <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                             <span class="profile-ava">
                                <!-- <img alt="" src="img/36.jpg"> -->
                            </span>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                <li class="eborder-top">
                            <a href="#"><i class="icon_profile"></i> Meu Perfil</a>
                          </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
		
          
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          
              
    </header>
    <!--header end-->
    <!--sidebar start-->
	    <aside>
    		  <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
        		<ul class="sidebar-menu">
          		<li class="active">
            		<a class="" href="/NFlow">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                    </a>
          			</li>
          				<li class="sub-menu">
            				<a href="javascript:;" class="">
                    	     <i class="icon_document_alt"></i>
                        	  	<span>Parametros Gerais</span>
                          		<span class="menu-arrow arrow_carrot-right"></span>
                      		</a>
            				<ul class="sub">
              					<li><a class="" href="<?php echo action("CadastrosGeraisController@empresa");?>">Empresa</a></li>
              					<li><a class="" href="<?php echo action("CadastrosGeraisLocalController@local");?>">Local</a></li>
              					<li><a class="" href="<?php echo action("CadastrosGeraisUsuarioController@usuario");?>">Usuario</a></li>
              					<li><a class="" href="#">Seg. Usuario</a></li>
               				</ul>
   				       </li>
          				<li class="sub-menu">
            				<a href="javascript:;" class="">
                          		<i class="icon_desktop"></i>
                          		<span>Cadastros Estoque</span>
                          		<span class="menu-arrow arrow_carrot-right"></span>
                      		</a>
            				<ul class="sub">
              					<li><a class="" href="<?php echo action("CadastrosEstoqueController@estoque");?>">Estoque</a></li>
              					<li><a class="" href="<?php echo action("CadastrosEstoqueItemController@item");?>">Item</a></li>
              					<li><a class="" href="<?php echo action("CadastrosEstoqueItemController@itemSeguranca");?>">Item Segurança</a></li>
              					<li><a class="" href="<?php echo action("CadastrosEstoqueCliForController@fornecedor");?>">Fornecedor</a></li>
              					<li><a class="" href="<?php echo action("CadastrosEstoqueCliForController@cliente");?>">Cliente</a></li>
		     				</ul>
        				  </li>
			          <li class="sub-menu">
				            <a href="javascript:;" class="">
                		          <i class="icon_table"></i>
                          		<span>Movimentações</span>
                          		<span class="menu-arrow arrow_carrot-right"></span>
                      		</a>
            					<ul class="sub">
            						<li><a class="" href="<?php echo action("MovimentosEstoqueEntradaController@entrada");?>">Entrada de Estoque</a></li>
              						<li><a class="" href="<?php echo action("MovimentosEstoqueSaidaController@saida");?>">Requisição de Estoque</a></li>
              						<li><a class="" href="basic_table.html">Aprovar RATE</a></li>
              						<li><a class="" href="basic_table.html">Solic. de Compra</a></li>
              						<li><a class="" href="basic_table.html">Aprovar Solicitação</a></li>
            					</ul>
          			</li>
			          <li class="sub-menu">
            				<a href="javascript:;" class="">
                          		<i class="icon_documents_alt"></i>
                          		<span>Relatorios</span>
                          		<span class="menu-arrow arrow_carrot-right"></span>
                      		</a>
            				<ul class="sub">
              					<li><a class="" href="<?php echo action("RelatoriosProdutoEstoqueController@produto");?>">Produto Estoque</a></li>
              					<li><a class="" href="login.html"><span>Saida de Documentos</span></a></li>
              					<li><a class="" href="contact.html"><span>Estoque de seguranca</span></a></li>
            				</ul>
			          </li>
			       </ul>
                    <!-- sidebar menu end-->
      				</div>
    			</aside>
                <!--sidebar end-->

                    <!--main content start-->
    				<section id="main-content">
      					<section class="wrapper">
                        <!--overview start-->
        				<div class="row">
          				<div class="col-lg-12">
                			<h3 class="page-header"><i class="fa fa-laptop"></i> @yield('title_position') </h3>
                			<ol class="breadcrumb">
                  				<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                  				<li><i class="fa fa-laptop"></i> @yield('position')</li>
    		            	</ol>
          				</div>
        				</div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-cloud-download"></i>
              	<div class="count">1</div>
              	<div class="title">Requisições</div>
            </div>
                <!--/.info-box-->
          			</div>
          <!--/.col-->
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	            <div class="info-box brown-bg">
    	          <i class="fa fa-shopping-cart"></i>
        	      <div class="count">2</div>
              	  <div class="title">Entradas Documento</div>
            	</div>
                <!--/.info-box-->
          </div>
                <!--/.col-->
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	            <div class="info-box dark-bg">
    		          <i class="fa fa-thumbs-o-up"></i>
              		  <div class="count">3</div>
              		  <div class="title">Solicitação</div>
            	</div>
            <!--/.info-box-->
          </div>
          <!--/.col-->
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            	<div class="info-box green-bg">
              		<i class="fa fa-cubes"></i>
              		<div class="count">4</div>
              		<div class="title">Estoque</div>
            	</div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->


        <div class="row">
        @yield('content')
          
          <div class="col-md-3">
                    
          </div>


        </div>


        



        <div class="row">

                    <!--/col-->
          <div class="col-md-3">
		
             

          </div>
          <!--/col-->

        </div>



        



        



                  <!-- project team & activity end -->

      </section>
      <div class="text-right">
        <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          NetService <a href="#">aralc</a>
        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->
  
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
