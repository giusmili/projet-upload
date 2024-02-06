<?php

# Vérifier si le formulaire a été soumis : méthode de vérification empty()
class CotrollerBase{
    static function user(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            # Contrôles de saisie
            $errors = array();
        
            # Vérifier le nom
            if (empty($_POST["nom"])) {
                $errors[] = "Le nom est obligatoire.";
            } else {
                $nom = htmlspecialchars($_POST["nom"]);
            }
        
            # Vérifier le prénom
            if (empty($_POST["prenom"])) {
                $errors[] = "Le prénom est obligatoire.";
            } else {
                $prenom = htmlspecialchars($_POST["prenom"]);
                session_start();
                $_SESSION["prenom"] = $prenom;
            }
        
            # Vérifier l'âge
            if (empty($_POST["age"]) || !is_numeric($_POST["age"]) || $_POST["age"] <= 0) {
                $errors[] = "L'âge doit être un nombre positif.";
            } else {
                $age = htmlspecialchars($_POST["age"]);
            }
        
            # Vérifier la ville
            if (empty($_POST["ville"])) {
                $errors[] = "La ville est obligatoire.";
            } else {
                $ville = htmlspecialchars($_POST["ville"]);
            }
        
            if ($_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
                $photo_name = htmlspecialchars(basename($_FILES["photo"]["name"]));
                
                # Vérifier l'extension et autoriser une extention
                $allowed_extensions = array("jpg", "jpeg", "png");
                $photo_extension = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));
        
                if (!in_array($photo_extension, $allowed_extensions)) {
                    $errors[] = "L'extension de la photo doit être jpg, jpeg, ou png.";
                }
        
                # Vérifier la taille maximale (2 Mo ici, mais tu peux ajuster selon tes besoins)
                $max_size = 2 * 1024 * 1024; # 2 Mo
                if ($_FILES["photo"]["size"] > $max_size) {
                    $errors[] = "La taille de la photo ne doit pas dépasser 2 Mo.";
                }
        
                move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $photo_name);
            } else {
                $errors[] = "Erreur lors du téléchargement de la photo.";
            }
        
            // Afficher les résultats
            if (empty($errors)) {
                
                echo "<li><h2>Voici vos informations :</h2></li>
                <li><strong>Nom :</strong> $nom</li>
                <li><strong>Prénom :</strong> $prenom</li>
                <li><strong>Âge :</strong> $age ans</li>
                <li><strong>Ville :</strong> $ville</li>
                <li><img src='uploads/$photo_name' alt='Photo'></li>";
            } else {
                // Afficher les erreurs
                echo "<h2>&#128533; Erreurs :</h2>";
                  
                foreach ($errors as $error) {
                    print "<li class=\"alert\">$error</li>";
                }
                
            }
        }
    }
}
CotrollerBase::user();
