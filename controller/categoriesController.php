<?php
    class ControllerCategories{


        static public function ctrNameCategories($codigo){
            
            $respuesta = Categories::mdlNameCategories($codigo);
            return $respuesta;

        }

        /**REGISTRO DE Categorias */
        static public function ctrCreateCategories(){
            if(isset($_POST["idCategories"])){

                if(preg_match('/^[0-9]+$/', $_POST["idCategories"]) && 
                   preg_match('/^[a-zA-ZÑñáéíóúÁÉÍÓÚ ]+$/', $_POST["nameCategories"]) 
                   ){

                    $table = "categoria";

                   

                    $datas = array("codigo" => $_POST["idCategories"], 
                                    "nombre" => $_POST["nameCategories"]
                                    
                                    );

                    $respuesta = Categories::mdlAdd($table, $datas);
                    
                    if($respuesta == "ok"){
                        echo "<script>
                        
                            Swal.fire({
                                title: 'La Categoría se agrego correctamente',
                                icon: 'success',
                            }).then((result) => {
                                window.location = 'categories';
                            })

                        </script>";
                    }


                    

                }else{

                    echo "<script>
                    
                    Swal.fire({
                        title: 'No se puede agregar la Categoría',
                        icon: 'error',
                    }).then((result) => {
                        window.location = 'categories';
                    })
                    </script>";
                }
            }
        }

        static public function ctrShowCategories($item, $valor){

            $tabla = "categoria";
            
            $respuesta = Categories::mdlShow($tabla, $item, $valor);
            return $respuesta;
        }

        static public function ctrUpdateCategories(){

            if(isset($_POST["idCategoriesm"])){

                if(preg_match('/^[0-9]+$/', $_POST["idCategoriesm"])){

                    $table = "categoria";

                    $datas = array("codigo" => $_POST["idCategoriesm"], 
                                    "nombre" => $_POST["nameCategoriesm"]);
                                   

                    $respuesta = Categories::mdlUpdate($table, $datas);
                    
                    if($respuesta == "ok"){
                        echo "<script>
                        
                            Swal.fire({
                                title: 'La Categoría se modifico correctamente',
                                icon: 'success',
                            }).then((result) => {
                                window.location = 'categories';
                            })
                        </script>";
                    }


                    

                }else{

                    echo "<script>
                    
                    Swal.fire({
                        title: 'No se puede modificar la Categoría',
                        icon: 'error',
                    }).then((result) => {
                        window.location = 'categories';
                    })
                    </script>";
                }
            }
        }

        static public function ctrDeleteCategories(){

            if(isset($_GET["codigoE"])){

                $table = "categoria";
                $data = $_GET["codigoE"];
                
                $respuesta = Categories::mdlDelete($table, $data);

                if($respuesta == "ok"){
                    echo "<script>
                    
                        Swal.fire({
                            title: 'La Categoría se eliminó correctamente',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false,
                            icon: 'success',
                        }).then((result) => {
                            if(result.value){
                                window.location = 'categories';
                            }
                            
                        })
                    </script>";

                }
            
            }
               
         }
    }
    


?>  