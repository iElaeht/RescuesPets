<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RescuesPets | Nuevo Rescate</title>
    <script
      src="https://kit.fontawesome.com/814fc0ff07.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../public/css/forms.css" />
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
                  href="../../index.html"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-text nav-underlines nav-link mx-2 fw-semibold"
                  href="../Rescues/formRescues.php"
                  >Reportar Caso</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-text nav-underlines nav-link mx-2 fw-semibold"
                  href="#"
                  >Adoptar</a
                >
              </li>
              <li class="nav-item ms-lg-3">
                <a
                  class="nav-text nav-underlines nav-link mx-2 fw-semibold"
                  href="./listRescues.php"
                  >RegistrosPets</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main class="container py-5">
      <div class="form-container mx-auto" style="max-width: 900px">
        <h2 class="fw-bold mb-4 text-center">
          Reportar <span class="text-rescue">Mascota</span>
        </h2>

        <form id="formRescate" autocomplete="off">
          <input type="hidden" name="operation" value="registrar" />

          <h5 class="section-header">1. Información del Rescatista</h5>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nombre del Rescatista</label>
              <input
                type="text"
                name="nombreRescatista"
                placeholder="Ej. Juan Perez"
                class="form-control"
                required
              />
            </div>
            <div class="col-md-6">
              <label class="form-label">DNI (Documento Nacional de Identidad)</label>
              <input
                type="text"
                name="DNI"
                placeholder="Ej. 23454564"
                class="form-control"
                required
              />
            </div>
            <div class="col-md-5">
              <label class="form-label">Teléfono</label>
              <input
                type="text"
                name="telefonoContacto"
                placeholder="Ej. 932 943 943"
                class="form-control"
                required
              />
            </div>
            <div class="col-md-4">
              <label class="form-label">Ocupación</label>
              <input
                type="text"
                name="ocupacion"
                placeholder="Ej. Ciudadano, Voluntario"
                class="form-control"
                required
              />
            </div>
          </div>

          <h5 class="section-header">2. Detalles de la Mascota</h5>
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label">Especie</label>
              <select name="especie" class="form-select" required>
                <option value="Perro">Perro</option>
                <option value="Gato">Gato</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Género</label>
              <select name="genero" class="form-select" required>
                <option value="Macho">Macho</option>
                <option value="Hembra">Hembra</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Raza</label>
              <input
                type="text"
                name="raza"
                placeholder="Ej. Mestizo"
                class="form-control"
                required
              />
            </div>
            <div class="col-12">
              <label class="form-label">Color y Características</label>
              <input
                type="text"
                name="colorCaracteristica"
                placeholder="Color , Apariencia , tamaño"
                class="form-control"
              />
            </div>
          </div>

          <h5 class="section-header">3. Situación del Encuentro</h5>
          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label">Lugar del Rescate</label>
              <input
                type="text"
                name="lugarRescate"
                placeholder="Calle, Numero , Distrito"
                class="form-control"
                required
              />
            </div>
            <div class="col-md-4">
              <label class="form-label">Fecha Encontrado</label>
              <input
                type="date"
                name="fechaEncontrado"
                class="form-control"
                required
              />
            </div>
            <div class="col-md-4">
              <label class="form-label">Estado de Salud</label>
              <input
                type="text"
                name="estadoSalud"
                placeholder="Sano , Mal estado"
                class="form-control"
              />
            </div>
            <div class="col-md-4">
              <label class="form-label">Condiciones</label>
              <input
                type="text"
                name="condiciones"
                placeholder="Desnutrido, moribundo"
                class="form-control"
              />
            </div>
          </div>

          <div class="text-center mt-5">
            <button type="submit" class="btn-rescue shadow-sm">
              Guardar Registro
            </button>
          </div>
        </form>
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
  </body>
</html>
