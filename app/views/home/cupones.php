<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cupones</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
      text-align: left;
    }

    .widget h1 {
      text-align: center;
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
      border-bottom: 2px solid #39f;
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
      display: flex;
      flex-direction: column;
      align-items: center;
      border-top: 4px solid #39f;
    }

    section h4 {
      text-align: left;
      padding-bottom: 5px;
      border-bottom: 2px solid #ddd;
      text-transform: uppercase;
      margin-bottom: 10px;
    }

    #crear-nuevo {
     margin-bottom: 15px;
     padding: 7px;
     font-size: 13px;
     background-color: #39f;
     color: white;
     border: none;
     border-radius: 4px;
     cursor: pointer;
     transition: background-color 0.3s ease;
     width: auto;
     text-align: center;
   }

   #crear-nuevo:hover {
    background-color: #2e80c4;
    transform: translateY(-3px);
  }

  .cupon {
    margin-bottom: 10px;
    padding: 20px;
    background-color: #f0f0f0;
    border-radius: 5px;
    display: flex;
    align-items: center;
    overflow: auto;
  }

  .cupon-icon {
    font-size: 24px;
    margin-right: 20px;
  }

  .cupon-info {
    flex: 1;
  }

  .cupon-info p {
    margin: 5px 0;
  }

  .cupon-info p:first-child {
    font-weight: bold;
    text-transform: uppercase;
  }

  .cupon-delete {
    margin-left: auto;
    padding: 7px;
    font-size: 13px;
    background-color: #39f;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: auto;
    text-align: center;
  }

  .cupon-delete:hover {
   background-color: #2e80c4;
   transform: translateY(-3px);
 }

 .form-group {
  position: relative;
  margin-bottom: 15px;
}

.form-group label {
 font-weight: bold;
 position: absolute;
 top: 0;
 transform: translateY(-50%);
 left: 10px;
 padding: 0 5px;
 color: #000;
 background-color: white;
 pointer-events: none;
 transition: 0.2s;
}

.form-group input {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.form-group input:focus + label, 
.form-group input:not(:placeholder-shown) + label {
  top: 0;
  font-size: 12px;
  color: #333;
}

button[type="submit"] {
 margin-bottom: 10px;
 padding: 7px;
 font-size: 13px;
 background-color: #39f;
 color: white;
 border: none;
 border-radius: 4px;
 cursor: pointer;
 transition: background-color 0.3s ease;
 width: auto;
 text-align: center;
}

button[type="submit"]:hover {
  background-color: #2e80c4;
  transform: translateY(-3px);
}

#form-nuevo-descuento {
  display: none;
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

@media only screen and (max-width: 400px) {

  body {
   font-size: 11px;
 }

 #robot {
   display: none;
 }
}

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
  <header>
    <div id="header">
      <h1>Cupones</h1>
    </div>
  </header>
  <main>
   <div id="menu">
    <a href="paneldeconfiguraciones.html"><button id="atras"><i class="fas fa-arrow-left"></i></button></a>
    <p><strong> Volver al panel</strong></p>
  </div>
  <section id="dashboard">
    <div class="widget">
      <h4>Crea un Nuevo Cupón</h4>
      <button id="crear-nuevo"><i class="fas fa-plus"></i> Crear Nuevo</button>
      <br>
      <div class="formulario-container" id="formulario-container">
        <form id="form-nuevo-descuento" method="POST">
           <select name="userId" id="userId">
            <option value="">Seleccionar usuario</option>

            <?php foreach($data['usuarios'] as $user) :?>
            <option value="<?php echo $user->id ?>"><?php echo $user->username ?></option>
            <?php endforeach; ?>
          </select>
          <br> <br> 

          <div class="form-group">
            <label for="codigo">Código del Cupón:</label>
            <input type="text" id="codigo" name="codigo" maxlength="10" required>
          </div>
          <div class="form-group">
            <label for="descripcion">Breve Descripción de Beneficios:</label>
            <input type="text" id="descripcion" name="descripcion" maxlength="100" required>
          </div>
          <div class="form-group">
            <label for="porcentaje">Porcentaje de Descuento:</label>
            <input type="number" id="porcentaje" name="porcentaje" required min="1" max="100">
          </div>
          <div class="form-group">
            <label for="usos">Cantidad Máxima de Usos:</label>
            <input type="number" id="usos" name="usos" required min="1">
          </div>
          <div class="form-group">
            <label for="validoHasta">Válido Hasta:</label>
            <input type="date" id="validoHasta" name="validoHasta" required>
          </div>
          <div class="form-group">
            <label for="status">Estado:</label>
            <select id="status" required>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
          </div>
          <button type="submit" id="">Agregar Descuento</button>
        </form>
      </div>
      <div id="cupones-container">

        
        <!-- Aquí se mostrarán los cupones creados -->
      </div>
    </div>
  </section>

 
  <div id="menu">
    
  </div> 
  <section id="dashboard">
    <div class="widget">
      <div class="container">
        <h1>Listado cupones</h1>
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Codigo cupón</th>
                    <th>Breve Descripción de Beneficios</th>
                    <th>Porcentaje de Descuento</th>
                    <th>Cantidad Máxima de Usos</th>
                    <th>Válido Hasta</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
            <?php if ( !empty($data['users_cupones']) ) : ?>
              <?php foreach($data['users_cupones'] as $cupones) : ?>
                  <tr>
                      <td><?php echo $cupones->userId ?></td>
                      <td><?php echo $cupones->codigo ?></td>
                      <td><?php echo $cupones->descripcion ?></td>
                      <td><?php echo $cupones->porcentaje ?></td>
                      <td><?php echo $cupones->usos ?></td>
                      <td><?php echo $cupones->validoHasta ?></td>
                      <td><?php echo $cupones->status ?></td>
                  </tr>
              <?php endforeach; ?>
            <?php endif; ?>

                <!-- Agrega más filas aquí -->
            </tbody>
        </table>
      </div>

            

</body>
      </div>
      <div id="cupones-container">

        
        <!-- Aquí se mostrarán los cupones creados -->
      </div>
    </div>
  </section>
  <!-- ROBOT -->
  <img id="robot" src="image/robot.png" alt="Robot Mascot">
  <div id="descripcion-robot">
    <strong>CUPONES</strong>
    <h3>¡Administra Tus Cupones!</h3>
    <p>Crea y gestiona cupones de descuento para promociones especiales.</p>
    <h3>Crea Cupones Personalizados</h3>
    <ul>
      <li>Crea nuevos cupones con descuentos específicos.</li>
      <li>Define la cantidad de usos y las fechas de validez.</li>
    </ul>
    <h3>Aplicación Automática</h3>
    <ul>
      <li>Los clientes pueden usar los cupones al realizar una reserva.</li>
      <li>El descuento se aplica automáticamente.</li>
    </ul>
    <h3>Seguimiento de Efectividad</h3>
    <ul>
      <li>Controla el uso y la efectividad de los cupones.</li>
      <li>Obtén informes sobre su impacto en las reservas.</li>
    </ul>	
  </div>
</main>
<script>
  document.getElementById('crear-nuevo').addEventListener('click', function() {
    document.getElementById('dashboard').style.display = 'block';
    document.getElementById('form-nuevo-descuento').style.display = 'block';
});


document.getElementById('form-nuevo-descuento').addEventListener('submit', function(event) {


    event.preventDefault();

    var codigoCupon = document.getElementById('codigo').value.trim();
    var descripcionBeneficios = document.getElementById('descripcion').value.trim();
    var porcentajeDescuento = parseInt(document.getElementById('porcentaje').value);
    var cantidadUsos = parseInt(document.getElementById('usos').value);
    var validoHasta = document.getElementById('validoHasta').value;
    var status = document.getElementById('status').value.trim();

    if (!validarFormulario(codigoCupon, descripcionBeneficios, porcentajeDescuento, cantidadUsos, validoHasta, status)) {
        alert('Por favor complete todos los campos correctamente.');
        return;
    }

    event.target.submit();


    // var cupon = {
    //     codigo: codigoCupon,
    //     descripcion: descripcionBeneficios,
    //     porcentaje: porcentajeDescuento,
    //     usos: cantidadUsos,
    //     vencimiento: validoHasta,
    //     status: status
    // };

    // agregarCupon(cupon);
    // limpiarCamposFormulario();
    // document.getElementById('form-nuevo-descuento').style.display = 'none';

});

// function validarFormulario(codigo, descripcion, porcentaje, usos, vencimiento, status) {
//     var regexCodigo = /^[a-zA-Z0-9]+$/;
//     var regexDescripcion = /^[a-zA-Z0-9\s]+$/; // Permite espacios

//     if (!codigo || !descripcion || isNaN(porcentaje) || isNaN(usos) || !vencimiento) {
//         return false;
//     }

//     if (!regexCodigo.test(codigo) || !regexDescripcion.test(descripcion)) {
//         return false;
//     }

//     if (porcentaje < 1 || porcentaje > 100 || usos < 1) {
//         return false;
//     }

//     if (codigo.length < 3 || codigo.length > 10 || descripcion.length < 3 || descripcion.length > 100) {
//         return false;
//     }

//     return true;
// }

// function agregarCupon(cupon) {
//     var cuponesContainer = document.getElementById('cupones-container');

//     var cuponHTML = document.createElement('div');
//     cuponHTML.classList.add('cupon');
//     cuponHTML.innerHTML = `
//         <div class="cupon-icon"><i class="fas fa-tags"></i></div>
//         <div class="cupon-info">
//             <p>${cupon.codigo}</p>
//             <p>${cupon.descripcion}</p>
//             <p style="background-color: #ff8c42; border-radius: 7px; padding: 3px; display: inline-block;">${cupon.porcentaje}%</p>
//             <p style="background-color: #d0d0d0; border-radius: 7px; padding: 3px; display: inline-block;">0 a ${cupon.usos} usos</p>
//             <p style="background-color: #ddd; border-radius: 7px; padding: 3px; display: inline-block;">Vence el ${cupon.vencimiento}</p>
//         </div>
//         <div class="cupon-delete"><i class="fas fa-trash-alt"></i></div>
//     `;

//     alert("Cupón creado con éxito");
//     cuponesContainer.appendChild(cuponHTML);

//     cuponHTML.querySelector('.cupon-delete').addEventListener('click', function() {
//         if (confirm("¿Estás seguro de que deseas eliminar este cupón?")) {
//             cuponesContainer.removeChild(cuponHTML);
//             alert("El cupón ha sido eliminado con éxito");
//         } else {
//             alert("El cupón no se ha eliminado");
//         }
//     });
// }

// function limpiarCamposFormulario() {
//     document.getElementById('codigo').value = '';
//     document.getElementById('descripcion').value = '';
//     document.getElementById('porcentaje').value = '';
//     document.getElementById('usos').value = '';
//     document.getElementById('validoHasta').value = '';
//     document.getElementById('status').value = '';
// }


</script> 
</body>
</html>