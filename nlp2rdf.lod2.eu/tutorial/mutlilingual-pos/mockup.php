<html>
<head>
<meta charset="UTF-8" />
</head>
<body>
<br>
Post texts of any language here (This is just a mockup):<br><br>
<form action="" method="GET" >
<textarea name="text" cols=100 rows=10>
Die kleine Giraffe trabbte langsam vor sich hin, bis sie einen Baum fand. Da blieb sie stehen, streckte sich und öffnete ihren Mund, um sich ein Blatt zu stibitzen.
</textarea><br>
<input type="submit" value="submit" \>
</form>
<br>
<?php 
if (isset($_REQUEST['text'])){
	?>
	<b>Language: German</b> <br> 
	<span style="background-color:green;">Verbs</span><br>
	<span style="background-color:red;">Nouns</span><br>
	<span style="background-color:orange;">Adjectives</span><br>
	<span style="background-color:yellow;">Articles</span><br><br>
	
	<span style="background-color:yellow;">Die</span> <span style="background-color:orange;">kleine</span> <span style="background-color:red;">Giraffe</span> <span style="background-color:green;">trabbte</span> langsam vor sich hin, 
	bis sie <span style="background-color:yellow;">einen</span> <span style="background-color:red;">Baum</span> <span style="background-color:green;">fand</span> ....
	<?php
	
	}
?>

</body>

</html>
