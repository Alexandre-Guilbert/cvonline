<?php
// Vérification que le formulaire a été envoyé en POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données envoyées via POST
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validation simple des champs
    if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Paramètres de l'email
        $to = "alexandre.guilbert.pro@gmail.com"; // Remplacez par votre adresse email
        $subject = "Nouveau message de $prenom $nom";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Construction du message à envoyer
        $body = "Nom : $nom\n";
        $body .= "Prénom : $prenom\n";
        $body .= "Email : $email\n\n";
        $body .= "Message :\n$message\n";

        // Envoi de l'email
        if (mail($to, $subject, $body, $headers)) {
            echo "Email envoyé avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'envoi de l'email.";
        }
    } else {
        echo "Veuillez remplir tous les champs correctement.";
    }
} else {
    echo "Le formulaire n'a pas été soumis correctement.";
}
?>
