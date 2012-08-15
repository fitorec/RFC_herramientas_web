<?php
/**
 * Valida un RFC
 *
 * @param string $rfc a validar
 * @return múltiple int 1 si el $rfc es valido 0 si no. boolean FALSE si sucede un error.
 * @link http://php.net/manual/en/function.preg-match.php
 */
function validarRFC($rfc) {
	$regex = '/^[A-Z]{4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{4})$/';
	return preg_match($regex, $rfc);
}//fin función

/** arreglo para test **/
$RFClistaTest = array(
	'VECJ880326 XXXX' => array(
		'valor_esperado' => 1,
		'mensaje' => 'RFC valido'
	),
	'VECJ881326 XXXX' => array(
			'valor_esperado' => 0,
			'mensaje' => 'Invalido ya que no hay mes 13'
	),
	'MAMM881026-9PMX' => array(
			'valor_esperado' => 1,
			'mensaje' => 'RFC valido'
	),
	'MAMM991041-SPUS' => array(
			'valor_esperado' => 0,
			'mensaje' => 'Invalido ya que no hay día 41'
	),
);

/** probando la validación **/
foreach ($RFClistaTest as $rfc => $datos) {
	if( $datos['valor_esperado'] == validarRFC($rfc)) {
			echo $datos['mensaje']."\n";
	} else {
		echo "ocurrio un error con el RFC {$rfc}\n";
	}
}

