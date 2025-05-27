<?php
session_start();

// Validación opcional: verificar si hay sesión activa
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

$idUsu = $_SESSION['user_id'];
$nombreUsu = $_SESSION['user_name'];
$rolUsu = $_SESSION['user_rol'];

$form_data = $_SESSION['form_data'] ?? [];
function campo($nombre)
{
    global $form_data;
    return htmlspecialchars($form_data[$nombre] ?? '');
}
function seleccionado($nombre, $valor)
{
    global $form_data;
    return ($form_data[$nombre] ?? '') === $valor ? 'checked' : '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TECNM BIBLIOTECA</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo_inicio.css">
</head>

<style>
    /* Texto del menú */
    .sidebar-dark .nav-item .nav-link span {
        color: #ffffff !important;
        font-weight: 500;
    }

    /* Íconos */
    .sidebar-dark .nav-item .nav-link i {
        color: #d1d3e2 !important;
    }

    /* Hover: cuando pasas el mouse */
    .sidebar-dark .nav-item .nav-link:hover span,
    .sidebar-dark .nav-item .nav-link:hover i {
        color: #DCFFDC !important;
        font-weight: 600;
    }

    /* Activo: menú seleccionado */
    .sidebar-dark .nav-item.active .nav-link span,
    .sidebar-dark .nav-item.active .nav-link i {
        color: #89DD8E !important;
        font-weight: bold;
    }

    .btn-custom-toggle {
        background-color: transparent;
        border: 1.5px solid #597BE1;
        color: #597BE1;
        font-weight: 500;
        transition: all 0.2s ease-in-out;
        border-radius: 8px;
        padding: 6px 18px;
        font-size: 0.95rem;
    }

    .btn-custom-toggle:hover {
        background-color: #e0eaff;
        /* suave, no brillante */
        color: #355ac9;
    }

    .btn-custom-toggle.active {
        background-color: #ffffff;
        color: #597BE1;
        box-shadow: none;
    }
</style>


<body id="page-top">

    <header>
        <img src="img/logo_tecnm.png" id="logo_tecnm">
        <img src="img/logo_Tec.png">
        <h2>INSTITUTO TECNOLOGICO <br>SUPERIOR DE TACAMBARO</h2>
        <div class="header-text">
            <h1>BIBLIOTECA</h1>
        </div>
    </header>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">

                <div class="sidebar-brand-text mx-3"><?php echo $rolUsu ?> <sup>TECNM</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Reportes prestamo</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="prestar_libro.php">
                    <i class="fas fa-fw fa-share-square"></i>
                    <span>Prestar Libro</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                LIBRERÍA
            </div>

            <!-- Nav Item - Agregar Libro -->
            <li class="nav-item ">
                <a class="nav-link" href="agregar_libro.php">
                    <i class="fas fa-fw fa-book-medical"></i>
                    <span>Agregar Libro</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="modificar_libro.php">
                    <i class="fas fa-fw fa-pen-square"></i>
                    <span>Modificar Libro</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <div class="sidebar-heading">
                USUARIOS
            </div>



            <!-- Nav Item - AGREGAR ALUMNO -->
            <li class="nav-item">
                <a class="nav-link" href="form_Registrar_Alumno.php">
                    <i class="fas fa-fw fa-user-ninja"></i>
                    <span>MENU ALUMNOS</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


            <div class="sidebar-image text-center" style="padding-top: 10vh; margin-bottom: 20px;">
                <img src="img/logo_libro.png" alt="Logo Biblioteca" style="width: 20vh; height: auto;">
            </div>

            <footer style="background-color: #1A1A1A; color: #1A1A1A; padding: 10px 0; width: 100%;">
                <div class="text-center">
                    <span>-</span>
                </div>
            </footer>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">




                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $nombreUsu ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->










                <!-- Begin Page Content -->
                <div class="container-fluid">






                    <!-- Paneles necesarios para el registro del libro  -->
                    <div class="container-fluid">





                        <div class="row">

                            <!-- Columna izquierda: Registro de libro -->
                            <div class="col-lg-12 ">



                                <?php

                                if (isset($_GET['success'])) {
                                    echo '<div class="alert alert-success">✅ Libro registrado exitosamente.</div>';
                                }
                                if (isset($_GET['error'])) {
                                    echo '<div class="alert alert-danger">❌ Error al registrar el libro. Inténtelo de nuevo.</div>';
                                }

                                ?>

                                <?php if (isset($_GET['prestamo']) && $_GET['prestamo'] === 'ok'): ?>
                                    <div id="mensajePrestamo" class="alert alert-success">
                                        📚 Libro prestado exitosamente.
                                    </div>
                                <?php endif; ?>



                                <div class="card shadow mb-4 border-left-primary">


                                    <div class="card-header py-3" style="background-color: #e6f0ff;">

                                        <div class="btn-group float-right mb-3" role="group">
                                            <button type="button" class="btn btn-custom-toggle active" id="btnAlumno">Alumno</button>
                                            <button type="button" class="btn btn-custom-toggle" id="btnUsuario">Usuario</button>
                                        </div>

                                        <div class=" d-flex align-items-center mb-0">
                                            <i class="fas fa-handshake fa-2x text-primary mr-3"></i>
                                            <h1 class="h2 text-gray-800 mb-0" style="color: #003366;">Préstamo de Libro</h1>
                                        </div>

                                    </div>

                                    <!-- === Formularios listos === -->


                                    <div class="card-body">




                                        <form method="POST" action="procesar_Prestamo_Libro.php" id="formPrestamoAlumno">
                                            <input type="hidden" name="tipo_prestamo" value="alumno">
                                            <!-- === DATOS DEL ALUMNO === -->
                                            <h5 class="text-center mt-4 mb-3" style="border-bottom:2px solid #9BBCFF;padding-bottom:5px; color: #003366;">
                                                <i class="fas fa-user-graduate fa-2x text-primary mr-3"></i>Datos del Alumno
                                            </h5>



                                            <div class="form-row">

                                                <div class="form-group col-md-8">
                                                    <label for="noControlAlumno">Número de Control</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="noControlAlumno" name="noControlAlumno" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="estadoNoControlAlumno"><i class="fas fa-question-circle text-muted"></i></span>
                                                        </div>
                                                    </div>
                                                    <small class="form-text text-muted">El número de control debe contener únicamente dígitos numéricos.</small>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="estadoAlumno">Estado</label>
                                                    <input type="text" class="form-control" id="estadoAlumno" name="estadoAlumno" readonly>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label for="nombreAlumno">Nombre del Alumno</label>
                                                <input type="text" class="form-control" id="nombreAlumno" name="nombreAlumno" readonly>
                                            </div>


                                            <div class="form-row">

                                                <div class="form-group col-md-7">
                                                    <label for="carreraAlumno">Carrera</label>
                                                    <input type="text" class="form-control" id="carreraAlumno" name="carreraAlumno" readonly>
                                                </div>

                                                <div class="form-group col-md-5">
                                                    <label for="telefonoAlumno">Teléfono</label>
                                                    <input type="text" class="form-control" id="telefonoAlumno" name="telefonoAlumno" readonly>
                                                </div>


                                            </div>



                                            <div id="prestamosActivosAlumno"></div>

                                            <!-- === DATOS DEL LIBRO ALUMNO === -->
                                            <br>
                                            <br><br>
                                            <h5 class="text-center mt-4 mb-3" style="border-bottom:2px solid #9BBCFF;padding-bottom:5px; color: #003366;">
                                                <i class="fas fa-book fa-2x text-primary mr-3"></i>Datos del Libro
                                            </h5>
                                            <div class="form-row align-items-end">

                                                <div class="form-group col-md-4">
                                                    <label for="isbnAlumno">ISBN</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="isbnAlumno" name="isbn" placeholder="Escriba el ISBN">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-secondary btnBuscarLibro" data-tipo="Alumno"><i class="fas fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-8">
                                                    <label for="libroAlumno">Nombre del Libro</label>
                                                    <input type="text" class="form-control" id="libroAlumno" name="libro" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="edicionAlumno">Edición</label>
                                                    <input type="text" class="form-control" id="edicionAlumno" name="edicion" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="paginasAlumno">No. de páginas</label>
                                                    <input type="text" class="form-control" id="paginasAlumno" name="paginas" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="editorialAlumno">Editorial</label>
                                                    <input type="text" class="form-control" id="editorialAlumno" name="editorial" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="disponiblesAlumno">Ejemplares disponibles</label>
                                                    <input type="text" class="form-control" id="disponiblesAlumno" name="disponibles" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="ejemplaresAlumno">Ejemplares reales</label>
                                                    <input type="text" class="form-control" id="ejemplaresAlumno" name="ejemplares" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="prestadosAlumno">Ejemplares prestados</label>
                                                    <input type="text" class="form-control" id="prestadosAlumno" name="prestados" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="autorAlumno">Autor</label>
                                                <input type="text" class="form-control" id="autorAlumno" name="autor" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="lugarEdicionAlumno">Lugar de edición</label>
                                                <input type="text" class="form-control" id="lugarEdicionAlumno" name="lugarEdicion" readonly>
                                            </div>

                                            <button type="submit" class="btn btn-primary mt-3" id="btnEnviarAlumno">
                                                <i class="fas fa-paper-plane mr-1"></i> Registrar Préstamo
                                            </button>
                                        </form>








                                        <form method="POST" action="procesar_Prestamo_Libro_Usuario.php" id="formPrestamoUsuario" style="display:none;">
                                            <input type="hidden" name="tipo_prestamo" value="usuario">
                                            <!-- === DATOS DEL USUARIO (DOCENTE/ADMIN) === -->
                                            <h5 class="text-center mt-4 mb-3" style="border-bottom:2px solid #9BBCFF;padding-bottom:5px; color: #003366;">
                                                <i class="fas fa-user-tie fa-2x text-primary mr-3"></i>Datos del Usuario
                                            </h5>
                                            <div class="form-row">
                                                <div class="form-group col-md-5">
                                                    <label for="apodoUsuario">Apodo</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control text-center" id="apodoUsuario" name="apodoUsuario" maxlength="15" placeholder="Ej. Chepe, Anita, Lalo" required autocomplete="off">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary" type="button" id="btnBuscarUsuarioPorNombre"
                                                                data-toggle="modal" data-target="#modalBuscarUsuario">
                                                                <i class="fas fa-search"></i> Buscar por nombre
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <small class="form-text text-muted">Ingrese un apodo único para el usuario o busque por nombre</small>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="rolUsuario">Rol</label>
                                                    <input type="text" class="form-control" id="rolUsuario" name="rolUsuario" readonly>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="estadoUsuario">Estado</label>
                                                    <input type="text" class="form-control" id="estadoUsuario" name="estadoUsuario" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombreUsuario">Nombre del Usuario</label>
                                                <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" readonly>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="correoUsuario">Correo</label>
                                                    <input type="text" class="form-control" id="correoUsuario" name="correoUsuario" readonly>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="rfcUsuario">RFC</label>
                                                    <input type="text" class="form-control" id="rfcUsuario" name="rfcUsuario" readonly>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="telefonoUsuario">Teléfono</label>
                                                    <input type="text" class="form-control" id="telefonoUsuario" name="telefonoUsuario" readonly>
                                                </div>
                                            </div>

                                            <div id="prestamosActivosUsuario"></div>

                                            <!-- === DATOS DEL LIBRO === -->
                                            <br>
                                            <br><br>
                                            <h5 class="text-center mt-4 mb-3" style="border-bottom:2px solid #9BBCFF;padding-bottom:5px; color: #003366;">
                                                <i class="fas fa-book fa-2x text-primary mr-3"></i>Datos del Libro
                                            </h5>
                                            <div class="form-row align-items-end">
                                                <div class="form-group col-md-4">
                                                    <label for="isbnUsuario">ISBN</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="isbnUsuario" name="isbn" placeholder="Escriba el ISBN">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-secondary btnBuscarLibro" data-tipo="Usuario"><i class="fas fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="libroUsuario">Nombre del Libro</label>
                                                    <input type="text" class="form-control" id="libroUsuario" name="libro" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="edicionUsuario">Edición</label>
                                                    <input type="text" class="form-control" id="edicionUsuario" name="edicion" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="paginasUsuario">No. de páginas</label>
                                                    <input type="text" class="form-control" id="paginasUsuario" name="paginas" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="editorialUsuario">Editorial</label>
                                                    <input type="text" class="form-control" id="editorialUsuario" name="editorial" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="disponiblesUsuario">Ejemplares disponibles</label>
                                                    <input type="text" class="form-control" id="disponiblesUsuario" name="disponibles" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="ejemplaresUsuario">Ejemplares reales</label>
                                                    <input type="text" class="form-control" id="ejemplaresUsuario" name="ejemplares" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="prestadosUsuario">Ejemplares prestados</label>
                                                    <input type="text" class="form-control" id="prestadosUsuario" name="prestados" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="autorUsuario">Autor</label>
                                                <input type="text" class="form-control" id="autorUsuario" name="autor" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="lugarEdicionUsuario">Lugar de edición</label>
                                                <input type="text" class="form-control" id="lugarEdicionUsuario" name="lugarEdicion" readonly>
                                            </div>

                                            <button type="submit" class="btn btn-primary mt-3" id="btnEnviarUsuario">
                                                <i class="fas fa-paper-plane mr-1"></i> Registrar Préstamo
                                            </button>
                                        </form>






                                        <!-- Modal Buscar Usuario (para préstamo a usuarios/docentes/admins) -->
                                        <div class="modal fade" id="modalBuscarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalBuscarUsuarioLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalBuscarUsuarioLabel">Buscar usuario</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input id="inputBuscarUsuario" type="text" class="form-control" autocomplete="new-password" placeholder="Escribe el nombre o apodo...">

                                                        <div id="resultadosUsuarios" class="list-group mt-2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>







                                        <div class="modal fade" id="modalBuscarLibro" tabindex="-1" role="dialog" aria-labelledby="modalBuscarLibroLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalBuscarLibroLabel">Buscar libro</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="text" id="buscarLibroInput" class="form-control mb-3" placeholder="Escribe el nombre del libro..." autocomplete="off">
                                                        <div id="resultadosLibros"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>






                                        <!--Modal -->



                                    </div>





                                </div>


                            </div>




                        </div>
                    </div>















                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <br>
            <!-- Footer -->
            <footer class="sticky-footer" style="background-color: #242424; color: #CFCFCF; padding: 10px 0;">
                <div class="container my-auto text-center">
                    <span>&copy; Biblioteca TECNM Tacámbaro 2025 · Desarrollado por CPA</span>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>



    <script>
        $(document).ready(function() {
            // Alternancia entre formularios
            $('#formPrestamoUsuario').hide();
            $('#formPrestamoAlumno').show();

            // Deshabilitar botones al inicio
            $('#btnEnviarAlumno').prop('disabled', true);
            $('#btnEnviarUsuario').prop('disabled', true);

            $('#btnAlumno').on('click', function() {
                $('#formPrestamoAlumno').show();
                $('#formPrestamoUsuario').hide();
                $(this).addClass('active');
                $('#btnUsuario').removeClass('active');
            });

            $('#btnUsuario').on('click', function() {
                $('#formPrestamoUsuario').show();
                $('#formPrestamoAlumno').hide();
                $(this).addClass('active');
                $('#btnAlumno').removeClass('active');
            });

            // Búsqueda por número de control (Alumno)
            $('#noControlAlumno').on('input', function() {
                const noControl = $(this).val();
                if (/^\d{8,15}$/.test(noControl)) {
                    $.post('buscar_usuario.php', {
                        noControl
                    }, function(res) {
                        if (res.existe) {
                            $('#nombreAlumno').val(res.nombre);
                            $('#carreraAlumno').val(res.carrera);
                            $('#estadoAlumno').val(res.estado);
                            $('#telefonoAlumno').val(formatearTelefono(res.telefono));
                        } else {
                            $('#nombreAlumno, #carreraAlumno, #estadoAlumno, #telefonoAlumno').val('');
                        }
                        obtenerPrestamosAlumno(noControl);
                    }, 'json');
                } else {
                    $('#nombreAlumno, #carreraAlumno, #estadoAlumno, #telefonoAlumno').val('');
                }
            });

            // Búsqueda por apodo (Docente/Admin)
            $('#apodoUsuario').on('input', function() {
                const apodo = $(this).val().trim();
                if (apodo.length >= 3) {
                    $.post('buscar_usuario_docente.php', {
                        apodo
                    }, function(res) {
                        if (res.existe) {
                            $('#nombreUsuario').val(res.nombre);
                            $('#rolUsuario').val(res.rol);
                            $('#estadoUsuario').val('Activo');
                            $('#rfcUsuario').val(res.rfc);
                            $('#telefonoUsuario').val(res.telefono);
                            $('#correoUsuario').val(res.correo);
                        } else {
                            $('#nombreUsuario, #rolUsuario, #estadoUsuario, #rfcUsuario, #telefonoUsuario, #correoUsuario').val('');
                        }
                        obtenerPrestamosUsuario(apodo);
                    }, 'json');
                } else {
                    $('#nombreUsuario, #rolUsuario, #estadoUsuario, #rfcUsuario, #telefonoUsuario, #correoUsuario').val('');
                    $('#prestamosActivosUsuario').html('');
                }
            });


            // ISBN en vivo
            $('#isbnAlumno').on('input', function() {
                buscarLibroPorISBN($(this).val(), 'Alumno');
            });

            $('#isbnUsuario').on('input', function() {
                buscarLibroPorISBN($(this).val(), 'Usuario');
            });

            function buscarLibroPorISBN(isbn, tipo) {
                isbn = isbn.trim();
                const boton = tipo === 'Alumno' ? $('#btnEnviarAlumno') : $('#btnEnviarUsuario');

                if (isbn.length < 10) {
                    limpiarCamposLibro(tipo);
                    boton.prop('disabled', true);
                    return;
                }

                $.post('buscar_libro_por_isbn_prestamo.php', {
                    isbn
                }, function(data) {
                    if (data.existe) {
                        $(`#libro${tipo}`).val(data.titulo);
                        $(`#autor${tipo}`).val(data.autor);
                        $(`#editorial${tipo}`).val(data.editorial || 'N/R');
                        $(`#edicion${tipo}`).val(data.edicion);
                        $(`#paginas${tipo}`).val(data.num_paginas);
                        $(`#lugarEdicion${tipo}`).val(data.lugar_edicion);
                        $(`#ejemplares${tipo}`).val(data.cantidad_real);
                        $(`#prestados${tipo}`).val(data.cantidad_prestada);

                        const disponibles = parseInt(data.cantidad_real) - parseInt(data.cantidad_prestada);
                        $(`#disponibles${tipo}`).val(disponibles);

                        if (disponibles <= 0) {
                            alert('❌ No hay ejemplares disponibles de este libro para préstamo.');
                            boton.prop('disabled', true);
                        } else {
                            boton.prop('disabled', false);
                        }



                    } else {
                        limpiarCamposLibro(tipo);
                        $(`#libro${tipo}`).val('No encontrado');
                        boton.prop('disabled', true);
                    }
                }, 'json');
            }

            function limpiarCamposLibro(tipo) {
                $(`#libro${tipo}, #autor${tipo}, #editorial${tipo}, #edicion${tipo}, #paginas${tipo}, #lugarEdicion${tipo}, #ejemplares${tipo}, #prestados${tipo}, #disponibles${tipo}`).val('');
            }

            // Modal: abrir según tipo de formulario
            let tipoFormularioModal = 'Alumno';
            $('.btnBuscarLibro').on('click', function() {
                tipoFormularioModal = $(this).data('tipo');
                $('#modalBuscarLibro').modal('show');
            });

            $('#buscarLibroInput').on('keyup', function() {
                const texto = $(this).val();
                if (texto.length < 2) {
                    $('#resultadosLibros').html('');
                    return;
                }

                $.post('buscar_libros.php', {
                    consulta: texto
                }, function(data) {
                    let html = '<ul class="list-group">';
                    if (data.length > 0) {
                        data.forEach(libro => {
                            html += `<li class="list-group-item libro-item"
                        data-titulo="${libro.titulo}" data-autor="${libro.nombre_autor}"
                        data-editorial="${libro.nombre_editorial}" data-edicion="${libro.edicion}"
                        data-paginas="${libro.num_paginas}" data-isbn="${libro.ISBN}"
                        data-lugar="${libro.lugar_edicion}" data-real="${libro.cantidad_real}"
                        data-prestados="${libro.cantidad_prestada}">
                        <strong>${libro.titulo}</strong> - ${libro.nombre_autor}</li>`;
                        });
                    } else {
                        html += '<li class="list-group-item text-muted">Sin resultados</li>';
                    }
                    html += '</ul>';
                    $('#resultadosLibros').html(html);
                }, 'json');
            });

            $(document).on('click', '.libro-item', function() {
                const tipo = tipoFormularioModal; // "Alumno" o "Usuario"
                const boton = tipo === 'Alumno' ? $('#btnEnviarAlumno') : $('#btnEnviarUsuario');

                const real = parseInt($(this).data('real')) || 0;
                const prestados = parseInt($(this).data('prestados')) || 0;
                const disponibles = real - prestados;

                $(`#isbn${tipo}`).val($(this).data('isbn'));
                $(`#libro${tipo}`).val($(this).data('titulo'));
                $(`#autor${tipo}`).val($(this).data('autor'));
                $(`#editorial${tipo}`).val($(this).data('editorial'));
                $(`#edicion${tipo}`).val($(this).data('edicion'));
                $(`#paginas${tipo}`).val($(this).data('paginas'));
                $(`#lugarEdicion${tipo}`).val($(this).data('lugar'));
                $(`#ejemplares${tipo}`).val(real);
                $(`#prestados${tipo}`).val(prestados);
                $(`#disponibles${tipo}`).val(disponibles);

                // Si no hay ejemplares disponibles, desactiva botón y alerta
                if (disponibles <= 0) {
                    alert('❌ No hay ejemplares disponibles de este libro para préstamo.');
                    boton.prop('disabled', true);
                } else {
                    boton.prop('disabled', false);
                }

                $('#modalBuscarLibro').modal('hide');
            });


            // Funciones de préstamos activos
            function obtenerPrestamosAlumno(noControl) {
                $.post('prestamos_activos_alumno.php', {
                    noControl
                }, function(prestamos) {
                    renderizarPrestamos(prestamos, '#prestamosActivosAlumno');
                }, 'json');
            }

            function obtenerPrestamosUsuario(apodo) {
                $.post('prestamos_activos_usuarios.php', {
                    apodo
                }, function(prestamos) {
                    renderizarPrestamos(prestamos, '#prestamosActivosUsuario');
                }, 'json');
            }

            function renderizarPrestamos(prestamos, contenedor) {
                let html = '';
                if (prestamos.length > 0) {
                    html += '<div class="mt-3"><h5>📚 Préstamos Activos:</h5><ul class="list-group">';
                    prestamos.forEach(p => {
                        const vencido = p.dias_transcurridos > 2;
                        html += `<li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong>${p.titulo}</strong> (ISBN: ${p.ISBN})<br>
                    Fecha: ${p.fecha_prestamo} | Días: ${p.dias_transcurridos}</span>
                    <span class="badge badge-${vencido ? 'danger' : 'success'} badge-pill">
                        ${vencido ? '❌ Vencido' : '✔️ Vigente'}</span>
                </li>`;
                    });
                    html += '</ul></div>';
                } else {
                    html = '<div class="mt-3 text-success">✔️ No tiene préstamos pendientes.</div>';
                }
                $(contenedor).html(html);
            }

            // Formato de teléfono
            function formatearTelefono(numero) {
                numero = numero.replace(/\D/g, '').substring(0, 10);
                if (numero.length > 6) return numero.replace(/(\d{3})(\d{3})(\d{0,4})/, '$1 $2 $3').trim();
                if (numero.length > 3) return numero.replace(/(\d{3})(\d{0,3})/, '$1 $2');
                return numero;
            }
        });
    </script>








    <!-- Este script es para el modal de búsqueda de usuario -->
    <script>
        $(document).ready(function() {
            // Solo si existe el botón (formulario Usuario activo)
            const btnBuscarUsuario = $('#btnBuscarUsuarioPorNombre');
            if (btnBuscarUsuario.length === 0) return;

            // Elementos del modal
            const inputBuscar = $('#inputBuscarUsuario');
            const resultados = $('#resultadosUsuarios');

            // Elementos del formulario Usuario (ajusta los IDs si cambian)
            const apodoUsuario = $('#apodoUsuario');
            const nombreUsuario = $('#nombreUsuario');
            const telefonoUsuario = $('#telefonoUsuario');
            const correoUsuario = $('#correoUsuario');
            const rfcUsuario = $('#rfcUsuario');
            const rolUsuario = $('#rolUsuario');

            const estadoUsuario = $('#estadoUsuario');

            // Limpia el modal cada vez que se abre
            $('#modalBuscarUsuario').on('show.bs.modal', function() {
                inputBuscar.val('');
                resultados.html('');
                setTimeout(() => inputBuscar.focus(), 400); // Da tiempo a que abra el modal
            });

            // Búsqueda dinámica de usuarios (mínimo 2 caracteres)
            inputBuscar.on('input', function() {
                const texto = inputBuscar.val().trim();
                if (texto.length < 2) {
                    resultados.html('');
                    return;
                }
                $.ajax({
                    url: 'buscar_usuario_por_nombre.php?q=' + encodeURIComponent(texto),
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        resultados.html('');
                        if (!Array.isArray(data) || data.length === 0) {
                            resultados.html('<div class="list-group-item">Sin resultados</div>');
                        } else {
                            data.forEach(usuario => {
                                const item = $('<button type="button" class="list-group-item list-group-item-action"></button>');
                                item.html(`<b>${usuario.nombre}</b> (${usuario.apodo}) - ${usuario.rol}`);
                                item.on('click', function() {
                                    // Llena los datos del formulario Usuario
                                    apodoUsuario.val(usuario.apodo);
                                    nombreUsuario.val(usuario.nombre);
                                    telefonoUsuario.val(formatearTelefono(usuario.telefono));
                                    correoUsuario.val(usuario.correo);
                                    rfcUsuario.val(usuario.rfc || '');
                                    rolUsuario.val(usuario.rol);
                                    estadoUsuario.val('Activo');

                                    // Cierra el modal
                                    $('#modalBuscarUsuario').modal('hide');
                                });
                                resultados.append(item);
                            });
                        }
                    }
                });
            });

            // Re-usa tu función para formatear teléfono
            function formatearTelefono(numero) {
                numero = (numero || '').replace(/\D/g, '');
                numero = numero.substring(0, 10);
                if (numero.length > 6) {
                    return numero.replace(/(\d{3})(\d{3})(\d{0,4})/, '$1 $2 $3').trim();
                } else if (numero.length > 3) {
                    return numero.replace(/(\d{3})(\d{0,3})/, '$1 $2');
                }
                return numero;
            }
        });
    </script>





</body>

</html>