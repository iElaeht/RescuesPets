<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RescuesPets | Reportar Rescate</title>
    <script
      src="https://kit.fontawesome.com/814fc0ff07.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../public/css/styleReport.css" />
  </head>
  <body class="bg-light">
    <header class="bg-white shadow-sm sticky-top">
      <nav class="navbar navbar-expand-lg py-3">
        <div class="container">
          <a class="navbar-brand fw-bold fs-3" href="../../index.html">
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
                  href="./formRescues.php"
                  >Reportar Caso</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2 fw-semibold nav_adopt" href="../Adopts/formAdopt.php"
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
        <div class="col-lg-10">
          <div class="form-container p-4 p-md-5">
            <div class="text-center mb-5">
              <h1 class="fw-bold">
                Formulario de <span style="color: #e3091b">Rescate</span>
              </h1>
              <p class="text-muted">
                Por favor, completa los datos para registrar a la mascota
                encontrada.
              </p>
            </div>

            <form action="procesar_rescate.php" method="POST">
              <!-- SECCIÓN 1: DATOS DEL RESCATISTA -->
              <h4 class="section-title">1. Datos del Rescatista</h4>
              <div class="row g-3 mb-5">
                <div class="col-md-6">
                  <label class="form-label fw-bold">Nombre Completo</label>
                  <input
                    type="text"
                    name="nombreRescatista"
                    class="form-control"
                    placeholder="Ej. Juan Pérez"
                    required
                  />
                </div>
                <div class="col-md-3">
                  <label class="form-label fw-bold">Teléfono de Contacto</label>
                  <input
                    type="tel"
                    name="telefonoContacto"
                    class="form-control"
                    placeholder="Ej. 987654321"
                    required
                  />
                </div>
                <div class="col-md-3">
                  <label class="form-label fw-bold">Ocupación</label>
                  <input
                    type="text"
                    name="ocupacion"
                    class="form-control"
                    placeholder="Ej. Estudiante"
                    required
                  />
                </div>
              </div>

              <!-- SECCIÓN 2: DETALLES DE LA MASCOTA -->
              <h4 class="section-title">2. Datos de la Mascota</h4>
              <div class="row g-3 mb-4">
                <div class="col-md-4">
                  <label class="form-label fw-bold">Especie</label>
                  <select name="especie" class="form-select" required>
                    <option value="" selected disabled>Seleccionar...</option>
                    <option value="Perro">Perro</option>
                    <option value="Gato">Gato</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label fw-bold">Género</label>
                  <select name="genero" class="form-select" required>
                    <option value="" selected disabled>Seleccionar...</option>
                    <option value="Macho">Macho</option>
                    <option value="Hembra">Hembra</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label fw-bold">Raza</label>
                  <input
                    type="text"
                    name="raza"
                    class="form-control"
                    placeholder="Ej. Mestizo"
                    required
                  />
                </div>
                <div class="col-md-12">
                  <label class="form-label fw-bold"
                    >Color / Características distintivas</label
                  >
                  <textarea
                    name="colorCaracteristica"
                    class="form-control"
                    rows="2"
                    placeholder="Mancha blanca en el ojo derecho, pelaje negro..."
                  ></textarea>
                </div>
              </div>

              <!-- SECCIÓN 3: EL RESCATE -->
              <h4 class="section-title">3. Detalles del Encuentro</h4>
              <div class="row g-3 mb-4">
                <div class="col-md-8">
                  <label class="form-label fw-bold"
                    >Lugar de Rescate (Dirección/Referencia)</label
                  >
                  <input
                    type="text"
                    name="lugarRescate"
                    class="form-control"
                    placeholder="Ej. Av. Principal frente al parque"
                    required
                  />
                </div>
                <div class="col-md-4">
                  <label class="form-label fw-bold">Fecha y Hora</label>
                  <input
                    type="datetime-local"
                    name="fechaRescate"
                    class="form-control"
                    required
                  />
                </div>
                <div class="col-md-4">
                  <label class="form-label fw-bold">Estado de Salud</label>
                  <input
                    type="text"
                    name="estadoSalud"
                    class="form-control"
                    placeholder="Ej. Estable, Crítico, Desnutrido"
                  />
                </div>
                <div class="col-md-4">
                  <label class="form-label fw-bold">Condiciones</label>
                  <input
                    type="text"
                    name="condiciones"
                    class="form-control"
                    placeholder="Ej. Atado, Envenenado, Abandonado"
                  />
                </div>
                <div class="col-md-4">
                  <label class="form-label fw-bold">Estado Actual</label>
                  <input
                    type="text"
                    name="estadoActual"
                    class="form-control"
                    placeholder="Ej. En veterinaria, Hogar temporal"
                  />
                </div>
              </div>

              <div class="text-center mt-5">
                <button type="submit" class="btn-send px-5">
                  <i class="fa-solid fa-paper-plane me-2"></i> Enviar Reporte de
                  Rescate
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

    <script src="cdn.jsdelivr.net"></script>
  </body>
</html>
