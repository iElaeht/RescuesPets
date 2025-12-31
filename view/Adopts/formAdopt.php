<?php
// Capturamos el ID que viene del catálogo
$idMascota = isset($_GET['id']) ? $_GET['id'] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptar | RescuesPets</title>
    <script src="https://kit.fontawesome.com/814fc0ff07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../public/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

    <header class="bg-white shadow-sm sticky-top">
      <nav class="navbar navbar-expand-lg py-3">
        <div class="container">
          <a class="navbar-brand fw-bold fs-3" href="./index.html">
            Rescues<span class="text-rescue">Pets</span>
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
              <li class="nav-item">
                <a
                  class="nav-text nav-underlines mx-2 fw-semibold"
                  href="./index.html"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-text nav-underlines nav-link mx-2 fw-semibold"
                  href="./view/Rescues/formRescues.php"
                  >Reportar Caso</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-text nav-underlines nav-link mx-2 fw-semibold"
                  href="./view/Adopts/catalogoAdopt.php"
                  >Adoptar</a
                >
              </li>
              <li class="nav-item ms-lg-3">
                <a
                  class="nav-text nav-underlines nav-link mx-2 fw-semibold"
                  href="./view/Rescues/listRescues.php"
                  >RegistrosPets</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card card-custom p-4 p-md-5">
                    <div class="text-center mb-4">
                        <span class="badge bg-danger-subtle text-danger mb-3 px-3 py-2 rounded-pill fw-bold">NUEVA VIDA</span>
                        <h2 class="fw-bold display-6">Formulario de <span class="text-rescue">Adopción</span></h2>
                        <p class="text-muted">Completa los datos para procesar la adopción de la mascota <strong>#<?php echo $idMascota; ?></strong></p>
                    </div>

                    <form id="form-adopcion">
                        <input type="hidden" name="idRescate" value="<?php echo $idMascota; ?>">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre Completo</label>
                            <input type="text" name="nombreAdoptante" class="form-control form-control-lg border-0 bg-light" 
                                   style="border-radius: 15px;" required placeholder="Tu nombre">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">DNI</label>
                                <input type="text" name="dniAdoptante" class="form-control border-0 bg-light" 
                                       style="border-radius: 15px;" maxlength="8" pattern="\d{8}" required placeholder="8 dígitos">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Teléfono</label>
                                <input type="tel" name="telefonoAdoptante" class="form-control border-0 bg-light" 
                                       style="border-radius: 15px;" required placeholder="999 999 999">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Dirección de Domicilio</label>
                            <textarea name="direccionAdoptante" class="form-control border-0 bg-light" 
                                      style="border-radius: 15px;" rows="2" required placeholder="¿Dónde vivirá la mascota?"></textarea>
                        </div>

                        <div class="text-center d-grid">
                            <button type="submit" class="btn-rescue border-0">
                                <i class="fa-solid fa-paw me-2"></i> Confirmar Adopción
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-top py-5 mt-5">
      <div class="container text-center text-md-start">
        <div class="row g-4">
          <div class="col-md-4">
            <h3 class="fw-bold">
              Rescues<span style="color: #e3091b">Pets</span>
            </h3>
            <p class="text-muted">
              Uniendo corazones, salvando vidas desde 2025.
            </p>
          </div>
          <div class="col-md-4 text-center">
            <h5 class="fw-bold mb-3">Navegación</h5>
            <ul class="list-unstyled">
              <li>
                <a
                  href="../../index.html"
                  class="text-muted text-decoration-none"
                  >Inicio</a
                >
              </li>
              <li>
                <a href="#" class="text-muted text-decoration-none">Adoptar</a>
              </li>
              <li>
                <a href="#" class="text-muted text-decoration-none">Reportar</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4 text-md-end">
            <h5 class="fw-bold mb-3">Contacto</h5>
            <div
              class="d-flex justify-content-center justify-content-md-end gap-3 mb-2"
            >
              <a href="#" class="text-dark"
                ><i class="fa-brands fa-facebook fs-4"></i
              ></a>
              <a href="#" class="text-dark"
                ><i class="fa-brands fa-instagram fs-4"></i
              ></a>
            </div>
            <p class="small text-muted">Rescuespets@gmail.com</p>
          </div>
        </div>
        <p class="text-center text-muted small mt-4">
          &copy; 2025 RescuesPets - Todos los derechos reservados.
        </p>
      </div>
    </footer>

    <script>
        document.getElementById('form-adopcion').addEventListener('submit', function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            fd.append('operation', 'registrar');

            fetch('../../controllers/AdoptionController.php', {
                method: 'POST',
                body: fd
            })
            .then(res => res.json())
            .then(data => {
                if(data.status) {
                    alert(data.message);
                    window.location.href = "../../index.html";
                } else {
                    alert("Error: " + data.message);
                }
            })
            .catch(err => console.error("Error:", err));
        });
    </script>
</body>
</html>