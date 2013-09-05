<html> 
<body> 
<p> Post your NIF data here: </p> 
<form action="" method="post">
<textarea name ="nif" rows="20" cols="100" >
@prefix str: <http://nlp2rdf.lod2.eu/schema/string/> .
@prefix rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> .
@prefix sso: <http://nlp2rdf.lod2.eu/schema/sso/> .
@prefix wo: <http://nlp2rdf.lod2.eu/schema/web-annotation/> .

<http://www.w3.org/DesignIssues/LinkedData.html#offset_717_729> 
   sso:oen <http://dbpedia.org/resource/Semantic_Web> ;
   wo:highlightRGBcolor "#ADD8E6" ;
   str:referenceContext <http://www.w3.org/DesignIssues/LinkedData.html> .

<http://www.w3.org/DesignIssues/LinkedData.html#offset_2442_2443> 
   wo:comment <http://myannotation.org/comment/kf094erk430943k> ;
   wo:highlightRGBcolor "#FFFF00" ;
   str:referenceContext <http://www.w3.org/DesignIssues/LinkedData.html> . 


<http://myannotation.org/comment/kf094erk430943k> 
    rdf:type wo:Comment  ;
    wo:commentString "I wonder what the star behind the RDF means? " ;
    wo:commentor <http://dig.csail.mit.edu/2008/webdav/timbl/foaf.rdf>  ;
    wo:commentDate  "2012-04-10 08:56:54.575"^^xsd:date .

</textarea><br>

<select name="format">
<option value="n3">n3</option>
<option value="rdf/xml">rdf/xml</option>

<!--option value="fiat">Fiat</option>
<option value="audi">Audi</option-->
</select>
<input type="submit" value="Submit" />
</form> 


<?php 
if(isset($_REQUEST['nif'] )) {
	//see https://github.com/semsol/arc2/wiki
	include("../../ARC2/ARC2.php");
	switch ($_REQUEST['format'] ) {
		case "rdf/xml" : $parser = ARC2::getRDFXMLParser(); break;
		case "n3" : $parser = ARC2::getTurtleParser(); break;
	}	
	
	//see https://github.com/semsol/arc2/wiki/Parsing-RDF-Formats
	$parser->parse("", $_REQUEST['nif'] ) ;
	
		
	$triples = $parser->getSimpleIndex();
	
	highlight($triples);
	
	echo "<hr><xmp>";
		
	$triples = $parser->getSimpleIndex();
	print_r($triples);
	
	$triples = $parser->getSimpleIndex(0);
	print_r($triples);
	
	$triples = $parser->getTriples();
	print_r($triples);
		
		
	}

function highlight($triples){
		
		foreach($triples as $uri => $val ){
			
			$color = "#FFFFFF";
			//this is not the best way ;)
			ob_start();
			print_r($val);
			$string = ob_get_contents();
			ob_end_clean();
			
			
			if(isset($val['http://nlp2rdf.lod2.eu/schema/web-annotation/highlightRGBcolor'] )) {
				$color = $val['http://nlp2rdf.lod2.eu/schema/web-annotation/highlightRGBcolor'][0];
				}
			
			
			$string = str_replace("\n","\n<br>",$string);	
			$string = "<hr/></hl><span style=\"background-color:$color\">$uri\n<br>$string</span>";
			echo $string;
		}
			
		
		
	}
?>



</body> </html> 
