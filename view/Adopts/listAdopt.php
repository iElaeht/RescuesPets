<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Historial de Adopciones | RescuesPets</title>
    <script
      src="https://kit.fontawesome.com/814fc0ff07.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../public/css/ListStyle.css" />
    <style>
      .table-responsive {
        border-radius: 15px;
        overflow: hidden;
      }
      .search-container {
        max-width: 500px;
      }
    </style>
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
                  href="../Adopts/catalogoAdopt.php"
                  >Adoptar</a
                >
              </li>
              <li class="nav-item ms-lg-3">
                <a
                  class="nav-text nav-underlines nav-link mx-2 fw-semibold"
                  href="../../view/Rescues/listRescues.php"
                  >RegistrosPets</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main class="container-fluid px-5 py-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h1 class="fw-bold h2">
            Historial de <span class="text-rescue">Adopciones</span>
          </h1>
          <p class="text-muted">
            Registro detallado de mascotas que encontraron un hogar.
          </p>
        </div>
        <a
          href="../Adopts/catalogoAdopt.php"
          class="btn-rescue text-decoration-none shadow-sm"
        >
          <i class="fa-solid fa-plus me-2"></i>Nueva Adopcion
        </a>
      </div>

      <div class="row mb-4">
        <div class="col-md-6 search-container">
          <div class="input-group shadow-sm">
            <span class="input-group-text bg-white"
              ><i class="fa-solid fa-magnifying-glass text-muted"></i
            ></span>
            <input
              type="text"
              id="txtBuscarAdopt"
              class="form-control border-start-0"
              placeholder="Buscar por DNI o Nombre del adoptante..."
            />
            <button
              class="btn btn-outline-secondary"
              type="button"
              id="btnLimpiarAdopt"
            >
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>
        </div>
      </div>

      <div class="table-responsive shadow-sm bg-white">
        <table
          id="tabla-adopciones"
          class="table table-hover align-middle mb-0"
        >
          <thead class="table-light">
            <tr>
              <th>#ID Adopción</th>
              <th>Mascota (#ID)</th>
              <th>Adoptante / DNI</th>
              <th>Teléfono</th>
              <th>Dirección</th>
              <th>Fecha Adopción</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody id="lista-adopciones"></tbody>
        </table>
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
                <a href="../Adopts/catalogoAdopt.php" class="text-muted text-decoration-none">Adoptar</a>
              </li>
              <li>
                <a href="../Rescues/formRescues.php" class="text-muted text-decoration-none">Reportar</a>
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
        const contenedorTabla = document.querySelector("#lista-adopciones");
        const txtBuscar = document.querySelector("#txtBuscarAdopt");
        const btnLimpiar = document.querySelector("#btnLimpiarAdopt");

        let datosLocal = [];

        function cargarAdopciones() {
          const p = new URLSearchParams();
          p.append("operation", "listar");

          // Apuntamos al controlador de adopciones
          fetch("../../app/controllers/AdoptionController.php", {
            method: "POST",
            body: p,
          })
            .then((res) => res.json())
            .then((datos) => {
              datosLocal = datos;
              renderizarTabla(datosLocal);
            })
            .catch((e) => console.error("Error:", e));
        }

        function renderizarTabla(lista) {
          contenedorTabla.innerHTML = "";

          if (lista.length === 0) {
            contenedorTabla.innerHTML = `<tr><td colspan="7" class="text-center py-4 text-muted">No hay registros de adopción.</td></tr>`;
            return;
          }

          lista.forEach((adopt) => {
            contenedorTabla.innerHTML += `
                        <tr>
                            <td class="fw-bold">#${adopt.idAdopcion}</td>
                            <td>
                                <span class="badge bg-light text-dark border">Mascota #${adopt.idRescate}</span>
                            </td>
                            <td>
                                <div class="fw-bold">${adopt.nombreAdoptante}</div>
                                <small class="text-muted">DNI: ${adopt.dniAdoptante}</small>
                            </td>
                            <td>${adopt.telefonoAdoptante}</td>
                            <td><small>${adopt.direccionAdoptante}</small></td>
                            <td>${adopt.fechaAdopcion}</td>
                            <td class="text-center">
                                <a href="./editAdopt.php?id=${adopt.idAdopcion}" class="btn btn-sm btn-outline-primary border-0" title="Editar">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <button onclick="eliminarAdopcion(${adopt.idAdopcion})" class="btn btn-sm btn-outline-danger border-0" title="Eliminar">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    `;
          });
        }

        // Filtrado en tiempo real
        txtBuscar.addEventListener("input", (e) => {
          const busqueda = e.target.value.toLowerCase();
          const filtrados = datosLocal.filter(
            (item) =>
              item.dniAdoptante.toString().includes(busqueda) ||
              item.nombreAdoptante.toLowerCase().includes(busqueda)
          );
          renderizarTabla(filtrados);
        });

        btnLimpiar.addEventListener("click", () => {
          txtBuscar.value = "";
          renderizarTabla(datosLocal);
        });

        cargarAdopciones();
      });

      function eliminarAdopcion(id) {
        if (
          confirm(
            "¿Estás seguro de eliminar este registro de adopción? Esto no devolverá la mascota al estado disponible automáticamente."
          )
        ) {
          const p = new URLSearchParams();
          p.append("operation", "eliminar");
          p.append("idAdopcion", id);

          fetch("../../app/controllers/AdoptionController.php", {
            method: "POST",
            body: p,
          })
            .then((res) => res.json())
            .then((res) => {
              if (res.status) {
                alert("Registro eliminado.");
                location.reload();
              }
            });
        }
      }
    </script>
  </body>
</html>
