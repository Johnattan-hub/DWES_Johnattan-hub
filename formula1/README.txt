EJERCICIO FORMULA 1 - PHP POO

1. Copia la carpeta formula1 dentro de htdocs si utilizas XAMPP.
2. Inicia Apache.
3. Para probar las clases, abre:
   http://localhost/formula1/index.php
4. Para probar la API de OpenF1, abre:
   http://localhost/formula1/api.php

La llamada a la API necesita conexión a Internet y que PHP permita file_get_contents
para direcciones externas (allow_url_fopen).

La API consulta la sesión más reciente disponible y solicita los pilotos 16 y 44.
