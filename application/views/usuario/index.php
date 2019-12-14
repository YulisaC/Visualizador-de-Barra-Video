<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link type="text/css" rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <!-- CSS personalizado --> 
        <link type="text/css" rel="stylesheet" href="assets/main.css">  
        <!--datables CSS básico-->
        <link type="text/css" rel="stylesheet" href="assets/datatables/datatables.min.css"/>
        <!--datables estilo bootstrap 4 CSS-->  
        <link type="text/css" rel="stylesheet" href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
        
</head>
<body >     
<!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <?php if($this->session->has_userdata('msg')){?>
                    <div id="alert" class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                <?php } ?>
                
                <div class="panel panel-info">
                    <div class="panel-heading">
                          Registro
                          <div class="btn-group pull-right">
                                  <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#addMember" 
                                    onclick="addMemberModel()"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" 
                                    title="Nuevo Registro"></i>
                                  </button>
                          </div>
                    </div>
                    
	<div class="panel-body">
        <table class="table table-striped table-bordered" style="width:100%" id="manageMemberTable" >
            <thead>
            <!--<th>ID_Video</th>-->
            <th>ID_Usuario</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Imag.Principal</th>
            <th>Video</th>
            <th>Estatus</th>
            <!--<th>Acciones</th>-->
            </thead>
            
              <tbody id="developers">
               <?php foreach ($list_usuarios as $value) {?>
                <tr>
          <!-- <td><?php echo $value->eCodVideo;?></td>-->
                    <td><?php echo $value->eCodUsuario;?></td>
                    <td><?php echo $value->tTitulo;?></td>
                    <td><?php echo $value->tDescripcion;?></td>
                    <td><img src="archivos/imagenes/<?php echo $value->tImagePrincipal?>" width="100" ></td>
                    <td><video src="archivos/videos/<?php echo $value->tVideo?>"  controls autoplay width="150" ></td>                   
                    <td><?php echo $value->tEstatus;?></td> 
                </tr>
                <?php } ?>
            </tbody>
        </table>
       </div>      
                </div>
            </div>  
        </div>    
<!-- modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addMember">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        
      <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
            <!-- enctype="multipart/form-data" es necesario por que si no lo pongo dice You did not select a file to upload -->
            <form id="upload" method="POST" enctype="multipart/form-data" action="<?php echo base_url('usuario/subir_archivos')?> "> 
                <div class="modal-body">  
                <div class="form-group input-group">
                    <span class="input-group-addon" style="width:150px;">Usuario:</span>
                    <select name="txtusuario" class="form-control">
                        <?php foreach ($selUsuario as $value) { ?>
                        <option id="txtusuario" value="<?php echo $value->eCodUsuario?>"><?php echo $value->tNombre;?></option>
                        <?php } ?>
                    </select>   
                </div> 

                <div class="form-group input-group">
                      <span class="input-group-addon" style="width:150px;">Titulo:</span>
                      <input type="text" name="titulo" class="form-control" required/>
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon" style="width:150px;">Descripción:</span>
                    <input type="text" name="descripcion" class="form-control" required/>
                </div>

               <div class="form-group input-group">
                    <span class="input-group-addon" style="width:150px;">ImgPrincipal:</span>
                    <input type="file" name="imageprincipal" class="form-control" required/>
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon" style="width:150px;">Video:</span>
                    <input type="file" name="user_file" class="form-control" required/>
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon" style="width:150px;">Estatus:</span>
                    <select name="txtestatus" class="form-control">
                        <?php foreach ($selEstatus as $value) { ?>
                        <option id="txtestatus" value="<?php echo $value->eCodEstatus?>"><?php echo $value->tNombre;?></option>
                        <?php } ?>
                    </select>   
                </div> 
                    
                </div>
                
                <div class="progress" style="display:none;">
                    <div id="progressBar" class="progress-bar progress-bar-info progress-bar-striped " role="progressbar" 
                        aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                    </div>
               </div>
                
                <div class="modal-footer">
                    <button id="add" type="submit" class="btn btn btn-warning"><span class="glyphicon glyphicon-floppy-disk"/>
                      Guardar</button>
                </div>
            </form>     
    </div>
  </div>
</div>
    </div>
            <!-- jQuery, Popper.js, Bootstrap JS -->
            <script type="text/javascript" src="assets/jquery/jquery-3.3.1.min.js"></script>
            <script type="text/javascript" src="assets/popper/popper.min.js"></script>
            <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
            <!-- datatables JS -->
            <script type="text/javascript" src="assets/datatables/datatables.min.js"></script> 

            <!-- ProgressBar -->
            <script type="text/javascript" src="assets/bootstrap/js/progressBar.js"></script>  
</body>
</html>