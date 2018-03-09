<?php
// S'il y des données de postées
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Récupération des variables et sécurisation des données
  $name    = $_POST['name'];
  $email   = $_POST['email'];
  $message = $_POST['message'];

  // Variables concernant l'email

  $destinataire = 'salemine.hirti@gmail.com'; // Adresse email du webmaster (à personnaliser)
  $sujet = 'Contact site'; // Titre de l'email
  $contenu = '<html><head><title>Titre du message</title></head><body>';
  $contenu .= '<p>Bonjour, vous avez reçu un message à partir de votre site web.</p>';
  $contenu .= '<p><strong>Nom</strong>: '.$name.'</p>';
  $contenu .= '<p><strong>Email</strong>: '.$email.'</p>';
  $contenu .= '<p><strong>Message</strong>: '.$message.'</p>';
  $contenu .= '</body></html>'; // Contenu du message de l'email (en XHTML)

  // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
  $headers = 'MIME-Version: 1.0'."\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

  // Envoyer l'email
  mail($destinataire, $sujet, $contenu, $headers); // Fonction principale qui envoi l'email
  echo '<h2>Message envoyé!</h2>'; // Afficher un message pour indiquer que le message a été envoyé
}
?>

<html>
  <head>
    <title>Formulaire de contact</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="responsive.css">
  </head>

  <body>

    <section class="formStyle">
      <h1>Envoie nous un petit mot doux !</h1>
      <form method="POST" action="<?php echo strip_tags($_SERVER['REQUEST_URI']); ?>">
        <label>Ton nom: </label>
        <input type="text" name="name" size="30">
        <br>
        <label>Ton email <span style="color:#f8a348;">*</span>:</label>
        <input type="email" name="email" size="30" required>
        <br>
        <label>Ton message <span style="color: #f8a348;">*</span>:</label>
        <textarea name="message" cols="60" rows="10" required></textarea>
        <br>
        <input type="submit" name="submit" value="Envoyer">
      </form>
    </section>
  </body>
</html>
