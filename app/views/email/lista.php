<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de MySQL</title>
    <link rel="stylesheet" href="styles.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 800px;
        margin: auto;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background-color: #007BFF;
        color: white;
    }

    th, td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    a {
        color: #007BFF;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

</style>
</head>
<body>
    <div class="container">
        <h1>Registros</h1>
        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Empresa</th>
                    <th>Mensaje</th>
                    <th>Enlace</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
            <?php if ( !empty($data['emails']) ) : ?>
            <?php foreach($data['emails'] as $email) : ?>
                <tr>
                    <td><?php echo $email->email ?></td>
                    <td><?php echo $email->empresa ?></td>
                    <td><?php echo $email->mensaje ?></td>
                    <td><?php echo $email->enlace ?></td>
                    <td><?php echo $email->createdAt ?></td>

                </tr>
            <?php endforeach; ?>
            <?php endif; ?>

                <!-- Agrega más filas aquí -->
            </tbody>
        </table>
    </div>

            <?php if ( !empty($data['email']) ) : ?>
            <?php 
                echo "<pre>";
                print_r($data['email']);
                echo "</pre>";

             ?>
            <?php endif; ?>

</body>
</html>
