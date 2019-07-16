<!DOCTYPE html>
<html>
	<head>
		<title>MTG Card Search</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	</head>

	<body>
		<h1>MTG Card Search</h1>
	
		<form id="cardForm">
			Card Name: <input id="card" type="text" name="cardName"> <br>
			<div id="extraInfo">Click anywhere after typing for your search to go through.</div>
			<div id="extraInfo">Your search does not have to be exact.</div>
			
			<span id="cardNameError"></span><br> 
			
			<span id="cardImage"><img src="images/franticSearch.jpg"></span><br>
			
			Name: <span id="name"></span><br>
			Mana Cost: <span id="manaCost"></span><br>
			Converted Mana Cost: <span id="cmc"></span><br> 
			Type: <span id="type"></span><br> 
			Rules Text: <span id="rulesText"></span><br>
			Colors: <span id="colors"></span><br> 
			Price: $ <span id="price"></span>
		</form>
	
		<script>

		var isValid = true;
		
			$("#card").on("change", function() {
				//alert($("#card").val());
				if ($("#card").val().length <= 2) {
					alert("Please enter more than 2 characters.")
					e.preventDefault
				}
					
				$.ajax({
					method : "GET",
					url : "https://api.scryfall.com/cards/named",
					dataType : "json",
					data : {
						"fuzzy" : $("#card").val()
					},
					success : function(result, status) {		

						$("#cardImage").html("<img src='" + result.image_uris.small+ "'>");
						$("#name").html(result.name);
						$("#manaCost").html(result.mana_cost);
						$("#cmc").html(result.cmc);
						$("#type").html(result.type_line);
						$("#rulesText").html(result.oracle_text);
						$("#colors").html(result.colors);
						$("#price").html(result.prices.usd);
					}
				});//ajax
			});//card	
			
		</script>
	
	</body>
	
</html>