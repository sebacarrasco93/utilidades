# Utilidades

## Instalación
```sh
composer install sebacarrasco93/utilidades
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
return Utilidades::link_maps('Quiero consultar'); // https://wa.me/?text=Quiero%20consultar
return Utilidades::link_maps('Quiero consultar', '+56900000000'); // https://wa.me/56900000000?text=Quiero%20consultar
return Utilidades::link_maps(null, '+56900000000'); // https://wa.me/56900000000
return Utilidades::link_maps(null, null); // null
```
