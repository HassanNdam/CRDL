
<?php 


$keyword = '';
$location ='';

if($_GET) {
	if (isset($_GET['s'])) {
		 $keyword = $_GET['s'];

		 };

	if (isset($_GET['location'])) {
		$location = $_GET['location'];
	};
};

$postid = get_post_custom_values('job_id')[0];
$postcontract = get_post_custom_values('job_contract_type')[0];
$postlocation = get_post_custom_values('job_location')[0];
$postactivite = get_post_custom_values('custom_secteur_d\'activite')[0];
$postlink = get_post_custom_values('job_link')[0];
?>

<div class="position-relative p-3 p-md-5 text-center overflow-hidden single-image">
    <div class="show-poste">
      <h4 class="titre-single mt-4"></i><?php echo  the_title_attribute(); ?></h4>
         <div class="row mb-5">
            <div class="col">
                <div class="row">
                    <i class="fa fa-calendar" aria-hidden="true"></i> 
                    <span class="text-muted mt-3"><?php echo 'Publiée le ' . get_the_date(); ?></span>
                </div>
            </div>
            <?php if ($postlocation == ""): else : ?>
            <div class="col">
                <div class="row">
                    <i class="fa fa-globe" aria-hidden="true"></i> 
                    <span class="text-muted mt-3"><?php echo $postlocation ?></span>
                </div>
            </div>
            <?php endif; ?>
            <div class="col">
                <div class="row">
                    <i class="fa fa-pencil" aria-hidden="true"></i> 
                    <span class="text-muted mt-3"><?php echo $postcontract ?></span>
                </div>
            </div>
        </div>
        <a class="" href="<?php echo $postlink; ?>" target="_blank" title="Postuler à l'offre <?php echo the_title_attribute();?>">
            <button type="button" class="btn btn-primary" onclick="this.blur();">Postuler </button>
        </a>
   </div>
</div>

<div class="container mt-5 mb-5">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item accueil"><a href="<?php echo get_site_url();?>">Accueil</a></li>
        <li class="breadcrumb-item " aria-current="page">Nos offres</li>
        <li class="breadcrumb-item active"><?php echo the_title_attribute();?></li>
    </ol>
    </nav>
</div>

<div id="single-page">
    <div class="container mt-5">
        <div class="row justify-content-center">
                <div class="col-lg-9 p-5 border shadow-sm mb-5 text center">
                    <?php the_content();?>
                </div>
        </div>
    </div>
 </div>

 <div class="col-lg-12 text-center">
        <div class="col">
            <a href="<?php echo $postlink ;?>" target="_blank" title="Postuler à l'offre <?php echo the_title_attribute();?>">
                <button type="button" class="btn btn-primary" onclick="this.blur();">Postuler</button>
            </a>
        </div>
            <h3 class="mt-4 text-muted">ou</h3>
        <div class="col mt-4">
            <a class="back-offre-text" href="<?php echo(get_site_url());?>?s=<?php echo($keyword. '&location=' . $location); ?>"  title="Revenir aux offres d'emploi">
                <i class="fa fa-caret-left" aria-hidden="true"></i> Revenir aux offres 
            </a>
        </div>  
 </div>
