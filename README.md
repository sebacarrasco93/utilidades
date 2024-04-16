# Utilidades

## Instalación
```sh
composer require sebacarrasco93/utilidades
```

## Uso
```php
return Utilidades::{nombre_método}({parámetro(s)});
```

## Métodos disponibles:

### Integers

#### Peso chileno

Agrega el símbolo $, y puntos correspondientes

```php
return Utilidades::peso_chileno(1500); // $1.500
```

### Strings

#### Espacios
Limpia todos los espacios de una cadena de texto
```php
return Utilidades::espacios('este  es   un  texto'); // este es un texto
```

También puede devolver como array
```php
return Utilidades::espacios('este  es   un  texto', true); // ['este', 'es', 'un', 'texto']
```

#### Nombre

Capitaliza la primera letra de cada palabra (dejando primero todo en minúsculas)
```php
return Utilidades::nombre('sEbAstiÁn'); // Sebastián
```

También sanitiza los espacios sobrantes aplicando "espacios"
```php
return Utilidades::nombre('sEbAstián  cArrAscO  pOblEte'); // Sebastián Carrasco Poblete
```

#### Primer nombre

Toma un nombre completo, y devuelve el primero (después de limpiarlo)
```php
return Utilidades::p_nombre('sEbAstiÁn'); // Sebastián
```

#### RUT

Devuelve el RUT sólo si es válido
```php
return Utilidades::rut('183765-4'); // null (pocos caracteres)
return Utilidades::rut('183765884-0'); // null (muchos caracteres)

return Utilidades::rut('18376588-2'); // null (dígito verificador malo)

return Utilidades::rut('18376588-4'); // 18376588-4
return Utilidades::rut('18.376.588-4'); // 18376588-4

return Utilidades::rut('5717465-k'); // 5717465-K
return Utilidades::rut('5.717.465-K'); // 5717465-K
```

#### Título

Devuelve el título completo
```php
return Utilidades::titulo('Este es el título', 'Nombre del producto'); // Este es el título | Nombre del producto
return Utilidades::titulo('Este es el título'); // Este es el título
```

#### Singular o Plural (sop)

Devuleve la palabra singular o plural (si se le entrega 1, singular)

```php
return Utilidades::sop(1, 'Producto', 'Productos'); // Producto
return Utilidades::sop(2, 'Producto', 'Productos'); // Productos
```

### Links

#### Codificar URL

Codifica un string a formato URL, similar a urlencode, pero cambiando el espacio por %20

```php
return Utilidades::codificar_url('Esta es mi casa'); // Esta%20es%20mi%20casa
```

#### Link Waze

Convierte una dirección a la URL de API de Waze

```php
return Utilidades::link_waze('Esta es mi casa'); // https://waze.com/ul?q=Esta%20es%20mi%20casa
```

#### Link Maps

Convierte una dirección a la URL de API de Maps

```php
return Utilidades::link_maps('Esta es mi casa'); // https://www.google.com/maps/search/?api=1&query=Esta%20es%20mi%20casa
```

#### Link WhatsApp

Convierte un texto a la URL de API de WhatsApp

```php
return Utilidades::whatsapp('Quiero consultar'); // https://wa.me/?text=Quiero%20consultar
return Utilidades::whatsapp('Quiero consultar', '+56900000000'); // https://wa.me/56900000000?text=Quiero%20consultar
return Utilidades::whatsapp(null, '+56900000000'); // https://wa.me/56900000000
return Utilidades::whatsapp(null, null); // null
```

### Routes

Considera el siguiente bloque como ejemplo general para los métodos disponibles más abajo

```php
// web.php

Route::get('test', function () {
    // Contenido...
})->name('test.index');
```

#### currentRouteNameHas

Sabe si está registrado el nombre de una ruta

```php
Route::currentRouteNameHas('test.index'); // true o false
```

### Vite

Sólo disponible cuando existe el Facade Vite

#### img

Equivalente a escribir `Vite::asset("resources/img/seba.png")`

```php
Vite::img('resources/img/seba.png');
```
