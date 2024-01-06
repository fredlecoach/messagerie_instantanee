<?php

$bd = new PDO("mysql:host=localhost;dbname=messagerie", 'root', '');
$recupMessages =$bd->query('SELECT * FROM messages');
while($message = $recupMessages->fetch()){
  ?>
  <div class="talk left">
  <img src="./images/avatar_femme.png" alt="avatar">
    <p><?= $message['message']; ?></p>
  </div>

  <div class="talk right">
  <img src="./images/avatar.png" alt="avatar">
    <p><?= $message['message']; ?></p>
  </div>
  <?php
}

?>