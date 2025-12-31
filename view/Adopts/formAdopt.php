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
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../public/css/forms.css" />
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
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
              <li class="nav-item">
                <a
                  class="nav-link nav-underlines mx-2 fw-semibold"
                  href="../../index.html"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link nav-underlines mx-2 fw-semibold"
                  href="../Rescues/formRescues.php"
                  >Reportar Caso</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link nav-underlines mx-2 fw-semibold"
                  href="#"
                  >Adoptar</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link nav-underlines mx-2 fw-semibold"
                  href="../Rescues/listRescues.php"
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
        <div class="col-lg-10">
          <div class="form-container">
            <div class="text-center mb-5">
              <h1 class="fw-bold">
                Formulario de <span class="text-rescue">Adopción</span>
              </h1>
              <p class="text-muted">
                Completa la información del adoptante para formalizar el
                proceso.
              </p>
            </div>

            <form id="form-registro-adopcion" autocomplete="off">
              <h4 class="section-header">1. Mascota a Adoptar</h4>
              <div class="row g-3 mb-4">
                <div class="col-md-12">
                  <label class="form-label fw-bold"
                    >ID del Rescate (Referencia)</label
                  >
                  <input
                    type="number"
                    name="idRescate"
                    class="form-control"
                    required
                    placeholder="Ingrese el código de la mascota"
                  />
                  <div class="form-text text-muted small">
                    Este es el código que vincula la adopción con la mascota
                    rescatada.
                  </div>
                </div>
              </div>

              <h4 class="section-header">2. Datos del Adoptante</h4>
              <div class="row g-3 mb-4">
                <div class="col-md-8">
                  <label class="form-label fw-bold"
                    >Nombre Completo del Adoptante</label
                  >
                  <input
                    type="text"
                    name="nombreAdoptante"
                    class="form-control"
                    required
                    placeholder="Ej. María García"
                  />
                </div>
                <div class="col-md-4">
                  <label class="form-label fw-bold">Teléfono de Contacto</label>
                  <input
                    type="tel"
                    name="telefonoAdoptante"
                    class="form-control"
                    required
                    placeholder="Ej. 943 343 4343"
                  />
                </div>
                <div class="col-md-12">
                  <label class="form-label fw-bold"
                    >Dirección de Domicilio</label
                  >
                  <input
                    type="text"
                    name="direccionAdoptante"
                    class="form-control"
                    required
                    placeholder="Calle, Número, Distrito"
                  />
                </div>
              </div>

              <h4 class="section-header">3. Observaciones</h4>
              <div class="row g-3">
                <div class="col-md-12">
                  <label class="form-label fw-bold">Comentarios o Notas</label>
                  <textarea
                    name="observaciones"
                    class="form-control"
                    rows="3"
                    placeholder="Detalles adicionales sobre la vivienda, familia, etc."
                  ></textarea>
                </div>
              </div>

              <div class="text-center mt-5">
                <button type="submit" class="btn-rescue">
                  <i class="fa-solid fa-heart me-2"></i> Confirmar Adopción
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
