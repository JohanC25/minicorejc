*Descripción del proyecto:*

En este mini-core, se incluye un CRUD para agregar Estudiantes y Notas a los estudiantes. Luego tenemos la pestaña de minicore que es la idea de negocio.
En este caso, ingresamos el rango de fechas desde y hasta para el progreso 1 y progreso 2, de aqui el sistema busca en la base de datos todos los registros
entre esas fechas y devuelve una tabla. En esta tabla sale el nombre del estudiante, la cantidad de notas registradas en ese rango de fechas, el promedio del
progreso 1 (25%), el promedio del progreso 2 (35%), y la tercera sale cuanto debe sacar en progreso 3 para pasar con las justas, en otras palabras 6/10.

El sistema verifica que no ingresen fechas de forma erronea y manda mensajes de error o de falta de datos en caso de que no existan registros.
