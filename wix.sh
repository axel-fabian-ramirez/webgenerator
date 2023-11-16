mkdir $1
echo "<html>
<head>
  <title>$1</title>
</head>
<body>
 	<h1>pagina web $1</h1>
</body>
</html>"  |cat > $1/index.php
