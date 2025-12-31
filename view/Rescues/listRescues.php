<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel Administrativo | RescuesPets</title>
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
      .badge-disponible {
        background-color: #d1e7dd;
        color: #0f5132;
      }
      .badge-adoptado {
        background-color: #f8d7da;
        color: #842029;
      }
      /* Estilo para la barra de búsqueda */
      .search-container {
        max-width: 500px;
      }
      .input-group-text {
        background-color: white;
        border-right: none;
      }
      #txtBuscar {
        border-left: none;
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
                  href="../Adopts/listAdopt.php"
                  >Reports Adoptados</a
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
            Gestión de <span class="text-rescue">Rescates</span>
          </h1>
          <p class="text-muted">
            Control total de ingresos y estados de mascotas.
          </p>
        </div>
        <a
          href="./formRescues.php"
          class="btn-rescue text-decoration-none shadow-sm"
        >
          <i class="fa-solid fa-plus me-2"></i>Nuevo Rescate
        </a>
      </div>

      <div class="row mb-4">
        <div class="col-md-6 search-container">
          <div class="input-group shadow-sm">
            <span class="input-group-text"
              ><i class="fa-solid fa-magnifying-glass text-muted"></i
            ></span>
            <input
              type="text"
              id="txtBuscar"
              class="form-control"
              placeholder="Buscar por #ID o DNI del rescatista..."
            />
            <button
              class="btn btn-outline-secondary"
              type="button"
              id="btnLimpiar"
            >
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>
        </div>
      </div>

      <div class="table-responsive shadow-sm bg-white">
        <table id="tabla-mascotas" class="table table-hover align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th>#ID</th>
              <th>Mascota (Raza/Color)</th>
              <th>Rescatista / DNI</th>
              <th>Ubicación</th>
              <th>Fecha Registro</th>
              <th>Estado Salud</th>
              <th>Disponibilidad</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody id="lista-rescates"></tbody>
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
        const contenedorTabla = document.querySelector("#lista-rescates");
        const txtBuscar = document.querySelector("#txtBuscar");
        const btnLimpiar = document.querySelector("#btnLimpiar");

        let datosLocal = []; // Almacén temporal para filtrar sin ir al servidor

        function cargarDatos() {
          const parametros = new URLSearchParams();
          parametros.append("operation", "listar");

          fetch("../../app/controllers/RescueController.php", {
            method: "POST",
            body: parametros,
          })
            .then((res) => res.json())
            .then((datos) => {
              datosLocal = datos; // Guardamos copia de los datos
              mostrarDatos(datosLocal);
            })
            .catch((e) => console.error("Error:", e));
        }

        function mostrarDatos(lista) {
          contenedorTabla.innerHTML = "";

          if (lista.length === 0) {
            contenedorTabla.innerHTML = `<tr><td colspan="8" class="text-center py-4 text-muted">No se encontraron registros.</td></tr>`;
            return;
          }

          lista.forEach((mascota) => {
            const badgeClass =
              mascota.estado == "1" ? "badge-disponible" : "badge-adoptado";
            const badgeText =
              mascota.estado == "1" ? "Disponible" : "Adoptado/Inactivo";

            contenedorTabla.innerHTML += `
                        <tr>
                            <td class="fw-bold">#${mascota.idRescate}</td>
                            <td>
                                <div class="fw-bold">${mascota.raza}</div>
                                <small class="text-muted">${mascota.colorCaracteristica}</small>
                            </td>
                            <td>
                                <div>${mascota.nombreRescatista}</div>
                                <small class="text-muted"><strong>DNI:</strong> ${mascota.DNI}</small><br>
                                <small class="text-muted"><i class="fa-solid fa-phone me-1 small"></i>${mascota.telefonoContacto}</small>
                            </td>
                            <td><i class="fa-solid fa-location-dot text-danger me-1"></i>${mascota.lugarRescate}</td>
                            <td>${mascota.fechaRegistrado}</td>
                            <td><span class="small">${mascota.estadoSalud}</span></td>
                            <td><span class="badge ${badgeClass}">${badgeText}</span></td>
                            <td class="text-center">
                              <a href="./editRescues.php?id=${mascota.idRescate}" class="btn btn-sm btn-outline-primary border-0" title="Editar">
                                  <i class="fa-solid fa-pen-to-square"></i>
                              </a>
                              <button onclick="eliminarRescate(${mascota.idRescate})" class="btn btn-sm btn-outline-danger border-0" title="Desactivar">
                                  <i class="fa-solid fa-trash-can"></i>
                              </button>
                          </td>
                        </tr>
                    `;
          });
        }

        // LÓGICA DE BÚSQUEDA FILTRADA
        txtBuscar.addEventListener("input", (e) => {
          const busqueda = e.target.value.toLowerCase();

          const resultados = datosLocal.filter((item) => {
            return (
              item.idRescate.toString().includes(busqueda) ||
              item.DNI.toString().includes(busqueda)
            );
          });

          mostrarDatos(resultados);
        });

        // LIMPIAR BÚSQUEDA
        btnLimpiar.addEventListener("click", () => {
          txtBuscar.value = "";
          mostrarDatos(datosLocal);
        });

        // Función global para eliminar
        window.eliminarRescate = (id) => {
          if (
            confirm(
              "¿Estás seguro de desactivar este registro? No aparecerá en el catálogo."
            )
          ) {
            const p = new URLSearchParams();
            p.append("operation", "eliminar");
            p.append("idRescate", id);

            fetch("../../app/controllers/RescueController.php", {
              method: "POST",
              body: p,
            })
              .then((res) => res.json())
              .then((res) => {
                if (res.status) {
                  alert("Registro actualizado correctamente.");
                  cargarDatos();
                }
              });
          }
        };

        cargarDatos();
      });
    </script>
  </body>
</html>
