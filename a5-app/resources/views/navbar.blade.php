<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        /* Estilo básico para el navbar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        nav {
            background-color: #333; /* Color de fondo */
            padding: 10px; /* Espaciado */
        }

        nav ul {
            list-style: none; /* Quitar los puntos de la lista */
            margin: 0;
            padding: 0;
            display: flex; /* Disposición horizontal */
        }

        nav ul li {
            margin-right: 20px; /* Espaciado entre elementos */
        }

        nav ul li a {
            color: white; /* Color de los enlaces */
            text-decoration: none; /* Eliminar el subrayado */
            padding: 8px 16px; /* Espaciado alrededor de los enlaces */
            display: block; /* Para que el enlace ocupe todo el espacio del li */
        }

        nav ul li a:hover {
            background-color: #575757; /* Fondo al pasar el mouse */
        }

        /* Responsividad para pantallas pequeñas */
        @media (max-width: 600px) {
            nav ul {
                flex-direction: column; /* Colocar los enlaces en columna */
            }

            nav ul li {
                margin-right: 0; /* Eliminar margen en pantallas pequeñas */
                margin-bottom: 10px; /* Espaciado entre elementos */
            }
        }
    </style>
</head>
<body>

    <!-- Barra de navegación -->
    <nav>
        <ul>
            <li><a href="/register">Register</a></li>
            <li><a href="/">Home</a></li>
            <li><a href="#">Nosotros</a></li>
            <li><a href="#">Contacto</a></li>
        </ul>
    </nav>

</body>
</html>
