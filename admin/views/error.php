<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
 
if (! $error) {
    $error = 'Oups! Une erreur s’est produite.';
}
?>
        <h1>Une erreur s’est produite</h1>
        <p class="error"><?php echo $error; ?></p>  
    