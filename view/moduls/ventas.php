<link rel="stylesheet" href="css/boton.css">
<div class= "contenedor">

<div class="container mt-3">
  <h2>Facturas</h2>

  <div class="box-header with-border">
  
    <a href="createVenta">

      <button class="btn btn-primary">
        
        Agregar venta

      </button>

    </a>

    <input type="text" id="buscar" onkeyup="buscar()" placeholder="Buscar en tabla" title="Empieza a escribir para buscar">

  </div>

    
    <div class="table-responsive">
      <table class="table" id="tabla" data-sort="table">
      <thead>
                <tr>
                    <th>Código factura</th>
                    <th>Cliente</th>
                    <th>Vendedor</th>
                    <th>Sucursal</th>
                    <th>SubtTotal</th>
                    <th>Total</th> 
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                  <?php
                    $item = null;
                    $valor = null;
                    
                    $facturas = ControladorVentas::ctrMostrarVentas($item, $valor);
                    

                    foreach($facturas as $key => $facturas1) { ?>

                    <?php $cliente  = ControllerClient::ctrNameClient($facturas1['idCliente']);
                          $vendedor = ControllerUser::ctrNameUser($facturas1['idEmpleado']);
                          $sucursal = ControllerSucursal::ctrNameSucursal($facturas1['idSucursal']);
                    ?>

                    <tr>

                        <td><?php echo $facturas1['codigo']; ?></td>
                        <td><?php echo $cliente['nomCliente']; ?></td>
                        <td><?php echo $vendedor['nombre']; ?></td>
                        <td><?php echo $sucursal['nombre']; ?></td>
                        <td><?php echo $facturas1['subTotal']; ?></td>
                        <td><?php echo $facturas1['total']; ?></td>
                        <td><?php echo $facturas1['fechaFactura']; ?></td>

                        <td>

                          <div class="btn-group">
                              <button  class="btn btn-warning btnUpdate"><i class="fa fa-pencil"></i></button>
                              
                              <button  class="btn btn-danger btnDelete"><i class="fa fa-times"></i></button>
                          </div>

                        </td>


                    </tr>

                  <?php } ?>


        </tbody>

      </table>
  </div>
</div>

</div>
