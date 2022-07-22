<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?php echo bloginfo('name');?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="<?php echo (get_template_directory_uri() . '/assets/icone/favicone.png') ?>" sizes="16x16 32x32 48x48 64x64">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
<?php
include_once("listes.php");
wp_head();
?>
</head>
<body>

<header class="site-header shadow-sm ">
    <nav class="navbar navbar-default navbar-expand d-flex container flex-column flex-md-row justify-content-between py-2">
        <a class="navbar-brand" title="Aller sur https://www.crdl.fr/" href="https://www.crdl.fr/" target="_blank">
            <img src="<?php echo get_template_directory_uri(). '/assets/logo/logo.jpeg'?>" alt="Logo CRDL" class="img-fluid" title="Cliquer pour revenir sur la page d'accueil du site"> 
        </a>
    <div class="d-flex">
        <a href="https://jobaffinity.fr/apply/ihjqj1vyqk2rd22mmq" target="_blank">
            <button type="button" class="btn btn-primary" onclick="this.blur();" title="Postulez pour une candidature spontanée"> <i class="fa fa-pencil" aria-hidden="true"></i> Candidature spontanée</button>
        </a>
    </div>
    </nav>

</header>


