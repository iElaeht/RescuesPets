<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RescuesPets | Catálogo de Adopción</title>
    <script
      src="https://kit.fontawesome.com/814fc0ff07.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../../public/css/catalogoAdopt.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
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
      <div class="text-center mb-5">
        <h1 class="fw-bold">
          Nuestros <span class="text-rescue">Rescatados</span>
        </h1>
        <p class="text-muted">
          Ellos están esperando por una familia responsable como la tuya.
        </p>
      </div>

      <div class="row g-4" id="contenedor-catalogo">
        <div class="col-12 text-center py-5">
          <div class="spinner-border text-danger" role="status"></div>
          <p class="mt-2 text-muted">Buscando amiguitos...</p>
        </div>
      </div>
    </main>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const contenedor = document.getElementById("contenedor-catalogo");

        function cargarCatalogo() {
          const fd = new FormData();
          fd.append("operation", "listar");

          // Llamamos a tu controlador
          fetch("../../app/controllers/RescueController.php", {
            method: "POST",
            body: fd,
          })
            .then((res) => res.json())
            .then((datos) => {
              contenedor.innerHTML = ""; // Limpiamos el spinner

              if (datos.length === 0) {
                contenedor.innerHTML = `<h3>No hay mascotas disponibles en este momento.</h3>`;
                return;
              }

              datos.forEach((mascota) => {
                // Creamos la card dinámicamente con los datos de tu BD
                const card = `
              <div class="col-md-4 col-lg-3">
                <div class="card h-100 border-0 shadow-sm custom-card">
                  <img src="./public/images/" class="card-img-top p-3 rounded-5" alt="Mascota">
                  <div class="card-body text-center pt-0">
                    <div class="badge bg-danger-subtle text-danger mb-2 px-3">${
                      mascota.especie
                    }</div>
                    <h5 class="fw-bold mb-1">${mascota.raza}</h5>
                    <p class="text-muted small mb-3">
                      <i class="fa-solid fa-location-dot me-1"></i> ${
                        mascota.lugarRescate
                      } <br>
                      <i class="fa-solid fa-notes-medical me-1"></i> ${
                        mascota.condiciones || "Saludable"
                      } <br>
                      <i class="fa-solid fa-circle-info"></i> ${mascota.colorCaracteristica}
                    </p>
                    <a href="../Adopts/formAdopt.php?id=${
                      mascota.idRescate
                    }" class="btn-rescue w-100 text-decoration-none d-block">
                      Adoptar
                    </a>
                  </div>
                </div>
              </div>
            `;
                contenedor.innerHTML += card;
              });
            })
            .catch((err) => {
              console.error("Error al cargar:", err);
              contenedor.innerHTML = `<p class="text-center text-danger">Error de conexión con el servidor.</p>`;
            });
        }

        cargarCatalogo();
      });
    </script>
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
