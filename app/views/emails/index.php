<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Emails</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.8/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/moment@2.30.1/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/moment@2.30.1/locale/es.js"></script>

<style>
  html,
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(to right, #fdda9b, #ffccab, #fddbba, #c7f0db, #a0ced9);
    color: #333;
    font-size: 13px;
  }

  main {
    padding: 20px;
  }

  .widget {
    width: 100%;
    box-sizing: box;
    display: flex;
    flex-direction: column;
  }

  header {
    color: #000;
    text-align: center;
  }
  
  #menu {
    background-color: transparent;
    display: flex;
    align-items: center;
    text-align: left;
  }
  
  #menu p {
    border-bottom: 2px solid #e55353;
    width: auto;
    font-size: 17px;
  }

  #atras {
    margin-right: 5px;
    padding: 7px;
    font-size: 13px;
    background-color: transparent;
    color: #000;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-align: center;
    border: 2px solid #000;
    border-radius: 3px;
  }

  #atras:hover {
    background-color: #e07e3a;
    border: 2px solid #000;
    transform: translateY(-3px);
    border-radius: 3px;
  }
  
  section {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    text-align: center;
    display: flex; 
    flex-direction: column;
    align-items: center;
    border-top: 4px solid #e55353;
  }

  #cuadrado {
    width: auto;
    height: auto;
    border: 2px solid #ddd;
    border-bottom: 3px solid #ccc;
    border-top: 3px solid #ccc;
    border-radius: 5px;
    display: inline-block;
    text-align: center;
    padding: 20px;
    margin-bottom: 20px;  
  }

  #cuadrado label {
    font-weight: bold;
  }

  #cuadrado input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 10px;
  }

  .password-input {
    position: relative;
  }

  .toggle-password {
    position: absolute;
    top: 40%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
  }

  textarea {
    width: 100%;
    height: 100px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;
    margin-bottom: 10px;
  }

  #guardarBtn, #enviarBtn {
    margin-top: 10px;
    padding: 7px;
    font-size: 13px;
    background-color: #e55353;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: auto;
    text-align: center;
  }

  #guardarBtn:hover, #enviarBtn:hover {
    background-color: #b94040;
    transform: translateY(-3px);
  }

  a {
    text-decoration: none;
  }

  /* ESTILOS PARA EL ROBOT */

  #robot {
    position: fixed;
    right: 20px;
    bottom: 20px;
    width: 70px;
    height: 70px;
    cursor: pointer;
    transition: transform 0.3s ease;
    animation: shake-vertical 2.3s 2 ;
  }

  @keyframes shake-vertical {
    0%,
    100% {
      transform: translateY(0);
    }
    10%,
    30%,
    50%,
    70% {
      transform: translateY(-8px);
    }
    20%,
    40%,
    60% {
      transform: translateY(8px);
    }
    80% {
      transform: translateY(6.4px);
    }
    90% {
      transform: translateY(-6.4px);
    }
  }

  #robot:hover {
    transform: scale(1.1);
  }

  #descripcion-robot {
    position: fixed;
    right: 130px;
    bottom: 20px;
    width: 250px;
    background-color: rgba(0, 0, 0, 0.8);
    color: #fff;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
  }

  #robot:hover + #descripcion-robot {
    opacity: 1;
    pointer-events: auto;
  }

  @media only screen and (max-width: 600px) {

    #container-email {
      width: 100%;
      max-width: 100%;
      box-sizing: border-box;
    }
  } 

  @media only screen and (max-width: 400px) {

    body {
      font-size: 11px;
    }

    #robot {
      display: none;
    }
  }
</style>

</head>

<body>
  <header>
    <div id="header">
      <h1>E-mails</h1>
    </div>
  </header>

  <main>
    <div id="menu">
     <a href="paneldeconfiguraciones.html"><button id="atras"><i class="fas fa-arrow-left"></i></button></a>
     <p><strong>Volver al panel</strong></p>
   </div>
   <section id="dashboard">
    <div class="widget">
      <p>Ingrese el EMAIL y la CONTRASEÑA desde donde se enviarán las confirmaciones de reservas.
       <br>Complete los campos para configurar el envío de emails.</p>


        <div class="cuadrados">
          <div id="cuadrado">
            <form method="post">
              <label>Correo electrónico:</label>
              <input type="email" id="email" name="email" placeholder="">
              <span class="error" id="emailError"></span>
              <label>Contraseña:</label>
              <div style="position: relative;">
                <input type="password" id="password" name="password" placeholder="">
                <span class="toggle-password" onclick="togglePasswordVisibility()">
                  <i class="fas fa-eye-slash" id="eye-icon"></i>
                </span>
              </div>
              <span class="error" id="passwordError"></span>
              <label>Nombre Empresa:</label>
              <input type="text" id="empresa" name="empresa" placeholder="" maxlength="50">
              <span class="error" id="empresaError"></span>
              <label>Texto:</label>
              <textarea id="mensaje" name="mensaje" placeholder="Ingresar datos como cancelaciones, detalles de ubicación, etc." maxlength="150"></textarea>
              <span class="error" id="mensajeError"></span>
              <label>Enlace Web o Redes Sociales:</label>
              <input type="text" id="enlace" name="enlace" placeholder="Ingresar URL">
              <span class="error" id="enlaceError"></span>
              <button type="submit" id="guardarBtn">Crear</button>
            </form>
          </div>
        </div>

      </div>
    </div>

    <div class="slide-in-top" id="container-email">
      <div class="header" style="text-transform: uppercase;">
        <h4>Confirmación de Reserva</h4>
      </div>
      <div class="content">
        <p>Gracias por reservar con nosotros. <br> A continuación, encontrarás los detalles de tu reserva:</p>
        <ul id="list" style="list-style-type: none;">
          <li><strong>Fecha y Hora:</strong> <span id="fecha_reserva"></span></li>
          <li><strong>Servicio:</strong> <span id="servicio"></span></li>
          <li><strong>Lugar:</strong> <span id="empresaDireccion"></span></li>
          <li><strong>Número de reserva:</strong> <span id="numero_reserva"></span></li>
        </ul>
        <p><span id="texto_reserva"></span></p>
      </div>
      <div class="footer">
        <p><strong>¡Te esperamos en <span id="nombre_empresa"></span>!</strong></p>
        <p>Para más información, visítanos en: <a href="#" id="enlace_web" style="color: #007bff; word-wrap: break-word;"></a></p>
      </div>
    </div>
    <button id="enviarBtn" style="display: none;">Confirmar</button>

  </section>
</main>
<!-- ROBOT -->
<img id="robot" src="image/robot.png" alt="Robot Mascot" >
<div id="descripcion-robot">
  <strong>CONFIGURACIÓN DE CORREOS ELECTRÓNICOS</strong>
  <h3>Configuración de Correos:</h3>
  <p>Aquí puedes configurar los detalles del correo electrónico desde donde se enviarán las confirmaciones de reservas.</p>
  <h3>Instrucciones:</h3>
  <ul>
    <li>Ingresa el correo electrónico y nombre de la empresa correspondiente.</li>
    <li>Completa el texto del correo con detalles relevantes como cancelaciones, ubicación, etc.</li>
    <li>Proporciona un enlace web o de redes sociales si es necesario.</li>
  </ul>
  <p>Una vez completada la configuración, haz clic en "Crear" para guardar los cambios y enviar la confirmación.</p>
</div>


<script src="<?php echo URLROOT ?>/js/helper.js"></script>

<script>
  // Función para alternar la visibilidad de la contraseña
  function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var eyeIcon = document.getElementById("eye-icon");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eyeIcon.classList.remove("fas", "fa-eye-slash");
      eyeIcon.classList.add("far", "fa-eye");
    } else {
      passwordInput.type = "password";
      eyeIcon.classList.remove("far", "fa-eye");
      eyeIcon.classList.add("fas", "fa-eye-slash");
    }
  }
  
// Función para mostrar el mensaje como un alert
function mostrarMensaje() {
    alert('Formulario completado correctamente');
}

// Función para crear dinámicamente el estilo y los keyframes
function crearEstilo() {
    // Creamos una etiqueta style para contener nuestros estilos
    var style = document.createElement('style');
    style.type = 'text/css';

    // Definimos los keyframes dinámicamente
    var keyframes = '@keyframes slide-in-top {\
        0% {\
            transform: translateY(-1000px);\
            opacity: 0;\
        }\
        100% {\
            transform: translateY(0);\
            opacity: 1;\
        }\
    }';

    // Agregamos los keyframes a la etiqueta style
    style.appendChild(document.createTextNode(keyframes));

    // Agregamos la etiqueta style al head del documento
    document.head.appendChild(style);
}

// Llamar a la función para crear el estilo y los keyframes
crearEstilo();

// Función para validar el formulario y mostrar un mensaje de alerta genérico si hay errores
function validarFormulario() {
    // Obtener los valores de los campos de entrada
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const empresa = document.getElementById('empresa').value.trim();
    const mensaje = document.getElementById('mensaje').value.trim();
    const enlace = document.getElementById('enlace').value.trim();

    // Validación del email
    const emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;

    // Validar obligatoriedad del nombre de la empresa (mínimo 3, máximo 50 caracteres)
    if (empresa === '' || empresa.length < 3 || empresa.length > 50) {
        return false;
    }

    // Validar longitud del texto del mensaje (mínimo 3, máximo 150 caracteres)
    if (mensaje.length > 0 && (mensaje.length < 3 || mensaje.length > 150)) {
        return false;
    }

    // Verificar si algún campo obligatorio está vacío o no cumple con el formato esperado
    if (email === '' || password === '' || !emailPattern.test(email)) {
        return false;
    }

    // Si todos los campos obligatorios están completos y en el formato correcto, devolvemos true para enviar el formulario
    return true;
}



// Asociar el evento de clic al botón "Guardar"
var guardarBtn = document.getElementById('guardarBtn');
guardarBtn.addEventListener('click', function () {
    // Validar el formulario
    if (validarFormulario()) {
        // Llamar a la función para mostrar el mensaje
        mostrarMensaje();

        // Obtener los valores de los campos de entrada
        var email = document.getElementById('email').value;
		var password = document.getElementById('password').value;
        var empresa = document.getElementById('empresa').value;
        var mensaje = document.getElementById('mensaje').value;
        var enlace = document.getElementById('enlace').value;

        // Actualizar los valores en la maqueta de correo electrónico
        document.getElementById('fecha_reserva').innerText = 'fecha_reserva';
        document.getElementById('servicio').innerText = 'servicio';
        document.getElementById('empresaDireccion').innerText = 'empresaDireccion';
        document.getElementById('numero_reserva').innerText = 'numero_reserva';
        document.getElementById('texto_reserva').innerText = mensaje;
        document.getElementById('nombre_empresa').innerText = empresa;
        document.getElementById('enlace_web').innerText = enlace;
        document.getElementById('enlace_web').href = enlace;
        document.querySelector('#container-email').style.display = 'block';

        // Mostrar el botón "Enviar" una vez que se haya creado la tarjeta de correo
        document.getElementById('enviarBtn').style.display = 'block';
    } else {
        // Mostrar mensaje de alerta si el formulario no es válido
        alert('Por favor complete todos los campos correctamente.');
    }
});

// Event listener para el botón "Enviar" fuera de la tarjeta
document.getElementById('enviarBtn').addEventListener('click', function () {
    // Aquí puedes agregar la lógica para enviar el correo electrónico
    // Por ejemplo, podrías llamar a una función que realice la acción de enviar el correo.
    alert('Tarjeta de reservas confirmada.');
});

// Seleccionamos el elemento que queremos estilizar
var containerSaludo = document.getElementById('container-email');

// Aplicamos los estilos directamente mediante JavaScript
containerSaludo.style.padding = '20px';
containerSaludo.style.backgroundImage = "url('image/mail2.jpg')";
containerSaludo.style.backgroundSize = 'cover';
containerSaludo.style.backgroundPosition = 'center';
containerSaludo.style.border = '2px solid #000';
containerSaludo.style.borderRadius = '30px';
containerSaludo.style.display = 'none'; // Ocultamos el contenedor inicialmente
containerSaludo.style.alignItems = 'center';
containerSaludo.style.width = '500px';
containerSaludo.style.margin = '0 auto';
containerSaludo.style.animation = 'slide-in-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both';

// Definimos los estilos del icono dentro del contenedor
var iconoSaludo = containerSaludo.querySelector('i');
iconoSaludo.style.fontSize = '20px';

</script> 
</body>
</html>