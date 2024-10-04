<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Ajustamos la altura al 100% del viewport */
            margin: 0;
            font-family: 'Arial', sans-serif;
			font-size: 13px;
			color: #000;
			background-color: #ccc;
        }

        .email-wrapper {
            width: 100%;
            padding: 20px;
            background-color: #ccc;
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            box-sizing: border-box;
        }

        .logo {
            max-width: 150px;
            max-height: 100px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        h1 {
            color: #000;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #000;
            font-size: 16px;
            line-height: 1.5;
        }

        .button {
            display: inline-block;
            padding: 8px 16px;
            margin-top: 10px;
            background-color: #ff8c42;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .button:hover {
            background-color: #e07e3a;
			transform: translateY(-3px);
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: center;
        }

        .footer a {
            text-decoration: none;
        }
        
        @media only screen and (max-width: 600px) {
            .container {
                padding: 20px;
            }

            .logo {
                max-width: 120px;
                max-height: 80px;
            }

            body {
                font-size: 14px;
            }
        }

        @media only screen and (max-width: 400px) {
            .logo {
                max-width: 100px;
                max-height: 50px;
            }
            body {
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="container">
            <!-- Logo -->
            <img class="logo" src="https://miturnero.com/image2/logoturnero.jpg" alt="Logo de MI TURNERO">
            
            <h1>Mensaje enviado </h1>

            <div class="footer">
                <p>hazelazul34@gmail.com</p>
                <p><?php echo $data['mensaje'] ?> </p><br><br>
                <p><?php echo $data['enlace'] ?></p>

            </div>
        </div>
    </div>
</body>
</html>
