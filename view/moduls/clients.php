<link rel="stylesheet" href="css/boton.css">
<div class= "contenedor">

<div class="container mt-3">
  <h2>Control de Cliente</h2>

    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddClient">
        Agregar Cliente
    </button>
    <input type="text" id="buscar" onkeyup="buscar()" placeholder="Buscar en tabla" title="Empieza a escribir para buscar">
  <div class="box-body">
  <table class="table" id="tabla" data-sort="table">
    <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono Cliente</th>
                    <th>Email</th>
                    <th>Direccion</th>
                    <th>Acciones</th>
                    
                </tr>
                </thead>

                <tbody>

    <?php
    $item = null;
    $valor = null;
    
    $client = ControllerClient::ctrShowClient($item, $valor);
    

    foreach($client as $key => $client1) { ?>
    <tr>

        <td><?php echo $client1['cedula']; ?></td>
        <td><?php echo $client1['nomCliente']; ?></td>
        <td><?php echo $client1['apellidos']; ?></td>
       
        <td><?php echo $client1['telefonoCli']; ?></td>
        <td><?php echo $client1['email']; ?></td>
        <td><?php echo $client1['direccion']; ?></td>
        <td>

          <div class="btn-group">
              <button style="margin: 5px" class="btn btn-warning btnUpdate btnUpdateClient" idClient = <?php echo $client1['cedula']; ?>
              data-toggle="modal" data-target="#modalUpdateClient"><i class="fa fa-pencil"></i></button>
              
              <button style="margin: 5px" class="btn btn-danger btnDelete btnDeleteClient" codigoC = <?php echo $client1['cedula']; ?>
              ><i class="fa fa-times"></i></button>
          </div>

        </td>


    </tr>

    <?php } ?>


    </tbody>

    </table>
  </div>
</div>

</div>


<!--MODAL PARA AGREGAR USUARIO-->


<div class="modal fade" id="modalAddClient" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">


      <form role="form" method="POST" enctype="multipart/form-data">

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <h4 class="modal-title">Agregar Cliente</h4>
        </div>

    </br>
        <div class="modal-body">

          <div class="box-body">

            <!--AGREGAR DE CEDULA-->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" name="cedula" placeholder="Ingresar cédula" required>
                <input type="hidden" id="clientId">
              </div>

            </div>

        <!--AGREGAR DE NOMBRE DE CLIENTE-->
        <div class="form-group">

        <div class="input-group">

          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input type="text" class="form-control input-lg" name="nomCliente" placeholder="Ingresar nombre" required>
          
        </div>

        </div>

            <!--AGREGAR DE APELLIDOS-->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="apellidos" placeholder="Ingresar apellidos " required>

              </div>

            </div>

          

            <!--AGREGAR DE TELEFONO DEL CLIENTE-->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input type="text" class="form-control input-lg" name="telefonoCli" placeholder="Ingresar número de telefono" required>

              </div>

            </div>

            <!--AGREGAR DE EMAIL-->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control input-lg" name="email" placeholder="Ingresar correo electrónico" required>

              </div>

            </div>  


            <div class="form-group">

           <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control input-lg" name="direccion" placeholder="Ingresar dirección " required>

          </div>

          </div> 




          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success pull-right" data-bs-dismiss="modal">Guardar</button>
        </div>

            <?php

              $addClient = new ControllerClient;
              $addClient -> ctrCreateClient();

            ?>

      </form>
    </div>
  </div>
</div>

<!--*************************** MODAL MODIFICAR CLIENTE ***************************-->

<div class="modal fade" id="modalUpdateClient" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">


      <form role="form" method="POST" enctype="multipart/form-data">

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <h4 class="modal-title">Editar Cliente</h4>
        </div>


        <div class="modal-body">

          <div class="box-body">

            <!--MODIFICAR DE CEDULA-->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" id="cedulam" name="cedulam" value="Ingresar Cedula" readonly>
                

              </div>

            </div>

          <!--MODIFCAR DE NOMBRE DE CLIENTE-->
          <div class="form-group">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control input-lg" id="nomClientem" name="nombreClientem" value="Ingresar nombre" required>

          </div>

          </div>




            <!--MODIFICAR DE APELLIDOS-->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="apellidosm" name="apellidosm" value="Ingresar los apellidos" required>

              </div>

            </div>



            <!--MODIFICAR DE TELEFONO-->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="telefonoClim" name="telefonoClim" value="Ingresar número de teléfono" required>

              </div>

            </div>

            <!--MODIFICAR DE EMAIL-->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="emailm" name="emailm" value="Ingresar correo electrónico" required>

              </div>

            </div>

               <!--MODIFICAR DE DIRECCION-->
               <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" id="direccionm" name="direccionm" value="Ingresar dirección" required>

            </div>

            </div>

          </div>

        </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Salir</button>
              <button type="submit" class="btn btn-success pull-right" data-bs-dismiss="modal">Guardar</button>
            </div>

            <?php
                $updateClient = new ControllerClient;
                $updateClient -> ctrUpdateClient();

            ?>

      </form>
    </div>
  </div>
</div>

<?php
  
  $deleteClient = new ControllerClient;

  $deleteClient -> ctrDeleteClient() ;

?>




