PLATAFORMA PARA LOS APARTAMENTOS DE AIRBNB
-
**Proyecto universitario presentado para la 'VII Semana Internacional de Ingeniería', en la Universidad Cooperativa de Colombia**.
Consiste en un sitio web empleado para gestionar la información de los diferentes apartamentos de AirBnB y sus respectivos clientes. 
Permite realizar funciones como: <br>
- Registrar apartamentos.
- Registrar clientes.
- Registrar el arriendo vinculando un cliente a un apartamento.
- Mostrar información del total por alquiler de un apartamento o de todos los apartamentos.
  
<br>El proyecto puede ser utilizado por diferentes empresas dedicadas al arrendamiento de apartamentos, 
con el objetivo de lograr un mejor control y registro de la información.

TECNOLOGIAS EMPLEADAS
-
- PHP
- HTML5
- CSS3
- MySQL
- Patrón de diseño Modelo-Vista-Controlador (MVC)

¿CÓMO FUNCIONA?
-
Se empleó el patrón MVC para el diseño de la página web; así mismo, se implementó un CRUD tanto para los apartamentos como para los clientes.
Las diferentes responsabilidades que se asignaron a cada componente son las siguientes:

<br>**Modelo:** Este componente se encarga de establecer la conexión con la base de datos, así como de realizar las diferentes consultas 
para almacenar o recuperar la información según la solicitud que se realice.
<br><br>**Vista:** Este componente se encarga de desplegar las diferentes ventanas con la información que se recupera de la base de datos 
por medio del modelo. Es quien le muestra al cliente lo que solicita.
<br><br>**Controlador:** Este componente se encarga de ser intermediario entre el Modelo y la Vista. Es decir, según las diferentes solicitudes que haga la Vista, 
el Controlador se comunicará con el Modelo para que este posteriormente proporcione la información requerida, información la cual será proporcionada a la Vista 
nuevamente por medio del Controlador.

INSTALACIÓN DEL PROYECTO
-
Para instalar correctamente el proyecto, es necesario seguir los siguientes pasos: 
- Instalar "XAMPP".
- Clonar el repositorio en la carpeta local de "htdocs".
- Inicializar MySQL desde XAMPP.
- Agregar el .sql que se encuentra en la carpeta "SQL_DataBase".
- Acceder a la URL "http://localhost/DOOProyectoFinalPoster/index.php" para visualizar la página web.
