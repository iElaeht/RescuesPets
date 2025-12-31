<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RescuesPets | Editar Registro</title>
    <script src="https://kit.fontawesome.com/814fc0ff07.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../public/css/forms.css" />
</head>
<body>
    <header class="bg-white shadow-sm sticky-top">
        </header>

    <main class="container py-5">
        <div class="form-container mx-auto" style="max-width: 900px">
            <h2 class="fw-bold mb-4 text-center">
                Editar Registro <span class="text-rescue">#<span id="display-id"></span></span>
            </h2>

            <form id="formEditarRescate" autocomplete="off">
                <input type="hidden" name="operation" value="actualizar">
                <input type="hidden" name="idRescate" id="idRescate">

                <h5 class="section-header">1. Información del Rescatista</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre del Rescatista</label>
                        <input type="text" name="nombreRescatista" id="nombreRescatista" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">DNI</label>
                        <input type="text" name="DNI" id="DNI" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Teléfono</label>
                        <input type="text" name="telefonoContacto" id="telefonoContacto" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Ocupación</label>
                        <input type="text" name="ocupacion" id="ocupacion" class="form-control" required>
                    </div>
                </div>

                <h5 class="section-header">2. Detalles de la Mascota</h5>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Especie</label>
                        <select name="especie" id="especie" class="form-select" required>
                            <option value="Perro">Perro</option>
                            <option value="Gato">Gato</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Género</label>
                        <select name="genero" id="genero" class="form-select" required>
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Raza</label>
                        <input type="text" name="raza" id="raza" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Color y Características</label>
                        <input type="text" name="colorCaracteristica" id="colorCaracteristica" class="form-control">
                    </div>
                </div>

                <h5 class="section-header">3. Situación</h5>
                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label">Lugar del Rescate</label>
                        <input type="text" name="lugarRescate" id="lugarRescate" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="fechaEncontrado" id="fechaEncontrado" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Estado de Salud</label>
                        <input type="text" name="estadoSalud" id="estadoSalud" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Condiciones</label>
                        <input type="text" name="condiciones" id="condiciones" class="form-control">
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn-rescue shadow-sm">
                        <i class="fa-solid fa-floppy-disk me-2"></i>Guardar Cambios
                    </button>
                    <a href="./listRescues.php" class="btn btn-link text-muted text-decoration-none ms-3">Cancelar</a>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.getElementById("formEditarRescate");
            const urlParams = new URLSearchParams(window.location.search);
            const idRescate = urlParams.get('id');

            if (!idRescate) {
                window.location.href = "./listRescues.php";
                return;
            }

            // CARGAR DATOS MEDIANTE buscarId
            function cargarDatos() {
                const p = new URLSearchParams();
                p.append("operation", "buscarId");
                p.append("idRescate", idRescate);

                fetch("../../app/controllers/RescueController.php", {
                    method: "POST",
                    body: p
                })
                .then(res => res.json())
                .then(data => {
                    if (data) {
                        // Llenado automático de campos
                        document.getElementById("display-id").innerText = data.idRescate;
                        document.getElementById("idRescate").value = data.idRescate;
                        document.getElementById("nombreRescatista").value = data.nombreRescatista;
                        document.getElementById("DNI").value = data.DNI;
                        document.getElementById("telefonoContacto").value = data.telefonoContacto;
                        document.getElementById("ocupacion").value = data.ocupacion;
                        document.getElementById("especie").value = data.especie;
                        document.getElementById("genero").value = data.genero;
                        document.getElementById("raza").value = data.raza;
                        document.getElementById("colorCaracteristica").value = data.colorCaracteristica;
                        document.getElementById("lugarRescate").value = data.lugarRescate;
                        document.getElementById("fechaEncontrado").value = data.fechaEncontrado;
                        document.getElementById("estadoSalud").value = data.estadoSalud;
                        document.getElementById("condiciones").value = data.condiciones;
                    }
                })
                .catch(e => console.error("Error:", e));
            }

            // GUARDAR CAMBIOS CON VENTANA EMERGENTE ESTILO GOOGLE (NATIVA)
            form.addEventListener("submit", (e) => {
                e.preventDefault();

                if (confirm("¿Estás seguro de que deseas aplicar estos cambios?")) {
                    const fd = new FormData(form);
                    
                    fetch("../../app/controllers/RescueController.php", {
                        method: "POST",
                        body: fd
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.status) {
                            // Ventana emergente de éxito (estilo nativo como pediste)
                            alert("¡Éxito! El registro ha sido actualizado correctamente.");
                            window.location.href = "./listRescues.php";
                        } else {
                            alert("Error al actualizar: " + res.message);
                        }
                    })
                    .catch(e => {
                        console.error(e);
                        alert("Hubo un error en la comunicación con el servidor.");
                    });
                }
            });

            cargarDatos();
        });
    </script>
</body>
</html>