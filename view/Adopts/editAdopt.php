<?php
// Recibimos el ID de la adopción desde la URL (listAdopt.php)
$idAdopcion = isset($_GET['id']) ? $_GET['id'] : '';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RescuesPets | Editar Adopción</title>
    <script
      src="https://kit.fontawesome.com/814fc0ff07.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../public/css/style.css" />
    <link rel="stylesheet" href="../../public/css/forms.css" />
  </head>
  <body>
    <main class="container py-5">
      <div class="form-container mx-auto" style="max-width: 700px">
        <div class="text-center mb-4">
          <h2 class="fw-bold">
            Editar <span class="text-rescue">Adopción</span>
          </h2>
          <p class="text-muted small">
            Actualizando datos del adoptante para el registro
            <strong
              >#<span id="display-id"><?php echo $idAdopcion; ?></span></strong
            >
          </p>
        </div>

        <form id="form-editar-adopcion" autocomplete="off">
          <input type="hidden" name="operation" value="actualizar" />
          <input
            type="hidden"
            name="idAdopcion"
            id="idAdopcion"
            value="<?php echo $idAdopcion; ?>"
          />

          <h5 class="section-header">1. Información del Adoptante</h5>
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label">Nombre Completo</label>
              <input
                type="text"
                name="nombreAdoptante"
                id="nombreAdoptante"
                class="form-control"
                required
              />
            </div>
            <div class="col-md-6">
              <label class="form-label">DNI</label>
              <input
                type="text"
                name="dniAdoptante"
                id="dniAdoptante"
                class="form-control"
                maxlength="8"
                pattern="\d{8}"
                required
              />
            </div>
            <div class="col-md-6">
              <label class="form-label">Teléfono</label>
              <input
                type="tel"
                name="telefonoAdoptante"
                id="telefonoAdoptante"
                class="form-control"
                required
              />
            </div>
          </div>

          <h5 class="section-header mt-4">2. Domicilio</h5>
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label">Dirección de Residencia</label>
              <textarea
                name="direccionAdoptante"
                id="direccionAdoptante"
                class="form-control"
                rows="3"
                required
              ></textarea>
            </div>
          </div>

          <div class="text-center mt-5">
            <button type="submit" class="btn-rescue shadow-sm">
              <i class="fa-solid fa-rotate me-2"></i>Actualizar Registro
            </button>
            <div class="mt-3">
              <a
                href="./listAdopt.php"
                class="text-muted small text-decoration-none"
                >Cancelar y volver</a
              >
            </div>
          </div>
        </form>
      </div>
    </main>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const form = document.getElementById("form-editar-adopcion");
        const idAdopcion = document.getElementById("idAdopcion").value;

        // 1. CARGAR DATOS ACTUALES
        function cargarDatos() {
          const p = new URLSearchParams();
          p.append("operation", "buscarId");
          p.append("idAdopcion", idAdopcion);

          fetch("../../app/controllers/AdoptionController.php", {
            method: "POST",
            body: p,
          })
            .then((res) => res.json())
            .then((data) => {
              if (data) {
                // Rellenamos los campos con los datos de la DB
                document.getElementById("nombreAdoptante").value =
                  data.nombreAdoptante;
                document.getElementById("dniAdoptante").value =
                  data.dniAdoptante;
                document.getElementById("telefonoAdoptante").value =
                  data.telefonoAdoptante;
                document.getElementById("direccionAdoptante").value =
                  data.direccionAdoptante;
              } else {
                alert("No se encontró el registro.");
                window.location.href = "./listAdopt.php";
              }
            })
            .catch((e) => console.error("Error al cargar:", e));
        }

        // 2. ENVIAR ACTUALIZACIÓN
        form.addEventListener("submit", (e) => {
          e.preventDefault();

          if (
            confirm(
              "¿Confirmas que deseas guardar los cambios en esta adopción?"
            )
          ) {
            const fd = new FormData(form);

            fetch("../../app/controllers/AdoptionController.php", {
              method: "POST",
              body: fd,
            })
              .then((res) => res.json())
              .then((data) => {
                if (data && data.status) {
                  alert("¡Éxito! " + data.message);
                  window.location.href = "./listAdopt.php";
                } else {
                  alert("Error: " + (data.message || "No se pudo actualizar."));
                }
              })
              .catch((e) => {
                console.error("Error:", e);
                alert("Error de conexión con el servidor.");
              });
          }
        });

        // Iniciar carga
        if (idAdopcion) cargarDatos();
      });
    </script>
  </body>
</html>
