<link rel="stylesheet" href="css/boton.css">

<div class= "contenedor">

<div class="container mt-3">
  <h2>Control de Inventario</h2>

    <!--<button class="btn btn-primary" style="margin:0px, 0px, 100px, 100px !important" data-toggle="modal" data-target="#modalAddUser">
        Agregar Usuario
    </button>-->

    <input style="margin-left: 65%;" type="text" id="buscar" onkeyup="buscar()" placeholder="Buscar en tabla" title="Empieza a escribir para buscar">
  <div class="box-body">
  <table class="table" id="tabla" data-sort="table">
    <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Sucursal</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
                </thead>

                <tbody>

    <?php
    $item = null;
    $valor = null;

    $inventario = ControllerInventario::ctrShowInventario($item, $valor);
    

    foreach($inventario as $key => $inventario1) { ?>
    <tr>

    <?php $sucursal = ControllerSucursal::ctrNameSucursal($inventario1['idSucursal']);
          $producto = ControllerProduct::ctrNameProducts($inventario1['idProducto']);
    ?>

        <td><?php echo $inventario1['codigo']; ?></td>
        <td><?php echo $sucursal['nombre']; ?></td>
        <td><?php echo $producto['nombre']; ?></td>
        <td><?php echo $inventario1['cantidad']; ?></td>


        <td>

          <div class="btn-group">
            <button  class="btn btn-warning btnUpdate btnUpdateInventario" idInventario = <?php echo $inventario1['codigo']; ?>  idProduct = <?php echo $inventario1['idProducto']; ?>
              data-toggle="modal" data-target="#modalUpdateInventario"><i class="fa fa-pencil"></i></button>

              <!--<button  class="btn btn-warning btnUpdateInventario" idInventario = <?php echo $inventario1['codigo']; ?>
              data-toggle="modal" data-target="#modalUpdateInventario"><i class="fa fa-pencil"></i></button>-->

              <button class="btn btn-danger btnDelete btnDeleteInventario" codigoIventarioM = <?php echo $inventario1['codigo']; ?> codigoProductM = <?php echo $inventario1['idProducto']; ?>
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


<!--*************************** MODAL MODIFICAR USUARIO ***************************-->

<div class="modal fade" id="modalUpdateInventario" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content mProducto">


      <form role="form" method="POST" enctype="multipart/form-data">

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <h4 class="modal-title">Ajuste Inventario</h4>
        </div>


        <div class="modal-body">

          <div class="box-body">

            <!--MODIFICAR DE Cedula-->
            <div class = "col-md-4">
                              <div class="form-group">
                                 <label class="col-md-4 control-label">Codigo del producto</label>
                                 
                                    <div class="input-group">
                                          <input type="text" class="form-control input-lg" id="idProducto" name="idProducto" placeholder="Ingresar Codigo" required readonly>
                                          <input type="hidden" id="codigoInventario" name="codigoInventario">
                                    </div>
                                 
                              </div>
                              
                              <div class="form-group">
                                 <label class="col-md-4 control-label">Nombre del producto</label>

                                    <div class="input-group">
                                          
                                          <input type="text" class="form-control input-lg" id="nameProducto" name="nameProducto" placeholder="Ingresar Nombre" required>
                                    </div>

                              </div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label">Marca</label>
                                 
                                    <div class="input-group">
                                          <input type="text" class="form-control input-lg" id="marcaProducto" name="marcaProducto" placeholder="Ingresar la marca" required>
                                    </div>
                                 
                              </div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label">Descripcion</label>

                                    <div class="input-group">
                                          
                                          <textarea class="form-control rounded-0" id="descriptionProducto" name="descriptionProducto" rows="3"></textarea>
                                    </div>

                              </div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label">Cantidad</label>

                                    <div class="input-group">
                                          
                                          <input type="text" class="form-control input-lg" id="cantProducto" name="cantProducto" placeholder="Cantidad Productos" required>
                                    </div>

                              </div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label">Existencia presente</label>

                                    <div class="input-group">
                                          
                                          <input type="text" class="form-control input-lg" id="existProducto" name="existProducto" placeholder="Existencia Actual" required readonly>
                                    </div>

                              </div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label">Minimo en almacen</label>

                                    <div class="input-group">
                                       
                                          <input type="text" class="form-control input-lg" id="minProducto" name="minProducto" placeholder="Minimo" required>
                                    </div>

                              </div>

                              <?php
                                $item = null;
                                $valor = null;
                                    $sucursal = ControllerSucursal::ctrShowSucursal($item, $valor);
                              ?>
                              
                              <div class="form-group">
                                 <label class="col-md-4 control-label">Sucursal</label>

                                    <div class="input-group">
                                          
                                    <select class="form-control input-lg" id="idSucursal" name="idSucursal">

                                    <?php foreach($sucursal as $sucursal1) { ?>
                                                <option value=<?php echo $sucursal1['codigo']?>><?php echo $sucursal1['nombre']?></option>
                                    <?php } ?>

                                    </select>
                                    </div>

                              </div>

                              <?php
                                $item = null;
                                $valor = null;
                                    $unit = ControllerUnit::ctrShowUnit($item, $valor);
                              ?>

                              <div class="form-group">
                                 <label class="col-md-4 control-label">Unidad de medida</label>

                                    <div class="input-group">
                                          
                                    <select class="form-control input-lg" id="unitProducto" name="unitProducto">

                                    <?php foreach($unit as $unit1) { ?>
                                                <option value=<?php echo $unit1['codigo']?>><?php echo $unit1['nombre']?></option>
                                    <?php } ?>

                                    </select>
                                    </div>

                              </div>

                        </div> 

                        <div class = "col-md-4">
                              <div class="form-group">
                                 <label class="col-md-4 control-label">Porcentaje de IVA</label>

                                    <div class="input-group">
                                          
                                          <input type="text" class="form-control input-lg" id="porcProducto" name="porcProducto" placeholder="Ingresar Porcentaje" required>
                                    </div>

                              </div>
                              
                              <div class="form-group">
                                 <label class="col-md-4 control-label">Precio compra</label>

                                    <div class="input-group">
                                          
                                          <input type="text" class="form-control input-lg" id="precioProducto" name="precioProducto" placeholder="Ingresar Precio" required>
                                    </div>

                              </div>
                              <div class="form-group">
                                 <label class="col-md-4 control-label">Ganancia</label>

                                    <div class="input-group">
                                          
                                          <input type="text" class="form-control input-lg" id="gananciaProducto" name="gananciaProducto" placeholder="Ingresar Ganancia" required>
                                    </div>

                              </div>
                              <div class="form-group">
                                 <label class="col-md-4 control-label">%Ganancia</label>

                                    <div class="input-group">
                                          
                                          <input type="text" class="form-control input-lg" id="porGananProducto" name="porGananProducto" placeholder="Ingresar porcentaje" required>
                                    </div>

                              </div>
                              <div class="form-group">
                                 <label class="col-md-4 control-label">Precio IVA</label>

                                    <div class="input-group">
                                          
                                          <input type="text" class="form-control input-lg" id="ivaProducto" name="ivaProducto" placeholder="" required>
                                    </div>

                              </div>
                              

                           
                        </div>
                           
                           
                        <div class = "col-md-4">
                              <div class="form-group">
                                 <label class="col-md-4 control-label">Foto del producto</label>

                                    <input type="file" class="image" name="image">
                                    <img src="view/img/plantilla/userDefault.png" class="img-thumbnail" width="100px">
 
                              </div>

                              <?php
                                $item = null;
                                $valor = null;
                                    $category = ControllerCategories::ctrShowCategories($item, $valor);
                              ?>

                              <div class="form-group">
                                 <label class="col-md-4 control-label">Categorias</label>

                                    <div class="input-group">
                                          
                                          <select class="form-control input-lg" id="cateProducto" name="cateProducto">

                                                <?php foreach($category as $category1) { ?>
                                                            <option value=<?php echo $category1['codigo']?>><?php echo $category1['nombre']?></option>
                                                <?php } ?>

                                          </select>
                                          
                                    </div>

                              </div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label">Observaciones</label>

                                    <div class="input-group">
                                          
                                          <textarea class="form-control rounded-0" id="obsProducto" name="obsProducto" rows="3"></textarea>
                                    </div>

                              </div>
                        </div>

          </div>

        </div>


                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-right cerrarM" data-bs-dismiss="modal">Salir</button>
                                <button type="submit" class="btn btn-success pull-left" data-bs-dismiss="modal">Ajuste Inventario</button>
                              </div>

                              <?php

                                    $updateProducto = new ControllerProduct;
                                    $updateProducto -> ctrUpdateProduct();

                                    $updateInventario = new ControllerInventario;
                                    $updateInventario -> ctrUpdateInventario();
                              ?>

      </form>
    </div>
  </div>
</div>


<?php
  
  

  $deleteInventario = new ControllerInventario;
  $deleteInventario -> ctrDeleteInventario();

  $deleteProduct = new ControllerProduct;
  $deleteProduct -> ctrDeleteProduct();


  

?>

