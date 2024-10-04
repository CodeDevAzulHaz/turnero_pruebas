<?php
class AdminController {
    private $userModel;
    private $roleModel;
    private $authHelper;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
        $this->authHelper = new AuthHelper();
    }

    public function listUsers() {
        if (!$this->authHelper->hasRole('admin')) {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No autorizado', 'redirect' => '/dashboard']);
            exit;
        }

        $users = $this->userModel->getAllUsers();

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            header('Content-Type: application/json');
            echo json_encode(['users' => $users]);
            exit;
        }

        require 'views/admin/users_list.php';
    }

    public function editUser() {
        if (!$this->authHelper->hasRole('admin')) {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No autorizado']);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $userId = $data['id'] ?? null;
            $newRoleId = $data['role_id'] ?? null;
            $isActive = $data['is_active'] ?? null;

            if ($userId && $newRoleId !== null && $isActive !== null) {
                $this->userModel->updateUserRole($userId, $newRoleId);
                $this->userModel->updateUserStatus($userId, $isActive);
                $response = ['success' => true];
            } else {
                $response = ['error' => 'Datos inválidos'];
            }

            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }

        // Si no es POST, manejar la solicitud GET
        $userId = $_GET['id'] ?? null;
        if ($userId) {
            $user = $this->userModel->getUserById($userId);
            $roles = $this->roleModel->getAllRoles();

            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
                header('Content-Type: application/json');
                echo json_encode(['user' => $user, 'roles' => $roles]);
                exit;
            }

            require 'views/admin/user_edit.php';
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Usuario no especificado']);
            exit;
        }
    }
}

?>