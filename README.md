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
Limpia todos los espacios de string
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

También aplica "espacios"
```php
return Utilidades::nombre('sEbAstián  cArrAscO  pOblEte'); // Sebastián Carrasco Poblete
```

#### Primer nombre

Toma un nombre completo, y devuelve el primero (después de limpiarlo)
```php
return Utilidades::p_nombre('sEbAstiÁn'); // Sebastián
```

También sanitiza espacios sobrantes
```php
return Utilidades::nombre('sEbAstián  cArrAscO  pOblEte'); // Sebastián Carrasco Poblete
```

#### RUT

Devuelve el RUT sólo si es válido
```php
return Utilidades::rut('18376-4'); // null
return Utilidades::rut('183765-4'); // null
return Utilidades::rut('183765884-0'); // null

return Utilidades::rut('18376588-4'); // 18376588-4
return Utilidades::rut('18.376.588-4'); // 18376588-4

return Utilidades::rut('5717465-k'); // 5717465-K
return Utilidades::rut('5.717.465-K'); // 5717465-K
```
