<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexura</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>PLANTILLA/imagenes/favicon.png">
    <link href="<?= base_url()?>PLANTILLA/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>PLANTILLA/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url()?>PLANTILLA/css/animate.css" rel="stylesheet">
    <link href="<?= base_url()?>PLANTILLA/css/style.css" rel="stylesheet">
    <link href="<?= base_url()?>PLANTILLA/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="<?= base_url()?>PLANTILLA/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="<?= base_url()?>PLANTILLA/css/plugins/iCheck/custom.css" rel="stylesheet">
</head>
<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">

            <div class="row border-bottom white-bg">
                <nav class="navbar navbar-expand-lg navbar-static-top" role="navigation">
                    <a href="#" class="navbar-brand" style="background: #941c23;">NEXURA</a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-reorder"></i>
                    </button>
                    <div class="navbar-collapse collapse" id="navbar">
                        Prueba de conocimientos
                    </div>
                </nav>
            </div>
            <div class="modal inmodal" id="myModal4" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated bounceInRight">
                        <form class="m-t" role="form" action="" method="POST" id="formulario">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Nuevo Empleado</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label><b>Nombre *</b></label>
                                    <input type="text" name="nombre" class="form-control" id="nombre" ></input>
                                </div>
                                <div class="form-group">
                                    <label><b>Correo Electrónico *</b></label>
                                    <input type="email" name="email" class="form-control" id="email" ></input>
                                </div>
                                <div class="form-group">
                                    <label><b>Sexo *</b></label>
                                    <div class="i-checks"><label> <input type="radio" value="F" name="sexo" id="F" > <i></i> Femenino </label></div>
                                    <div class="i-checks"><label> <input type="radio" value="M" name="sexo" id="M" > <i></i> Masculino </label></div>
                                </div>
                                <div class="form-group">
                                    <label><b>Áreas *</b></label>
                                    <select class="form-control m-b" name="areas" id="area" >
                                        <option value="" >Seleccione</option>
                                        <?php foreach ($areas as $value) {   ?>
                                            <option value="<?=$value->id ?>" ><?=$value->nombre ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><b>Roles *</b></label>
                                    <?php foreach ($roles as $value) {   ?>
                                        <div class="i-checks"><label>
                                            <input type="checkbox" id="roles" value="<?=$value->id ?>" name="roles[<?=$value->id ?>]"  > <i></i><?=$value->nombre ?></label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label><b>Descripción *</b></label>
                                    <textarea name="descripcion" id="descripcion" class="form-control"  rows="6"  ></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="i-checks"><label> <input type="checkbox" value="SI" name="boletin" > <i></i> Deseo recibir boletin informativo </label></div>
                                </div>
                            </div>
                            <input type="hidden" name="crear" value="crear">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                <button type="submit" name="crear" class="btn btn-primary">Guardar Empleado</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" wrapper-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Empleados</h5>
                                    <div class="ibox-tools">
                                        <button class="btn btn-success btn-xs" type="button" data-toggle="modal" data-target="#myModal4"><i class="fa fa-plus"></i> <span class="bold"></span></button>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Email</th>
                                                    <th>Sexo</th>
                                                    <th>Area</th>
                                                    <th>Boletin</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  foreach ($empleados as $value) { ?>
                                                    <tr>
                                                        <td><?= $value->nombre; ?></td>
                                                        <td><?= $value->email; ?></td>
                                                        <td><?= $sexo = ($value->sexo == 'F' ? 'Femenino' : 'Masculino' );  ?></td>
                                                        <td><?= $value->area; ?></td>
                                                        <td><?= $boletin = ( $value->boletin == 1 ? 'Si' : 'No' ); ?></td>
                                                        <td>
                                                            <div class="modal inmodal" id="A<?= $value->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content animated bounceInRight">
                                                                        <form class="m-t" role="form" action="" method="POST">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                                                <h4 class="modal-title">Actualizar Empleado</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                               <div class="form-group">
                                                                                <label><b>Nombre *</b></label>
                                                                                <input type="text" name="nombre" class="form-control" value="<?= $value->nombre; ?>" required="" ></input>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label><b>Correo Electrónico *</b></label>
                                                                                <input type="email" name="email" class="form-control" value="<?= $value->email; ?>" required="" ></input>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label><b>Sexo *</b></label>
                                                                                <?php   if ($value->sexo == 'F') { ?>
                                                                                    <div class="i-checks"><label> <input type="radio" checked=''  value="F" name="sexo"> <i></i> Femenino </label></div>
                                                                                    <div class="i-checks"><label> <input type="radio" value="M" name="sexo"> <i></i> Masculino </label></div>
                                                                                <?php  } else {   ?>
                                                                                    <div class="i-checks"><label> <input type="radio" value="F" name="sexo"> <i></i> Femenino </label></div>
                                                                                    <div class="i-checks"><label> <input type="radio" checked='' value="M" name="sexo"> <i></i> Masculino </label></div>
                                                                                <?php  }   ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label><b>Áreas *</b></label>
                                                                                <select class="form-control m-b" name="areas">
                                                                                    <?php foreach ($areas as $area) { if ($area->id == $value->area_id) { ?>
                                                                                        <option value="<?=$area->id ?>" ><?=$area->nombre ?></option>
                                                                                    <?php } } ?>
                                                                                    <?php foreach ($areas as $area) { if ($area->id != $value->area_id) { ?>
                                                                                        <option value="<?=$area->id ?>" ><?=$area->nombre ?></option>
                                                                                    <?php } } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label><b>Roles *</b></label>
                                                                                <?php foreach ($roles as $rol) { $checked = 'NO';
                                                                                foreach ($rol_empleado as $empleado) {
                                                                                    if ($rol->id == $empleado->rol_id && $empleado->empleado_id == $value->id ) { 
                                                                                        $checked = 'SI';
                                                                                    } 
                                                                                }
                                                                                if ($checked == 'SI') { ?>
                                                                                    <div class="i-checks"><label>
                                                                                        <input type="checkbox" value="<?=$rol->id ?>" checked  name="roles[<?=$rol->id ?>]"> <i></i><?=$rol->nombre ?></label>
                                                                                    </div>
                                                                                <?php }else{ ?>
                                                                                    <div class="i-checks"><label>
                                                                                        <input type="checkbox" value="<?=$rol->id ?>" name="roles[<?=$rol->id ?>]"> <i></i><?=$rol->nombre ?></label>
                                                                                    </div>
                                                                                <?php  } } ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label><b>Descripción *</b></label>
                                                                                <textarea name="descripcion" class="form-control"  rows="6" required="" ><?= $value->descripcion; ?></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <?php if ($value->boletin == 1) { ?>
                                                                                    <div class="i-checks"><label> <input type="checkbox" checked='' value="SI" name="boletin" required="" > <i></i> Deseo recibir boletin informativo </label></div>
                                                                                <?php  }else{  ?>
                                                                                    <div class="i-checks"><label> <input type="checkbox" value="" name="boletin" required="" > <i></i> Deseo recibir boletin informativo </label></div>
                                                                                <?php  } ?>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                                                            <button type="submit" name="actualizar" value="<?= $value->id; ?>" class="btn btn-primary">Actualizar Empleado</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal inmodal" id="E<?= $value->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content animated fadeIn">
                                                                    <form class="m-t" role="form" action="" method="POST">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                                            <i class="fa fa-trash modal-icon"></i>
                                                                            <h4 class="modal-title">Este proceso es irreversible.!</h4>
                                                                            <?= $value->email; ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                                                            <button type="submit" name="borrar" value="<?= $value->id; ?>" class="btn btn-danger">Borrar Empleado</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <center>
                                                            <button class="btn btn-warning btn-xs" type="button" data-toggle="modal" href="#A<?= $value->id; ?>"><i class="fa fa-pencil"></i> <span class="bold"></span>
                                                            </button>
                                                            <button class="btn btn-danger btn-xs" type="button" data-toggle="modal" href="#E<?= $value->id; ?>"><i class="fa fa-times"></i> <span class="bold"></span></button> 
                                                        </center>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="footer">
            <div>
                <strong>Guillermo Landazuri Amaya</strong>
            </div>
        </div>
    </div>
</div>
<!-- Mainly scripts -->
<script src="<?= base_url()?>PLANTILLA/js/jquery-3.1.1.min.js"></script>
<script src="<?= base_url()?>PLANTILLA/js/popper.min.js"></script>
<script src="<?= base_url()?>PLANTILLA/js/bootstrap.js"></script>
<script src="<?= base_url()?>PLANTILLA/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= base_url()?>PLANTILLA/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="<?= base_url()?>PLANTILLA/js/inspinia.js"></script>
<script src="<?= base_url()?>PLANTILLA/js/plugins/pace/pace.min.js"></script>
<!-- Data Tables -->
<script src="<?= base_url()?>PLANTILLA/js/plugins/dataTables/datatables.min.js"></script>
<script src="<?= base_url()?>PLANTILLA/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
<!-- Sweet alert -->
<script src="<?= base_url()?>PLANTILLA/js/plugins/sweetalert/sweetalert.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url()?>PLANTILLA/js/plugins/iCheck/icheck.min.js"></script>
<!-- Page-Level Scripts -->
<?php 

if (@$mensaje == 'success') {
    echo '
    <script>
    swal({
        title: "¡Buen trabajo!",
        text: "'.$texto.'",
        type: "success"
        });
        </script>';
    }
    if (@$mensaje == 'error') {
        echo '
        <script>
        swal({
            title: "¡ALGO PASO!",
            text: "'.$texto.'",
            type: "error"
            });
            </script>';
        }
        ?>

        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
              document.getElementById("formulario").addEventListener('submit', validarFormulario); 
          });

            function validarFormulario(evento) {
              evento.preventDefault();
              var nombre = document.getElementById('nombre').value;
              var email = document.getElementById('email').value;
              var f = document.getElementById('F').checked;
              var m = document.getElementById('M').checked;
              var area = document.getElementById('area').value;
              //var roles[] = document.getElementById('roles').value;
              var descripcion = document.getElementById('descripcion').value;

              if(nombre == '') {
                alert('No has escrito nada en el nombre');
                return;
            }
            if(email == '') {
                alert('No has escrito nada en el email');
                return;
            }
            if(f == false && m == false) {
                alert('No has seleccionado el sexo');
                return;
            }
            if(area == '') {
                alert('No has seleccionado el area');
                return;
            }
            // if ($('#roles')[0].checked==true) {
            //     alert('No has escrito nada en el nombre');
            //     return;
            // }
            if(descripcion == '') {
                alert('No has escrito nada en la descripcion');
                return;
            }
            this.submit();
        }
    </script>
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
                }
            }
            ]

        });

        });

    </script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

</body>
</html>