<?php
// Inclure PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Charge les fichiers nécessaires via Composer (si tu utilises Composer pour installer PHPMailer)
require 'vendor/autoload.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $annee_naissance = $_POST['annee-naissance'];
    $niveau = $_POST['niveau'];
    $parent = $_POST['parent'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $chandail = $_POST['chandail'];
    $tshirt = $_POST['tshirt'];

    // Initialiser PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP (à ajuster selon ton fournisseur de services)
        $mail->isSMTP();
        $mail->Host = 'smtp.mail.yahoo.com'; // Hôte du serveur SMTP (ex. Gmail, SendGrid, etc.)
        $mail->SMTPAuth = true;
        $mail->Username = 'riouxj@ymail.com'; // Ton adresse email
        $mail->Password = 'Rio982des$'; // Ton mot de passe
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Expéditeur et destinataire
        $mail->setFrom('riouxj@ymail.com', 'École de Hockey Stinziani Bruneau');
        $mail->addAddress('riouxj@ymail.com'); // Remplace par l'adresse email de destination

        // Sujet
        $mail->Subject = 'Nouvelle Inscription - École de Hockey Stinziani Bruneau';

        // Corps du message
        $body = "Une nouvelle inscription a été soumise :\n\n";
        $body .= "Prénom du joueur: $prenom\n";
        $body .= "Nom du joueur: $nom\n";
        $body .= "Année de naissance: $annee_naissance\n";
        $body .= "Niveau joué 2024-2025: $niveau\n";
        $body .= "Nom du parent responsable: $parent\n";
        $body .= "Numéro de téléphone: $telephone\n";
        $body .= "Email: $email\n";
        $body .= "Grandeur de chandail: $chandail\n";
        $body .= "Grandeur de t-shirt: $tshirt\n";

        // Contenu de l'email
        $mail->Body = $body;

        // Envoi de l'email
        $mail->send();
        echo 'Inscription soumise avec succès.';
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message: {$mail->ErrorInfo}";
    }
}
?>
