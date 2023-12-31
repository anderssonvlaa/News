<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Noticiero Univo</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">INICIO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">NACIONALES</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">INTERNACIONALES</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">DEPORTE</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">NOTICIAS DE EL SALVADOR</h1>
                    <p class="lead fw-normal text-white-50 mb-0">MANTENTE ACTIVADO DE INFORMACIÓN</p>
                </div>
            </div>
        </header>
        <?php
        include_once('./conf/con.php');
        
        $categoria = "Nacionales"; // Cambiar dependiendo de la categoria
        
        $stmt = $conn->prepare("SELECT * FROM noticias WHERE categoria = ? ORDER BY id DESC LIMIT 4");
        $stmt->execute([$categoria]);
        $noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        
        <!-- Sección de noticias -->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <h3><?php echo $categoria; ?></h3>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php foreach ($noticias as $noticia) { ?>
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Imagen de la noticia -->
                                <img class="card-img-top" src="<?php echo $noticia['imagen']; ?>" alt="..." />
        
                                <!-- Detalles de la noticia -->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Título de la noticia -->
                                        <h5 class="fw-bolder"><?php echo $noticia['titulo']; ?></h5>
        
                                        <!-- Descripción de la noticia -->
                                        <p><?php echo $noticia['descripcion']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>




        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
