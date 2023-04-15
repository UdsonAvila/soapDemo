<?php
//parameters
$result = array();
$url = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL';
$somaInteiro = Array (
	"Arg1" => 5,
	"Arg2" => 10
);
$divideInteiro = Array (
	"Arg1" => 5,
	"Arg2" => 10
);
$idBuscaPessoa = Array (
	"id" => 15
);

//functions
function returnCon($param1){
	$conexao = Array (
		"uri"=> 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL',
		"style"=> SOAP_RPC,
		"use"=> SOAP_ENCODED,
		"soap_version"=> SOAP_1_1,
		"cache_wsdl"=> WSDL_CACHE_BOTH,
		"connection_timeout" => 15,
		"trace" => false,
		"encoding" => "UTF-8",
		"exceptions" => false,
	);

	return  new SoapClient(
		'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL',
		$conexao

	);
}

//set the results
$result['0'] = returnCon($url)->AddInteger($somaInteiro);
$result['1'] = returnCon($url)->DivideInteger($divideInteiro);
$result['2'] = returnCon($url)->FindPerson($idBuscaPessoa);


//show on screen
header("Content-Type: application/json");
echo json_encode($result);
exit;
