<html>
<body>
    

<form id="search" action="" method="get" >
    Search for:</br>
<input id="s" type="text" name="s" value="USA">
<input id="searchsubmit" type="submit" value="Search">
</form>
<?php 
if(isset($_REQUEST['s'])){
    $s =  $_REQUEST['s'];
    //echo "search was: ".$s."\n"; 
    echo "search was: USA\n"; 

$result = array();
$var =0;
//echo  exec('java -jar SPW.jar test > output.html', $result, $var);
//echo  exec('./script.sh '.$s, $result, $var);

echo "<br><br>";
echo "<b>mockup:</b><br>";
?> 
Enities: <a href="http://dbpedia.org/resource/United_States">http://dbpedia.org/resource/United_States </a></br>
Did you mean <a href="http://dbpedia.org/resource/Federal_government_of_the_United_States">http://dbpedia.org/resource/Federal_government_of_the_United_States</a> ? </br>
Similar: <a href="http://dbpedia.org/resource/Mexico">http://dbpedia.org/resource/Mexico</a></br>
Related(leaderName): <a href="http://dbpedia.org/resource/Barack_Obama">http://dbpedia.org/resource/Barack_Obama </a></br>
Related (birthplace, residence): <a href="http://dbpedia.org/resource/Hillary_Rodham_Clinton">http://dbpedia.org/resource/Hillary_Rodham_Clinton </a></br>
</br>
 
Mexico expects the <span  style="background-color:green;">U.S.</span> to accelerate the disbursement of aid to strengthen its fight against drug gangs and put back on track a $1.4 billion program that has been hamstrung by delays in recent years, Foreign Affairs Minister Patricia Espinosa said.

Espinosa, in an interview yesterday, said both U.S. President Barack Obama and Secretary of State Hillary Clinton promised to disburse $500 million this year in equipment and aid for police training as part of the bilateral Merida Initiative. Mexico expects to receive complete financing of the multi-year program by next year, she said.

"We got off to a slow start in part because this is a completely new cooperation plan," Espinosa, 52, said at Bloomberg's offices in Mexico City. "We now see that it's advancing more quickly."

U.S. anti-narcotics aid to Mexico suffered delays even as the death toll from President Felipe Calderon's crackdown on drug gangs surged to over 35,000 victims since he took office in 2006. Mexico received at least $480 million in U.S. aid under the program since it was signed in 2008 by Calderon and former President George W. Bush, with $380 million arriving between 2008 and 2010, according to data from the Foreign Ministry.

The shortfall in <span style="background-color:green;">U.S.</span> assistance has delayed the delivery of equipment including polygraph machines and Black Hawk helicopters needed to combat drug traffickers. It has also delayed the training of Mexican officials, according to the GAO report.

Until a year ago the <span style="background-color:green;">U.S.</span> had delivered only about 9 percent of the promised aid to Mexico and Central America because agencies involved lacked staff and funding, the U.S. Government Accountability Office said in a report in 2010. 
<?php
 }
else {
   // echo "<textarea rows=\"30\" cols=\"100\" readonly>".file_get_contents("http://nlp2rdf.lod2.eu/tutorial/semantic-search/tutorial_semantic_search_text.txt")."</textarea>";
    echo "<textarea rows=\"30\" cols=\"100\" readonly>".file_get_contents("search_text.txt")."</textarea>";
    } 
?>

	
</body>
</html>
