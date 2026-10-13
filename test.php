<?php 
$notes = [];
while( $notes !== "fin");
{
    $notes[] = (int)readline("Entrez une note (ou tapez 'fin' pour terminer) : ");
    foreach ($notes as $note) {
        if ($note !== "fin") {
            echo " - $note\n";
        }
    }
}

?>