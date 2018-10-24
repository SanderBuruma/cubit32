<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <h2>Oefenen met het XMLHttpRequest object</h2>

  <form action="index.php" method="POST">
      Voornaam:<br>
      <input type="text" name="naam"><br>
      Achternaam:<br>
      <input type="text" name="achternaam"><br>
      Leeftijd:<br>
      <input type="number" name="leeftijd"><br>
      <input type="submit" name="submit" value="Verzenden">
  </form>
  <?php 
  if (isset($_POST['submit'])){
    $voornaam = $_POST['naam'];
    $achternaamnaam = $_POST['achternaam'];
    $leeftijd = $_POST['leeftijd'];
    if ($leeftijd > 10){
      echo "<p>Hallo, $voornaam $achternaamnaam. U bent al $leeftijd jaren oud. Als ik u was zou ik alvast mijn testament regelen.</p>";
    } else {
      echo "<p>Hallo, $voornaam $achternaamnaam. Je bent nog maar $leeftijd jaren oud. Vraag mama even of je wel op het internet mag.</p>";
    }
  }
  ?>
</body>
</html>