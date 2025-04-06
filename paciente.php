<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Pacientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
          style="display: block; margin: 20px; font-size: 18px; text-decoration: none; color: #0077b6;">
            
        }
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #023f21;
            color: white;
        }
        button {
            background-color: #0077b6;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Registro de Pacientes</h2>
        <form id="pacienteForm">
            <label>ID Paciente:</label>
            <input type="text" id="id_paciente" required><br><br>
            
            <label>Nombre:</label>
            <input type="text" id="nombre" required><br><br>
            
            <label>Edad:</label>
            <input type="number" id="edad" required><br><br>
            
            <label>Correo:</label>
            <input type="email" id="correo" required><br><br>
            
            <button type="submit">Registrar</button>
        </form>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>ID Paciente</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tablaPacientes">
            <!-- Aquí se agregarán los pacientes -->
        </tbody>
    </table>
    
    <script>
        document.getElementById("pacienteForm").addEventListener("submit", function(event) {
            event.preventDefault();
            
            const idPaciente = document.getElementById("id_paciente").value;
            const nombre = document.getElementById("nombre").value;
            const edad = document.getElementById("edad").value;
            const correo = document.getElementById("correo").value;
            
            const tabla = document.getElementById("tablaPacientes");
            const fila = tabla.insertRow();
            
            fila.innerHTML = `
                <td>${idPaciente}</td>
                <td>${nombre}</td>
                <td>${edad}</td>
                <td>${correo}</td>
                <td><button onclick="eliminarFila(this)">Eliminar</button></td>
            `;
            
            document.getElementById("pacienteForm").reset();
        });
        
        function eliminarFila(boton) {
            const fila = boton.parentNode.parentNode;
            fila.remove();
        }
    </script>
</body>
</html>
<?php
session_start();

// Validar que el usuario esté logueado
if (!isset($_SESSION['usuario_id'])) {
    // Redirigir a la página de login si no está logueado
    header("Location: index.html");
    exit;
}
?>
