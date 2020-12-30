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
#### Nombre

Capitaliza la primera letra de cada palabra (dejando primero todo en minúsculas)
```php
return Utilidades::nombre('sEbAstián'); // Sebastián
```

También sanitiza espacios sobrantes
```php
return Utilidades::nombre('sEbAstián  cArrAscO  pOblEte'); // Sebastián Carrasco Poblete
```
