
# Descripcion
Este proyecto consiste en una aplicación web orientada a la empresa Farmacia Brasil, la cual permite gestionar medicamentos por medio de PHP, MySQLi y una base de datos relacional. El sistema cuenta con inicio de sesión para usuarios registrados, registro de medicamentos y visualización pública de los datos almacenados, cumpliendo con los requisitos solicitados en la actividad.

# ¿Cómo manejan la conexión a la BD y qué pasa si algunos de los datos son incorrectos? Justifiquen la manera de validación de la conexión.

La conexión a la base de datos se maneja mediante MySQLi, utilizando el archivo conexion.php, en el cual se establece la conexión con el servidor local, el usuario root, la base de datos farmacia_brasil y el juego de caracteres UTF-8. Si la conexión falla, el sistema detiene su ejecución y muestra un mensaje de error, evitando que se realicen consultas inválidas.

Además, antes de guardar información en la base de datos, se validan los datos recibidos desde los formularios. Por ejemplo, se verifica que los campos obligatorios no estén vacíos, que el precio sea numérico y mayor que cero, y que el stock no sea negativo. Si alguno de los datos es incorrecto, el sistema no permite registrarlo. Esta validación ayuda a mantener la integridad de la información y evita errores en el funcionamiento de la aplicación.

# ¿Cuál es la diferencia entre $_GET y $_POST en PHP? ¿Cuándo es más apropiado usar cada uno? Da un ejemplo real de tu proyecto.

La diferencia principal entre $_GET y $_POST en PHP es la forma en que envían los datos. $_GET envía la información a través de la URL, por lo que los datos pueden verse directamente en la barra de direcciones del navegador. Se usa más en búsquedas, filtros o consultas simples donde no hay información sensible. Por otro lado, $_POST envía la información de manera oculta dentro de la petición HTTP, por lo que es más apropiado cuando se trabaja con formularios que contienen datos confidenciales o extensos.

En nuestro proyecto utilizamos $_POST en el formulario de inicio de sesión y también en el formulario de registro de medicamentos. Esto se hace porque el usuario y la contraseña no deben mostrarse en la URL, y porque los datos del medicamento deben enviarse de forma más segura y ordenada. $_GET podría usarse más adelante si se quisiera hacer una búsqueda de medicamentos por nombre o categoría desde la barra de navegación.

# Tu app va a usarse en una empresa de la zona oriental. ¿Qué riesgos de seguridad identificas en una app web con BD que maneja datos de los usuarios? ¿Cómo los mitigarían?

En una aplicación web con base de datos que maneja datos de usuarios existen varios riesgos de seguridad. Uno de los principales es la inyección SQL, que ocurre cuando una persona intenta introducir código malicioso en los formularios para alterar consultas a la base de datos. Otro riesgo importante es el acceso no autorizado, es decir, que personas no registradas intenten entrar al sistema administrativo. También puede existir robo de credenciales, pérdida de información por errores humanos y exposición de datos sensibles.

Para mitigar estos riesgos, en el sistema se valida la sesión de usuario antes de permitir el acceso al panel administrativo o al formulario de registro. También se validan los datos ingresados en los formularios, reduciendo errores o entradas inválidas. Como mejora de seguridad, el sistema puede implementarse con consultas preparadas, contraseñas cifradas y control de permisos por rol. De esta forma se protege mejor la información de la empresa y de los usuarios.

# Diccionario de datos
### Tabla: usuarios

| Columna  | Tipo de dato | Límite | ¿Es nulo? | Descripción |
|----------|--------------|--------|----------|-------------|
| id       | INT          | —      | No       | Identificador único del usuario |
| usuario  | VARCHAR      | 50     | No       | Nombre de usuario |
| password | VARCHAR      | 255    | No       | Contraseña |
| rol      | VARCHAR      | 20     | No       | Rol del usuario |

### Tabla: medicamentos

| Columna     | Tipo de dato | Límite | ¿Es nulo? | Descripción |
|------------|--------------|--------|----------|-------------|
| id         | INT          | —      | No       | Identificador del medicamento |
| nombre     | VARCHAR      | 100    | No       | Nombre del medicamento |
| categoria  | VARCHAR      | 50     | No       | Tipo de medicamento |
| precio     | DECIMAL      | 10,2   | No       | Precio |
| descripcion| TEXT         | —      | Sí       | Información adicional |
| stock      | INT          | —      | No       | Cantidad disponible |
# Credenciales
Usuario: admin <br>
Contrseña: 123456
