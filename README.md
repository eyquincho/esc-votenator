# Descripción
Con el objetivo de poder agrupar de una forma sencilla las votaciones durante el festival de Eurovisión, esta pequeña webapp permite de una forma sencilla e intuitiva crear un grupo que compartir con amigos mediante enlace o QR y recopilar ahi las votaciones para la final de Eurovision 2019.

# Instalación
Crear una base de datos MySQL desde phpMyAdmin y poblarla con el contenido de [db/crear_tablas.sql](https://github.com/eyquincho/escvs/blob/master/db/crear_tablas.sql)
Copiar todo lo demás a la carpeta del servidor

# Modo de uso
Para actualizar el listado de paises participantes, hay que hacerlo directamente desde la base de datos, actualizando la tabla esc_grupos. Puede que algún día cree una sección para administrador, pero para una herramienta que se va a utilizar una vez al año me parece un poco inútil. Invito a quien quiera a que lo haga.

# Librerías
- [jQuery](https://jquery.com/)
- [Bootstrap](https://getbootstrap.com/)
- [dataTables](https://datatables.net/)
- [Tether](http://tether.io/)
- [Font Awesome](https://fontawesome.com/)
- [Google APIs](https://developers.google.com/chart/) (para la generación del QR)
