# PARCIAL 2 C2 PROGRAMACIÓN COMPUTACIONAL IV
# Integrantes: 

Diego Martín López Moreno         (SMSS09824)

Walter Alexander Ramírez Benítez (SMSS082124)

# Descripcion
Este proyecto consiste en una aplicación web orientada a la empresa Farmacia Brasil, la cual permite gestionar medicamentos por medio de PHP, MySQLi y una base de datos relacional. El sistema cuenta con inicio de sesión para usuarios registrados, registro de medicamentos y visualización pública de los datos almacenados, cumpliendo con los requisitos solicitados en la actividad.

El sistema permite:

Visualizar medicamentos de forma pública.
Registrar nuevos medicamentos (solo usuarios autenticados).
Editar y eliminar registros existentes.
Gestionar el acceso mediante un sistema de inicio de sesión.

# ¿Cómo manejan la conexión a la BD y qué pasa si algunos de los datos son incorrectos? Justifiquen la manera de validación de la conexión.

La conexión a la base de datos se maneja mediante MySQLi, utilizando el archivo conexion.php, en el cual se establece la conexión con el servidor local, el usuario root, la base de datos farmacia_brasil y el juego de caracteres UTF-8. Si la conexión falla, el sistema detiene su ejecución y muestra un mensaje de error, evitando que se realicen consultas inválidas.

Se implementa una validación inmediata de la conexión mediante:

Verificación de errores (connect_error)
Detención del sistema en caso de fallo (die())

Esto evita la ejecución de consultas inválidas y posibles inconsistencias en la aplicación.

Además, se establece el juego de caracteres UTF-8, garantizando la correcta manipulación de caracteres especiales.

Además, antes de guardar información en la base de datos, se validan los datos recibidos desde los formularios. Por ejemplo, se verifica que los campos obligatorios no estén vacíos, que el precio sea numérico y mayor que cero, y que el stock no sea negativo. Si alguno de los datos es incorrecto, el sistema no permite registrarlo. Esta validación ayuda a mantener la integridad de la información y evita errores en el funcionamiento de la aplicación.
  
Antes de insertar o actualizar información, el sistema valida:

Campos obligatorios no vacíos
Tipo de dato correcto (ej: precio numérico)
Valores lógicos (precio > 0, stock ≥ 0)

Estas validaciones aseguran la integridad de los datos y previenen errores en el sistema.

# ¿Cuál es la diferencia entre $_GET y $_POST en PHP? ¿Cuándo es más apropiado usar cada uno? Da un ejemplo real de tu proyecto.

La diferencia principal entre $_GET y $_POST en PHP es la forma en que envían los datos. $_GET envía la información a través de la URL, por lo que los datos pueden verse directamente en la barra de direcciones del navegador. Se usa más en búsquedas, filtros o consultas simples donde no hay información sensible. Por otro lado, $_POST envía la información de manera oculta dentro de la petición HTTP, por lo que es más apropiado cuando se trabaja con formularios que contienen datos confidenciales o extensos.
$_GET
Envía datos a través de la URL
Visible en el navegador
Limitado en tamaño
Uso: consultas simples, filtros, navegación

$_POST
Envía datos en el cuerpo de la petición HTTP
No visible en la URL
Permite mayor cantidad de datos
Uso: formularios con información sensible

En nuestro proyecto utilizamos $_POST en el formulario de inicio de sesión y también en el formulario de registro de medicamentos. Esto se hace porque el usuario y la contraseña no deben mostrarse en la URL, y porque los datos del medicamento deben enviarse de forma más segura y ordenada. $_GET podría usarse más adelante si se quisiera hacer una búsqueda de medicamentos por nombre o categoría desde la barra de navegación.
Concluyendo:
$_POST se utiliza en:
Inicio de sesión (usuario y contraseña)
Registro de medicamentos
$_GET se utiliza en:
Envío de ID para editar o eliminar registros
Esto demuestra el uso adecuado según el contexto de seguridad y funcionalidad.

# Tu app va a usarse en una empresa de la zona oriental. ¿Qué riesgos de seguridad identificas en una app web con BD que maneja datos de los usuarios? ¿Cómo los mitigarían?

En una aplicación web con base de datos que maneja datos de usuarios existen varios riesgos de seguridad. Uno de los principales es la inyección SQL, que ocurre cuando una persona intenta introducir código malicioso en los formularios para alterar consultas a la base de datos. Otro riesgo importante es el acceso no autorizado, es decir, que personas no registradas intenten entrar al sistema administrativo. También puede existir robo de credenciales, pérdida de información por errores humanos y exposición de datos sensibles.

Riesgos identificados
Inyección SQL, acceso no autorizado, robo de credenciales , manipulación de datos , exposición de información sensible.

Para mitigar estos riesgos, en el sistema se valida la sesión de usuario antes de permitir el acceso al panel administrativo o al formulario de registro. También se validan los datos ingresados en los formularios, reduciendo errores o entradas inválidas. Como mejora de seguridad, el sistema puede implementarse con consultas preparadas, contraseñas cifradas y control de permisos por rol. De esta forma se protege mejor la información de la empresa y de los usuarios.

Medidas implementadas
Uso de sesiones ($_SESSION) para control de acceso, asi como tambien la restricción de funcionalidades según autenticación, agregando la validación de datos en formularios y el uso de consultas preparadas (prepare()) para evitar inyección SQL.

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
