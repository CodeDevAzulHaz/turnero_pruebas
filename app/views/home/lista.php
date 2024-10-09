<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?php echo URLROOT ?>">Sistema de Usuarios</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT ?>/home/lista">Lista de Usuarios</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Lista de Usuarios</h5>
                <a href="/home/crear" class="btn btn-light">
                    <i class="fas fa-plus me-2"></i>Nuevo Usuario
                </a>
            </div>
            <div class="card-body">
                <?php if ($this->session->get('message')): ?>
                    <div class="alert alert-info alert-dismissible fade show">
                        <?php echo $this->session->get('message'); ?>
                        <?php echo $this->session->remove('message'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?> 

                <div class="row mb-3">
                    <div class="col-md-6">
                        <form id="searchForm" method="GET" action="" class="d-flex">
                            <div class="input-group">
                                <input type="search" class="form-control" id="searchInput" name="q" 
                                       value="<?php echo isset($data['termino']) ? $data['termino'] : ''; ?>"
                                       placeholder="Buscar usuarios...">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Ciudad</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php foreach ($data['usuarios'] as $usuario): ?>
                                <tr>
                                    <td><?php echo $usuario->username ?></td>
                                    <td><?php echo $usuario->nombre ?></td>
                                    <td><?php echo $usuario->ciudad ?></td>
                                    <td><?php echo $usuario->telefono ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo URLROOT ?>/home/editar/<?php echo $usuario->id ?>" 
                                               class="btn btn-primary btn-sm" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" 
                                                    class="btn btn-danger btn-sm" 
                                                    onclick="confirmarEliminar(<?php echo $usuario->id ?>)"
                                                    title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                           
                        </tbody>
                    </table>
                </div>
             
            </div>
        </div>

        <!-- Modal de confirmación para eliminar -->
        <div class="modal fade" id="deleteModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirmar Eliminación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        ¿Está seguro de que desea eliminar este usuario?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form id="deleteForm" method="POST" style="display: inline;">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
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
        const searchForm = document.getElementById('searchForm');
        const searchInput = document.getElementById('searchInput');
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        const deleteForm = document.getElementById('deleteForm');

        const debounce = (func, wait) => {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        };

        searchInput.addEventListener('input', debounce(() => {
            searchForm.submit();
        }, 300));

        window.confirmarEliminar = (userId) => {
            deleteForm.action = `<?php echo URLROOT ?>/home/eliminar/${userId}`;
            deleteModal.show();
        };
    });
    </script>
</body>
</html>
