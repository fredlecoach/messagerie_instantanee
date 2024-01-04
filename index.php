<?php

//adresse localhost : http://localhost/phpmyadmin/index.php?route=/

$serverName = "localhost";
$dbname = "messagerie";
$username = "root";
$password = "";

try{
  $bd = new PDO("mysql:host=$serverName;dbname=$dbname", $username, $password);
  $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connexion réussie! ";


}
catch(PDOException $e){
  echo "Erreur :".$e->getMessage();

}

if(isset($_POST['valider'])){
  if(!empty($_POST['message'])){
    $message = $_POST['message'];

    $insererMessage = $bd->prepare("INSERT INTO messages(`message`) VALUES(?)");
    $insererMessage->execute(array($message));
    echo "Message envoyé!";

  }else{
    echo "Please, enter your message...";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WinkChat</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

 <div class="chat-global">

  <div class="bandeau-logo">
    <img src="./images/WinkChat.png" alt="logo" id="logo">
    <div class="fonctionnalités">
      <p><i class="fa-solid fa-house"></i></i> Home</p>
      <p><i class="fa-solid fa-id-badge"></i> Contacts</p>
      <p><i class="fa-solid fa-people-group"></i> Groupes</p>
      <p><i class="fa-solid fa-bell"></i> Notifications</p>
    </div>

    <div class="options">
      <p><i class="fa-solid fa-key"></i> Mon compte</p>
      <p><i class="fa-solid fa-mask"></i> Avatar</p>
      <p><i class="fa-solid fa-comments"></i> Discussion</p>
      <p><i class="fa-solid fa-circle-question"></i> Aide</p>
    </div>
    
  </div>

  <div class="nav-top">
    <div class="location">
      <p><i class="fa-solid fa-chevron-left"></i> Back</p>
    </div>

    <div class="utilisateur">
      <p><i class="fa-regular fa-user"></i> Fred</p>
      <p>Active Now</p>
    </div>

    <div class="logos-call">
      <p id="phone"><i class="fa-solid fa-phone"></i></p>
      <p><i class="fa-solid fa-video"></i></p> 
    
    </div>
  </div>

  <div class="conversation">

    <div class="talk left">
      <img src="./images/avatar_femme.png" alt="avatar">
      <p>Coucou!</p>
    </div>
    <div class="talk right">
      <p>Tu vas bien? Quoi de neuf? </p>
      <img src="./images/avatar.png" alt="avatar">
    </div>
    <div class="talk left">
      <img src="./images/avatar_femme.png" alt="avatar">
      <p>Fatiguée...</p>
    </div>
    <div class="talk right">
      <p>Pense à prendre des vacances</p>
      <img src="./images/avatar.png" alt="avatar">
    </div>
  </div>

  <form action="" method="post" class="chat-form">
    <div class="container-input">

      <div class="files-logo-cont">
        <i class="fa-solid fa-paperclip"></i>
      </div>

      <div class="message">
        <textarea placeholder="Enter your message" minlength="1" maxlength="1000" name="message"></textarea>
        <i class="fa-regular fa-face-smile"></i>
      </div>

      <input type="submit" name="valider" class="submit-msg-btn">
      </button>



    </div>



  </form>


 </div>
  

</body>
</html>
