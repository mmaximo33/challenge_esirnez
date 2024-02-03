## Desarrollar una nueva funcionalidad para el Backend 💻

Usando el entorno descargado anteriormente desarrollar la siguiente funcionalidad:

### Objetivo 🎯

Se requiere armar un sistema de suscripción para cobrar el uso de la plataforma. El mismo debe funcionar como un API Rest para poder gestionar la base de clientes y el envío de los cobros.

### Requerimientos 📄

Los clientes van a poder suscribir su edificio o barrio a tres tipos de planes según las features y soporte que necesiten del sistema (Básico, Pro, Empresas).

El costo de los planes es el siguiente:

- Básico: $10.000 x mes
- Pro: $25.000 x mes
- Empresas: $70.000 x mes

Para simplificar el modelo, los datos que vamos a necesitar guardar para la suscripcion son: Nombre del barrio/edificio, email de contacto, tipo de cobro (debito por cbu | tarjeta), y el plan seleccionado. Ademas la suscripcion va a tener 2 estados (activa | inactiva).

El cobro de los planes es de recurrencia mensual por lo que debe publicarse mensualmente la base de suscripciones en formato JSON para que una API de cobros pueda luego enviar los cupones de pago a los clientes. La información de los montos enviados a cobrar a cada cliente es fundamental para control y métricas por lo que se requiere que cada lote de cobro se guarde también en la base de datos.

### Consideraciones 🔍

- La generación del lote de cobros y el envío a la API de pagos se van a realizar en procesos distintos. El lote de cobros se generará automáticamente el día 5 de cada mes usando cronjobs, por lo que necesitamos que este proceso guarde en la base de datos todo lo necesario para cobrar las suscripciones activas para ese período. Luego una persona del área administrativa controlará y enviará a cobrar las cuotas de suscripciones generadas.
- Si bien no se requiere registrar pagos en este MVP se debe considerar que un periodo de cobro de cada barrio/edificio puede tener los estados (generado | enviado_a_cobrar | pagado).

### Resultado esperado 🏅

- **La funcionalidad mínima de la API que se pide son los siguientes 5 endpoints:**
    - Guardar el plan de suscripción de un cliente.
    - Poder generar un lote de cobro.
    - Consultar el detalle del lote. (Respuesta en formato JSON)
    - Consultar el monto total y cantidad de cobros por lote. (Respuesta en formato JSON)
    - Consultar los datos de las suscripciones activas.(Respuesta en formato JSON)
- **Se debe plantear la base de datos relacional necesaria para contemplar los requerimientos y funcionalidades del producto.**
- **Realizar una mini documentación de la API en el README del proyecto que contenga la URL del endpoint, un ejemplo de Payload si corresponde y la Respuesta esperada.**

### Evaluación 📊

Sobre la resolución de las tareas de código se tomará en consideración:

- La organización y legibilidad del código.
- La estructura de tablas utilizada e interpretación de los datos relevantes a guardar para que luego el analista de datos pueda controlar y tomar métricas del proceso.
- La inclusión de alguna validación de datos mínima (considerando que el frontend no valida nada) y manejo de errores en al menos una función.

# Resultados 🏆

Subir el código y el .sql de creación de tablas de la base de datos a un repositorio de GitHub público para nosotros poder clonarlo y correrlo local. Cualquier comentario o aclaración puede también agregarse en el README.

# Contacto 📩

Para cualquier pregunta sobre el test o enviar el link al github una vez finalizado, enviar un mail a **gonzalo@xxxxxxxx.xxx**
