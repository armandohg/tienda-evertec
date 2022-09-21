## Acerca del proyecto

Este proyecto representa una tienda en línea en donde los clientes pueden comprar un solo artículo con un precio fijo ($200 USD).

## Instalación

```bash
# Clonar el repositorio
git clone git@github.com:armandohg/tienda-evertec.git tienda

# Instalar dependencias
cd tienda
composer install
npm install

# Ejecutar migraciones y crear registros de prueba en la base de datos
php artisan migrate --seed

# Establecer datos de integración con Place To Pay en archivo .env
# Nota: Se proporcionan datos de prueba en .env.example

# Ejecutar script de build e iniciar servidor
npm run dev

# Ejecutar pruebas
./vendor/bin/pest
```

## Notas

En la parte superior del sitio se encuentran dos enlaces rápidos:

- Inicio: permite ir a la vista prinicpal del sitio, aquí es donde un cliente iniciaría su recorrido para realizar una orden.
- Lista de órdenes: muestra la lista de órdenes. El acceso a esta vista deberá ser restringido por medio de middlewares.
