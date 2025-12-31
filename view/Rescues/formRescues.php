<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RescuesPets | Nuevo Rescate</title>
    <script src="https://kit.fontawesome.com/814fc0ff07.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../public/css/style.css" />
    <style>
        .section-header {
            border-left: 4px solid var(--rescue-red);
            padding-left: 15px;
            margin-top: 30px;
            margin-bottom: 20px;
            font-weight: bold;
            color: var(--rescue-dark);
        }
        .form-control, .form-select {
            border-radius: 10px;
            padding: 10px 15px;
            border: 1px solid #dee2e6;
        }
        .form-control:focus {
            border-color: var(--rescue-red);
            box-shadow: 0 0 0 0.25rem rgba(227, 9, 27, 0.1);
        }
    </style>
</head>
<body class="bg-light">
    <main class="container py-5">
        <div class="card card-custom p-4 p-md-5 mx-auto" style="max-width: 900px">
            <h2 class="fw-bold mb-4 text-center">
                Reportar <span class="text-rescue">Mascota</span>
            </h2>

            <form id="formRescate" autocomplete="off">
                <h5 class="section-header">1. Información del Rescatista</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre del Rescatista</label>
                        <input type="text" name="nombreRescatista" placeholder="Ej. Juan Perez" class="form-control" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">DNI</label>
                        <input type="text" name="DNI" maxlength="8" pattern="\d{8}" placeholder="8 dígitos" class="form-control" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Teléfono</label>
                        <input type="tel" name="telefonoContacto" placeholder="999 999 999" class="form-control" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Ocupación</label>
                        <input type="text" name="ocupacion" placeholder="Ej. Estudiante, Veterinario" class="form-control" required />
                    </div>
                </div>

                <h5 class="section-header">2. Detalles de la Mascota</h5>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Especie</label>
                        <select name="especie" class="form-select" required>
                            <option value="" selected disabled>Seleccione</option>
                            <option value="Perro">Perro</option>
                            <option value="Gato">Gato</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Género</label>
                        <select name="genero" class="form-select" required>
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Raza</label>
                        <input type="text" name="raza" placeholder="Ej. Labrador, Mestizo" class="form-control" required />
                    </div>
                    <div class="col-12">
                        <label class="form-label">Color y Características</label>
                        <input type="text" name="colorCaracteristica" placeholder="Ej. Café con manchas blancas, tamaño mediano" class="form-control" />
                    </div>
                </div>

                <h5 class="section-header">3. Situación del Encuentro</h5>
                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label">Lugar del Rescate</label>
                        <input type="text" name="lugarRescate" placeholder="Dirección o referencia" class="form-control" required />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Fecha Encontrado</label>
                        <input type="date" name="fechaEncontrado" class="form-control" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Estado de Salud</label>
                        <input type="text" name="estadoSalud" placeholder="Ej. Estable, Herido" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Condiciones</label>
                        <input type="text" name="condiciones" placeholder="Ej. Desnutrido, requiere medicación" class="form-control" />
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn-rescue border-0 shadow">
                        <i class="fa-solid fa-cloud-arrow-up me-2"></i>Guardar Registro
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.getElementById("formRescate").addEventListener("submit", function(e) {
            e.preventDefault();
            
            if(confirm("¿Los datos ingresados son correctos?")) {
                const formData = new FormData(this);
                formData.append("operation", "registrar");

                fetch("../../app/controllers/RescueController.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if(data.status) {
                        alert("¡Registro exitoso! La mascota ya está en el sistema.");
                        this.reset(); // Limpia el formulario
                        window.location.href = "./listRescues.php"; // Te lleva a ver la lista
                    } else {
                        alert("Error al registrar: " + data.message);
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Ocurrió un error en la conexión.");
                });
            }
        });
    </script>
</body>
</html>