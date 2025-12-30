<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RescuesPets | Formulario de Adopción</title>

    <script
      src="https://kit.fontawesome.com/814fc0ff07.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../public/css/styleAdopt.css" />
  </head>
  <body>
    <header class="bg-white shadow-sm sticky-top">
      <nav class="navbar navbar-expand-lg py-3">
        <div class="container">
          <a class="navbar-brand fw-bold fs-3" href="../../index.html">
            Rescues<span style="color: #e3091b">Pets</span>
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="nav_bar collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
              <li class="nav-item">
                <a
                  class="nav-link mx-2 fw-semibold nav_home"
                  href="../../index.html"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link mx-2 fw-semibold nav_report"
                  href="../Rescues/formRescues.php"
                  >Reportar Caso</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link mx-2 fw-semibold nav_adopt"
                  href="../Adopts/formAdopt.php"
                  >Adoptar</a
                >
              </li>
              <li class="nav-item ms-lg-3"><a class="nav-link mx-2 fw-semibold" href="#">RegistrosPets</a></li>
              <li class="nav-item ms-lg-3">
                <a class="nav-link mx-2 fw-semibold" href="#">Iniciar Sesión</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <div class="form-card p-4 p-md-5">
            <div class="text-center mb-5">
              <h1 class="fw-bold">
                Proceso de <span style="color: #e3091b">Adopción</span>
              </h1>
              <p class="text-muted">
                Estás a punto de cambiar una vida para siempre.
              </p>
            </div>
            <form
              id="form-adopcion"
              action="../../app/controllers/adoptcontroller.php"
              method="POST"
            >
              <input type="hidden" name="operation" value="registrar" />

              <!-- SECCIÓN 1: VINCULACIÓN -->
              <div class="section-header">
                <h4 class="fw-bold m-0">1. Identificación de la Mascota</h4>
              </div>
              <div class="mb-5">
                <label for="idRescate" class="form-label fw-bold"
                  >Selecciona al rescatado que deseas adoptar</label
                >
                <select
                  name="idRescate"
                  id="idRescate"
                  class="form-select form-select-lg border-2"
                  required
                >
                  <option value="" disabled selected>
                    Cargando mascotas disponibles...
                  </option>
                  <!-- Los datos se cargarán aquí dinámicamente con JS -->
                </select>
                <div class="form-text mt-2">
                  <i class="fa-solid fa-circle-info me-1"></i> Solo aparecen
                  mascotas con estado de salud "Estable".
                </div>
              </div>

              <!-- SECCIÓN 2: DATOS DEL ADOPTANTE -->
              <div class="section-header">
                <h4 class="fw-bold m-0">2. Información del Futuro Adoptante</h4>
              </div>
              <div class="row g-4 mb-5">
                <div class="col-md-8">
                  <label for="nombreAdoptante" class="form-label fw-bold"
                    >Nombre y Apellidos</label
                  >
                  <input
                    type="text"
                    name="nombreAdoptante"
                    id="nombreAdoptante"
                    class="form-control p-3 border-2"
                    placeholder="Ej. Carlos Alberto Ruíz"
                    required
                  />
                </div>
                <div class="col-md-4">
                  <label for="telefonoAdoptante" class="form-label fw-bold"
                    >Teléfono / WhatsApp</label
                  >
                  <input
                    type="tel"
                    name="telefonoAdoptante"
                    id="telefonoAdoptante"
                    class="form-control p-3 border-2"
                    placeholder="987 654 321"
                    required
                  />
                </div>
                <div class="col-md-12">
                  <label for="direccionAdoptante" class="form-label fw-bold"
                    >Dirección de Residencia</label
                  >
                  <input
                    type="text"
                    name="direccionAdoptante"
                    id="direccionAdoptante"
                    class="form-control p-3 border-2"
                    placeholder="Calle, Nro, Distrito (Donde vivirá la mascota)"
                    required
                  />
                </div>
              </div>

              <!-- SECCIÓN 3: COMPROMISO -->
              <div class="section-header">
                <h4 class="fw-bold m-0">3. Detalles del Compromiso</h4>
              </div>
              <div class="row g-4">
                <div class="col-md-6">
                  <label for="fechaAdopcion" class="form-label fw-bold"
                    >Fecha programada</label
                  >
                  <input
                    type="datetime-local"
                    name="fechaAdopcion"
                    id="fechaAdopcion"
                    class="form-control p-3 border-2"
                    required
                  />
                </div>
                <div class="col-md-12">
                  <label for="observaciones" class="form-label fw-bold"
                    >Observaciones adicionales</label
                  >
                  <textarea
                    name="observaciones"
                    id="observaciones"
                    class="form-control p-3 border-2"
                    rows="4"
                    placeholder="Cuéntanos: ¿Tienes otras mascotas? ¿Por qué elegiste a este amiguito?"
                  ></textarea>
                  <div class="form-text">Máximo 200 caracteres permitidos.</div>
                </div>
              </div>

              <!-- BOTÓN DE ENVÍO -->
              <div class="text-center mt-5">
                <button type="submit" class="btn-adopt-action shadow">
                  <i class="fa-solid fa-heart-circle-check me-2"></i> Confirmar
                  Adopción
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
  </body>
</html>
