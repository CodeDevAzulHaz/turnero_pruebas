<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saludos de Cumpleaños</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
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
	  border-bottom: 2px solid #f9b115;
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
	  border-top: 4px solid #f9b115;
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
		
    #guardarBtn, #enviarBtn {
      margin-top: 10px;
      padding: 7px;
      font-size: 13px;
      background-color: #f9b115;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      width: auto;
      text-align: center;
    }

    #guardarBtn:hover, #enviarBtn:hover {
      background-color: #d6930e;
      transform: translateY(-3px);
    }
	
	.balloons {
      width: 100px;
      height: auto;
      margin: 20px auto;
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
         
		#container-saludo {
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
            <h1>Envío de Saludos de Cumpleaños</h1>
        </div>
    </header>
    <main>
        <div id="menu">
            <a href="dashboard-clientes.html"><button id="atras"><i class="fas fa-arrow-left"></i></button></a>
                <p><strong>Volver al panel</strong></p>
        </div>
            <section id="dashboard">
              <form method="post">
                <div class="widget">
                    <p>Felicitá a tu cliente regalandole un cupón de descuento.</p>        
                        <div class="cuadrados">
                            <div id="cuadrado">
                              <?php 
                                  echo "<pre>";

                                  print_r($data);
                                  echo "</pre>";
                              ?>

                                  <select name="userId" id="userId">
                                    <option value="">Seleccionar usuario</option>

                                      <?php foreach($data['usuarios'] as $user) :?>
                                        <option value="<?php echo $user->id ?>"><?php echo $user->username ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                    <br> <br>

                                    <label>Correo electrónico:</label>
                                    <input type="email" id="email" name="email" placeholder="" >                   
                                    <label>Código de descuento:</label>
                                    <input type="text" id="descuento" name="descuento" placeholder="" maxlength="10" >                                               		
                                    <button id="guardarBtn">Ver</button>
                            </div>
                        </div>
                </div>
                <div class="slide-in-top" id="container-saludo">
                    <div class="header" >
					             <img class="balloons" src="https://www.miturnero.com/image2/globos.png" alt="Globos de cumpleaños">
				                <h1>¡Feliz Cumpleaños <span id="nombre-cliente">[Nombre Cliente]</span>!&nbsp;&nbsp;&nbsp;</h1>
                    </div>
                    <div class="content">
                        
                        <p><span id="codigo_descuento"></span></p>
                    </div>
                    
                </div>	  
	              <button id="enviarBtn" style="display: none;">Enviar</button>
              </form>
            </section>
    </main>
    <!-- ROBOT -->
    <img id="robot" src="image/robot.png" alt="Robot Mascot" >
    <div id="descripcion-robot">
        <strong>SALUDOS DE CUMPLEAÑOS</strong>
            <p>Puedes felicitar a tus clientes regalandole un cupón de descuento.</p>
                <ul>
                    <li>Agregar el código de descuento.</li>
                    <li>Visualiza la vista previa del mail.</li>
                </ul>
		    <p>Una vez completada la configuración, haz clic en "enviar" para guardar los cambios y enviar la confirmación.</p>
    </div>

<script>
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

// Asociar el evento de clic al botón "Guardar"
var guardarBtns = document.querySelectorAll('#guardarBtn');
guardarBtns.forEach(function(btn) {
  btn.addEventListener('click', function() {
    // Validar los campos antes de mostrar el mensaje
    var codigoDescuento = document.getElementById('codigoDescuento').value;

    var esValido = true;



    if ((!codigoDescuento || codigoDescuento.length < 3 || codigoDescuento.length > 10)) {
      esValido = false;
    }


    if (!esValido) {
      alert('Por favor, complete todos los campos correctamente.');
      return;
    }

    // Llamar a la función para mostrar el mensaje
    mostrarMensaje();

    // Actualizar los valores en la maqueta de correo electrónico
    
    document.getElementById('codigo_descuento').innerHTML = codigoDescuento ? '<span id="nombre-empresa">[Nombre empresa]</span> y MiTurnero estamos celebrando tu día. Queremos desearte un cumpleaños lleno de alegría y éxito. <br><br> Como regalo, aquí tienes un código de descuento para tu próxima reserva: <br><br> <div style="display: inline-block; color: #ffffff; text-transform: uppercase; background-color: #ff8c42; border-radius: 4px; padding: 8px 16px; font-weight: bold; width: auto;">' + codigoDescuento + '</div>' : '';
    
    document.querySelector('#container-saludo').style.display = 'block';

    // Llamar a la función para crear el estilo y los keyframes
    crearEstilo();

    // Mostrar el botón "Enviar" una vez que se haya creado la tarjeta de correo
    document.getElementById('enviarBtn').style.display = 'block';
  });
});



// Event listener para el botón "Enviar" fuera de la tarjeta
document.getElementById('enviarBtn').addEventListener('click', function() {
  // Aquí puedes agregar la lógica para enviar el correo electrónico
  // Por ejemplo, podrías llamar a una función que realice la acción de enviar el correo.
  alert('Tarjeta de cumpleaños enviada correctamente.');
});

// Seleccionamos el elemento que queremos estilizar
var containerSaludo = document.getElementById('container-saludo');

// Aplicamos los estilos directamente mediante JavaScript
containerSaludo.style.padding = '30px';
containerSaludo.style.backgroundColor = '#ffffff';
containerSaludo.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.1)';
containerSaludo.style.borderRadius = '8px';
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
