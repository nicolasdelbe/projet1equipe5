<?php
$error = "";
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $message = $_POST['message'];
    $nom = $_POST['name'];
    $email = $_POST['email'];

    if ($message == "" || $nom == "" || $email == "") {
        $error = "Il manque des informations";
    } else {
        $handle = fopen(__DIR__ . '/bdd.csv', 'a');
        $csvArray = [
            $message,
            $nom,
            $email,
        ];

        fputcsv($handle, $csvArray);
        fclose($handle);
    }
}
?>
