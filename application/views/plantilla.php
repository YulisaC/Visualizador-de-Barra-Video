<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Visualizador de Barra Progreso Video</title>
        <link href="<?php echo base_url('templates/css/bootstrap.css')?>" rel="stylesheet">
        <script src="<?php echo base_url('templates/js/bootstrap.js')?>"></script>

</head>

    <body>
        <!-- Navigation -->
    <nav class="navbar navbar-dark bg-info" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Visualizador de Carga de un Video | CodeIgniter</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!-- <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul> -->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
        
     <!-- Main component for a primary marketing message or call to action -->
      <div>
        <?php
                    $this->load->view($contenido);
        ?>
     
      </div>
    </body>
    
</html>