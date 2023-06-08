Instalación y puesta en marcha

Este tutorial es para un entorno MacOs, ya que es donde se ha desarrollado la práctica. Para otros sistemas operativos, como Windows, los pasos a seguir son bastante similares.
Por tanto, con el fin de instalar todo el entorno necesario para la ejecución del software se recomienda seguir los siguientes pasos:

1- Descarga MAMP de su sitio web oficial: https://www.mamp.info/en/downloads/

2- Ejecuta el instalador e instala la aplicación.

3- Abre MAMP y configura el entorno con las siguientes características:
  a. En Preferencias -> Puertos: Verificar que Apache escucha el puerto 8888 y que MySQL escucha el puerto 8889.
  b. En Preferencias -> Servidor: Seleccionar la ruta /Applications/MAMP/htdocs como ruta para colocar el código de la página web.
   
4- Descargar el código de la web del siguiente repositorio en GitHub:
https://github.com/sergioarevro/TFG.git

5- Colocar la carpeta TFG en el directorio htdocs.

6- Colocar el fichero TFG_Phishing.sql en el directorio /Applications/MAMP/db.

7- Iniciar el servidor con el botón Start en la parte superior derecha de la ventana.

8- Cuando en tu navegador se abra la ventana principal, seleccionar en el apartado Tools la herramienta phpMyAdmin. Se abrirá el gestor de bases de datos.

9- En el gestor crear una nueva base de datos.

10-Importar la base de datos que hemos ubicado en /Applications/MAMP/db. Seleccionando la ruta y dejando el resto de opciones por defecto.

11- Abrir una nueva ventana en el navegador e introducir la siguiente dirección para ejecutar la página web: http://localhost:8888/TFG/
