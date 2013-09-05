<?php

/**
 * This function does not have error handling.
 * It returns an array made from a JSON result set.
 * returns something like:
 * Array
(
    [head] => Array
        (  [vars] => Array
                    [0] => nummer
                )
        )
    [results] => Array
        (
            [bindings] => Array
                (
                    [0] => Array
                        (
                            [nummer] => Array
                                (
                                    [type] => literal
                                    [value] => 311
                                )
                        )
                )
        )
)
 **/
function sparqlQuery($query, $baseURL="http://klappstuhlclub.de/sparql", $format="json") {
	$params=array(
		"default-graph" =>  "",
		"should-sponge" =>  "soft",
		"query" =>  $query,
		"debug" =>  "on",
		"timeout" =>  "",
		"format" =>  $format,
		"save" =>  "display",
		"fname" =>  ""
	);

	$querypart="?";	
	foreach($params as $name => $value) {
		$querypart=$querypart . $name . '=' . urlencode($value) . "&";
	}
	
	$sparqlURL=$baseURL . $querypart;

	return json_decode(file_get_contents($sparqlURL),true);
};

/**
 * 
 * this function uses ARC2 
 * see https://github.com/semsol/arc2/wiki/Remote-Stores-and-Endpoints
 * see result formats in https://github.com/semsol/arc2/wiki/Using-ARC%27s-RDF-Store
 * prints an error and returns false on failure 
 * if successfull returns something like:
 * Array
(
    [0] => Array
        (
            [nummer type] => literal
            [nummer] => 223
        )

)

 * 
 * 
**/
function sparqlQueryArc2($query){
        /* ARC2 static class inclusion */ 
        include_once('ARC2/ARC2.php');
        /* configuration */ 
        $config = array(
        /* remote endpoint */
            'remote_store_endpoint' => 'http://klappstuhlclub.de/sparql',
        );

        /* instantiation */
        $store = ARC2::getRemoteStore($config);

        //Running Queries
        $rows = $store->query($query, 'rows');
/*        if ($store->getErrors()) {
            print_r( $store->getErrors());
            echo "<xmp>  $query  </xmp>";
			return false;
		}*/
		return $rows;

  }

