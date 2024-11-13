<?php
// Inclure PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Charger les fichiers nécessaires via Composer (si tu utilises Composer pour installer PHPMailer)
require 'vendor/autoload.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $annee_naissance = htmlspecialchars($_POST['annee-naissance']);
    $niveau = htmlspecialchars($_POST['niveau']);
    $parent = htmlspecialchars($_POST['parent']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $email = htmlspecialchars($_POST['email']);
    $chandail = htmlspecialchars($_POST['chandail']);
    $tshirt = htmlspecialchars($_POST['tshirt']);

    // Initialiser PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.mail.yahoo.com'; // Hôte du serveur SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'riouxj@ymail.com'; // Ton adresse email
        $mail->Password = 'Rio982des$'; // Ton mot de passe
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Expéditeur et destinataire
        $mail->setFrom('riouxj@ymail.com', 'École de Hockey Stinziani Bruneau');
        $mail->addAddress('riouxj@ymail.com'); // Adresse email de destination

        // Sujet
        $mail->Subject = 'Nouvelle Inscription - École de Hockey Stinziani Bruneau';

        // Corps du message en HTML
        $mail->isHTML(true);
        $mail->Body = "<h2>Nouvelle inscription soumise :</h2>
                       <p><strong>Prénom du joueur:</strong> $prenom</p>
                       <p><strong>Nom du joueur:</strong> $nom</p>
                       <p><strong>Année de naissance:</strong> $annee_naissance</p>
                       <p><strong>Niveau joué 2024-2025:</strong> $niveau</p>
                       <p><strong>Nom du parent responsable:</strong> $parent</p>
                       <p><strong>Numéro de téléphone:</strong> $telephone</p>
                       <p><strong>Email:</strong> $email</p>
                       <p><strong>Grandeur de chandail:</strong> $chandail</p>
                       <p><strong>Grandeur de t-shirt:</strong> $tshirt</p>";

        // Version alternative en texte brut
        $mail->AltBody = "Nouvelle inscription soumise :\n\n" .
                         "Prénom du joueur: $prenom\n" .
                         "Nom du joueur: $nom\n" .
                         "Année de naissance: $annee_naissance\n" .
                         "Niveau joué 2024-2025: $niveau\n" .
                         "Nom du parent responsable: $parent\n" .
                         "Numéro de téléphone: $telephone\n" .
                         "Email: $email\n" .
                         "Grandeur de chandail: $chandail\n" .
                         "Grandeur de t-shirt: $tshirt\n";

        // Envoi de l'email
        $mail->send();
        echo 'Inscription soumise avec succès.';
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message: {$mail->ErrorInfo}";
    }
}
?>
