<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catálogo de Adopción | RescuesPets</title>
    <script
      src="https://kit.fontawesome.com/814fc0ff07.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../public/css/style.css" />
    <style>
      .card-pet {
        transition: transform 0.3s shadow 0.3s;
        border-radius: 20px;
        overflow: hidden;
        border: none;
      }
      .card-pet:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
      }
      .pet-image {
        height: 250px;
        object-fit: cover;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
      }
    </style>
  </head>
  <body>
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
                  class="nav-text nav-underlines mx-2 fw-semibold"
                  href="../../index.html"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-text nav-underlines mx-2 fw-semibold"
                  href="../Adopts/catalogoAdopt.php"
                  >Adoptar</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-text nav-underlines mx-2 fw-semibold"
                  href="../Rescues/formRescues.php"
                  >Reportar</a
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
          Nuestros Amigos <span class="text-rescue">Buscando Hogar</span>
        </h1>
        <p class="text-muted">
          Todos ellos han sido rescatados y esperan por una familia como la
          tuya.
        </p>
      </div>

      <div class="row g-4" id="contenedor-catalogo"></div>
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
                <a href="../../index.html" class="text-muted text-decoration-none"
                  >Inicio</a
                >
              </li>
              <li>
                <a
                  href="../Adopts/catalogoAdopt.php"
                  class="text-muted text-decoration-none"
                  >Adoptar</a
                >
              </li>
              <li>
                <a
                  href="../Rescues/formRescues.php"
                  class="text-muted text-decoration-none"
                  >Reportar</a
                >
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
      document.addEventListener("DOMContentLoaded", () => {
        const contenedor = document.getElementById("contenedor-catalogo");

        function cargarMascotasDisponibles() {
          const p = new URLSearchParams();
          p.append("operation", "listar"); // Usamos el listar de RescueController

          fetch("../../app/controllers/RescueController.php", {
            method: "POST",
            body: p,
          })
            .then((res) => res.json())
            .then((datos) => {
              renderizarCatalogo(datos);
            })
            .catch((e) => console.error("Error al cargar catálogo:", e));
        }

        function renderizarCatalogo(lista) {
          contenedor.innerHTML = "";

          // IMPORTANTE: El controlador debe devolver solo los de estado '1'
          if (lista.length === 0) {
            contenedor.innerHTML = `<div class="col-12 text-center text-muted"><h3>No hay mascotas disponibles por ahora.</h3></div>`;
            return;
          }

          lista.forEach((pet) => {
            contenedor.innerHTML += `
                        <div class="col-md-4 col-lg-3">
                            <div class="card card-pet shadow-sm h-100">
                                <div class="pet-image">
                                    <i class="fa-solid fa-paw fa-4x text-light"></i>
                                    </div>
                                <div class="card-body">
                                    <h5 class="fw-bold mb-1">${pet.raza}</h5>
                                    <p class="text-muted small mb-2">${pet.especie} • ${pet.genero}</p>
                                    <div class="mb-3">
                                        <span class="badge bg-danger-subtle text-danger rounded-pill">${pet.condiciones}</span>
                                    </div>
                                    <div class="d-grid">
                                        <a href="./formAdopt.php?id=${pet.idRescate}" class="btn btn-rescue">
                                            Adoptar a #${pet.idRescate}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
          });
        }

        cargarMascotasDisponibles();
      });
    </script>
  </body>
</html>
