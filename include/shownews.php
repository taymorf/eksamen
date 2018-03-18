<?php
$sql = "SELECT * FROM news ORDER BY `id`='" . $_SESSION['isLoggedIn'] . "'";
$resultatbeskeder = $conn->query( $sql );

while( $raekkebesked = $resultatbeskeder->fetch_assoc() )
{
  echo 'Overskrift: ' . $raekkebesked['title'] . '<br />' . 'Nyhed: ' . $raekkebesked['text'] . '<br />';
  $sql = "SELECT `title`, `date`, `text` FROM news ORDER BY `id`";
  $conn->query( $sql);


  //echo '<p>Antal: '.count( $raekkebruger ).' Giver mening??</p>';
  //echo '<p>Antal rækker: '.$resultatbrugere->num_rows.'</p>';


  // RetBesked/SletBesked
  if(isset( $_SESSION['isLoggedIn']))
  {
    if($_SESSION['isLoggedIn'])
    {
      echo '<br /><a href="index.php?side=include/editnews.php&RetBeskedID=' . $raekkebesked['id'] . '">Ret Besked</a>';
      echo '<br /><a href="index.php?side=sletbesked.php&SletBeskedID=' . $raekkebesked['id'] . '">Slet Besked</a>';
    }
  }
  echo '<br /><br />';
}
 ?>
