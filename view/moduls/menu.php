<link rel="stylesheet" type="text/css" href="css/menu.css">
<link href="https://fonts.googleapis.com/css?family=Fredoka+One|Pacifico|Vibur" rel="stylesheet">

<nav class="main-menu">

    <ul class="">

        <?php

        if ($_SESSION["role"] == "Administrador" || $_SESSION["role"] == "Usuario") {

            echo '<li>
                    <a href="inicio">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Inicio
                        </span>
                    </a>
                  
                </li>';
        }

        if ($_SESSION["role"] == "Administrador") {
            echo '<li class="has-subnav">
                    <a href="users">
                        <i class="fa fa-user fa-2x"></i>
                        <span class="nav-text">
                            Usuarios
                        </span>
                    </a>
                    
                </li>';
        }

        if ($_SESSION["role"] == "Administrador") {
            echo '<li class="has-subnav">
                    <a href="categories">
                       <i class="fa fa-th fa-2x"></i>
                        <span class="nav-text">
                            Categorias
                        </span>
                    </a>
                    
                </li>';
        }

        if ($_SESSION["role"] == "Administrador") {
            echo '<li class="has-subnav">
                    <a href="products">
                       <i class="fa fa-desktop fa-2x"></i>
                        <span class="nav-text">
                            Productos
                        </span>
                    </a>
                   
                </li>';
        }



        if ($_SESSION["role"] == "Administrador") {
            echo '<li>
                    <a href="sucursal">
                        <i class="fa fa-building-o fa-2x"></i>
                        <span class="nav-text">
                            Sucursales
                        </span>
                    </a>
                </li>';
        }


        if ($_SESSION["role"] == "Administrador" || $_SESSION["role"] == "Usuario") {
            echo '<li>
                    <a href="clients">
                        <i class="fa fa-users fa-2x"></i>
                        <span class="nav-text">
                           Clientes
                        </span>
                    </a>
                </li>';
        }


        if ($_SESSION["role"] == "Administrador") {
            echo '<li class="has-subnav">
                    <a href="activos">
                        <i class="fa fa-cubes fa-2x"></i>
                        <span class="nav-text">
                            Activos
                        </span>
                    </a>
                    
                </li>';
        }


        if ($_SESSION["role"] == "Administrador") {
            echo '<li class="has-subnav">
                    <a href="inventarios">
                        <i class="fa fa-archive fa-2x"></i>
                        <span class="nav-text">
                            Inventario
                        </span>
                    </a>
                    
                </li>';
        }


        if ($_SESSION["role"] == "Administrador" || $_SESSION["role"] == "Usuario") {
            echo '<li class="has-subnav">
                    <a href="ventas">
                        <i class="fa fa-money fa-2x"></i>
                        <span class="nav-text">
                            Ventas
                        </span>
                    </a>
                    
                </li>';
        }
        ?>
    </ul>

    <?php
    if ($_SESSION["role"] == "Administrador" || $_SESSION["role"] == "Usuario") { 
        //en el archivo de respaldo hacer el llamado al proc y tirar el swwet alert
        echo '<li class="has-subnav">
                    <a href="Respaldo">
                        <i class="fa fa-database fa-2x"></i>
                        <span class="nav-text">
                            Respaldo
                        </span>
                    </a>
                    
                </li>';
    }
    ?>
    

    <ul class="logout" style="margin-bottom: 50px">
        <?php
        if ($_SESSION["role"] == "Administrador" || $_SESSION["role"] == "Usuario") {
            echo '<li>
                        <a href="salir">
                            <i class="fa fa-power-off fa-2x"></i>
                            <span class="nav-text">
                                Salir
                            </span>
                        </a>
                    </li> ';
        }
        ?>

    </ul>

</nav>