<?php
// Capturamos el ID que viene del catálogo
$idMascota = isset($_GET['id']) ? $_GET['id'] : '';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adoptar | RescuesPets</title>
    <script
      src="https://kit.fontawesome.com/814fc0ff07.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../../public/css/forms.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <main class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card card-custom p-4 p-md-5">
            <div class="text-center mb-4">
              <span
                class="badge bg-danger-subtle text-danger mb-3 px-3 py-2 rounded-pill fw-bold"
                >NUEVA VIDA</span
              >
              <h2 class="fw-bold display-6">
                Formulario de <span class="text-rescue">Adopción</span>
              </h2>
              <p class="text-muted">
                Completa los datos para procesar la adopción de la mascota
                <strong>#<?php echo $idMascota; ?></strong>
              </p>
            </div>

            <form id="form-adopcion">
              <input
                type="hidden"
                name="idRescate"
                value="<?php echo $idMascota; ?>"
              />

              <div class="mb-3">
                <label class="form-label fw-bold">Nombre Completo</label>
                <input
                  type="text"
                  name="nombreAdoptante"
                  class="form-control form-control-lg border-0 bg-light"
                  style="border-radius: 15px"
                  required
                  placeholder="Tu nombre"
                />
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label fw-bold">DNI</label>
                  <input
                    type="text"
                    name="dniAdoptante"
                    class="form-control border-0 bg-light"
                    style="border-radius: 15px"
                    maxlength="8"
                    pattern="\d{8}"
                    required
                    placeholder="8 dígitos"
                  />
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Teléfono</label>
                  <input
                    type="tel"
                    name="telefonoAdoptante"
                    class="form-control border-0 bg-light"
                    style="border-radius: 15px"
                    required
                    placeholder="999 999 999"
                  />
                </div>
              </div>

              <div class="mb-4">
                <label class="form-label fw-bold">Dirección de Domicilio</label>
                <textarea
                  name="direccionAdoptante"
                  class="form-control border-0 bg-light"
                  style="border-radius: 15px"
                  rows="2"
                  required
                  placeholder="¿Dónde vivirá la mascota?"
                ></textarea>
              </div>

              <div class="text-center d-grid">
                <button type="submit" class="btn-rescue border-0">
                  <i class="fa-solid fa-paw me-2"></i> Confirmar Adopción
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
    <script>
      document
        .getElementById("form-adopcion")
        .addEventListener("submit", function (e) {
          e.preventDefault();

          // Confirmación nativa antes de procesar
          if (!confirm("¿Estás seguro de confirmar esta adopción?")) return;

          const fd = new FormData(this);
          fd.append("operation", "registrar");

          // IMPORTANTE: Revisa que la ruta al controlador sea la correcta
          // según tu estructura de carpetas
          fetch("../../app/controllers/AdoptionController.php", {
            method: "POST",
            body: fd,
          })
            .then((res) => res.json())
            .then((data) => {
              // Validamos que data y data.status existan
              if (data && data.status) {
                alert("¡Felicidades! " + data.message);
                window.location.href = "../../index.html";
              } else {
                alert(
                  "Atención: " +
                    (data.message || "Error desconocido en el servidor")
                );
              }
            })
            .catch((err) => {
              console.error("Error:", err);
              alert("Hubo un fallo al conectar con el servidor.");
            });
        });
    </script>
  </body>
</html>
