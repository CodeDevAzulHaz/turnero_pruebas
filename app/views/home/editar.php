<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/home">Sistema de Usuarios</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/usuarios/lista">Lista de Usuarios</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Editar Usuario</h5>
                    </div>
                    <div class="card-body">
                        <?php if ($this->session->get('message')): ?>
                            <div class="alert alert-info alert-dismissible fade show">
                                <?php echo $this->session->get('message'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <form id="editForm" method="POST" action="">
                            <div class="mb-3">
                                <label for="username" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="username" name="username" 
                                       value="<?php echo $data['usuario']['username']; ?>" required>
                                <div class="invalid-feedback" id="usernameError"></div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <div class="form-text">Dejar en blanco para mantener la contraseña actual.</div>
                                <div class="invalid-feedback" id="passwordError"></div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" 
                                       value="<?php echo $data['usuario']['nombre']; ?>" required>
                                <div class="invalid-feedback" id="nombreError"></div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="ciudad" class="form-label">Ciudad</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" 
                                       value="<?php echo $data['usuario']['ciudad']; ?>" required>
                                <div class="invalid-feedback" id="ciudadError"></div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" 
                                       value="<?php echo $data['usuario']['telefono']; ?>" required>
                                <div class="invalid-feedback" id="telefonoError"></div>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Actualizar Usuario
                                </button>
                                <a href="/usuarios/lista" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Volver
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('editForm');
        const inputs = form.querySelectorAll('input');
        
        const validateForm = () => {
            let isValid = true;
            
            inputs.forEach(input => {
                input.classList.remove('is-invalid');
                const feedbackElement = document.getElementById(`${input.id}Error`);
                if (feedbackElement) feedbackElement.textContent = '';
            });

            const username = document.getElementById('username');
            if (username.value.trim().length < 3) {
                username.classList.add('is-invalid');
                document.getElementById('usernameError').textContent = 'El usuario debe tener al menos 3 caracteres';
                isValid = false;
            }

            const password = document.getElementById('password');
            if (password.value && password.value.length < 6) {
                password.classList.add('is-invalid');
                document.getElementById('passwordError').textContent = 'La contraseña debe tener al menos 6 caracteres';
                isValid = false;
            }

            const nombre = document.getElementById('nombre');
            if (nombre.value.trim().length < 2) {
                nombre.classList.add('is-invalid');
                document.getElementById('nombreError').textContent = 'El nombre es requerido';
                isValid = false;
            }

            const telefono = document.getElementById('telefono');
            if (!/^\d{9,}$/.test(telefono.value.trim())) {
                telefono.classList.add('is-invalid');
                document.getElementById('telefonoError').textContent = 'Ingrese un número de teléfono válido';
                isValid = false;
            }

            return isValid;
        };

        form.addEventListener('submit', (e) => {
            if (!validateForm()) {
                e.preventDefault();
            }
        });
    });
    </script>
</body>
</html>
