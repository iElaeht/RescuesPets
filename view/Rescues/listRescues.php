<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registros RescuesPets</title>
    <script
      src="https://kit.fontawesome.com/814fc0ff07.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../public/css/ListStyle.css" />
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
                  href="../Adopts/formAdopt.php"
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
              <li class="nav-item ms-lg-3">
                <a
                  class="nav-text nav-underlines nav-link mx-2 fw-semibold"
                  href="#"
                  >Iniciar Sesion</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main class="m-5">
      <section>
        <nav class="">
          <ul class="breadcrumb">
            <li class="m-3 fw-bold"><a class="nav_linksbtns" href="#">Reporte Rescate</a></li>
            <li class="m-3 fw-bold"><a class="nav_linksbtns" href="#">Reporte Adopción</a></li>
          </ul>
        </nav>

        <div class="mt-4">
          <h1 class="fw-bold">Reporte de Mascotas Rescatadas</h1>
          <p class="text-muted">
            Aquí podrás visualizar los reportes de cada mascota rescatada por
            buenas personas.
          </p>
          <hr />

          <div class="table-responsive shadow-sm rounded">
            <table id="tabla-mascotas" class="table table-hover align-middle">
              <thead class="text-center table-light">
                <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">DNI</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">Ocupacion</th>
                  <th scope="col">Especie</th>
                  <th scope="col">Genero</th>
                  <th scope="col">Raza</th>
                  <th scope="col">Caracteristica</th>
                  <th scope="col">Lugar Rescate</th>
                  <th scope="col">Fecha Encontrado</th>
                  <th scope="col">Fecha Registrado</th>
                  <th scope="col">Estado Salud</th>
                  <th scope="col">Condiciones</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody id="lista-rescates"></tbody>
            </table>
          </div>
        </div>
      </section>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const contenedorTabla = document.querySelector("#lista-rescates");

        function cargarDatos() {
          const parametros = new URLSearchParams();
          parametros.append("operation", "listar");

          fetch("../../app/controllers/RescueController.php", {
            method: "POST",
            body: parametros,
          })
            .then((respuesta) => respuesta.json())
            .then((datos) => {
              contenedorTabla.innerHTML = ""; // Limpiar antes de cargar

              if (datos.length === 0) {
                contenedorTabla.innerHTML = `<tr><td colspan="10" class="text-center">No hay registros disponibles</td></tr>`;
                return;
              }

              datos.forEach((mascota) => {
                const fila = `
                            <tr class="text-center">
                                <td>${mascota.idRescate}</td>
                                <td>${mascota.nombreRescatista}</td>
                                <td>${mascota.DNI}</td>
                                <td>${mascota.telefonoContacto}</td>
                                <td>${mascota.ocupacion}</td>
                                <td>${mascota.especie}</td>
                                <td>${mascota.genero}</td>
                                <td>${mascota.raza}</td>
                                <td>${mascota.colorCaracteristica}</td>
                                <td>${mascota.lugarRescate}</td>
                                <td>${mascota.fechaEncontrado}</td>
                                <td>${mascota.fechaRegistrado}</td>
                                <td>${mascota.estadoSalud}</td>
                                <td>${mascota.condiciones}</td>
                                <td class="acciones-btn">
                                    <button class="btn btn-sm btn-outline-primary" title="Editar"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        `;
                contenedorTabla.innerHTML += fila;
              });
            })
            .catch((e) => {
              console.error("Error al obtener datos:", e);
              contenedorTabla.innerHTML = `<tr><td colspan="10" class="text-center text-danger">Error al conectar con el servidor</td></tr>`;
            });
        }

        // Iniciar carga
        cargarDatos();
      });
    </script>
  </body>
</html>
