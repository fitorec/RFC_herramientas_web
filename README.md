## Validación del Registro Federal de Contribuyentes (RFC).

El **RFC** es una clave que tiene toda Persona física en México que realice alguna actividad licita que este obligada a pagar impuestos o toda Persona moral sin excepción (contribuyentes)`:¬S`.

Esta clave se genera con 10 caracteres alfanuméricos obtenidos de los datos personales del contribuyente o persona física como su nombre y fecha de nacimiento; o nombre y fecha de origen de la persona moral.

Más los 4 dígitos se le conoce como _homoclave,_ esta la designa el **SAT**, dependiendo de algunos factores que realiza el **SAT**, la regla de validación quedaría como.

**Nota:** Los caracteres deben de estar en mayúsculas sin acentos ni diéresis.

Y se determina de la siguiente manera: 

Por ejemplo para el **VECJ880326 XXXX**

Los 4 primeros dígitos son:

 - 1° La Primer letra del apellido paterno(**V**).
 - 2° La Primer vocal interna del apellido paterno(**E**).
 - 3° La Primer letra del apellido materno(**C**).
 - 4° La Primer letra del Nombre(**J**).

> De no existir algun apellido se utiliza una (**X**).

Por el momento una expresión de validación seria:

	^[a-z]{4}

 - El 5° y 6° dígito corresponden al año de nacimiento(**88**).

		[0-9]{2}


 - El 7° y 8° dígito corresponden al mes de nacimiento(**03 ó marzo**).

		(1[0-2]|0[1-9])

 - El 9° y 10° dígito corresponden al día de nacimiento(**26**).

		([0-3][0-9])


Los últimos 4 dígitos(**XXXX**) es la _homoclave_, la cual se puede validar como:

	[a-z0-9]{4}	

Finalmente la expresión de validación para una RFC con _homoclave_ seria:

	^[A-Z]{4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{4})$

## Un poco de PHP.



## Codificando en PHP.

```php
<?php
/**
 * Valida un RFC
 *
 * @param string $rfc a validar
 * @return multiple int 1 si el $rfc es valido 0 si no. boolean FALSE si sucede un error.
 * @link http://php.net/manual/en/function.preg-match.php
 */
function validarRFC($rfc)
	$regex = '/^[A-Z]{4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{4})$/';
	return preg_match($regex, $rfc);
}//fin función

/* probando la validacion */
if( validarRFC('VECJ880326 XXXX') ) {
	echo 'RFC <b>VECJ880326 XXXX</b> Valido';
} else {
	echo 'RFC <b>VECJ880326 XXXX</b> inValido';
}

```
