<?php
// Déclaration des variables et test par le GET

global $wp_query;
$args = $wp_query -> query_vars; 
$args ['post_type'] = 'post';

$metaquery = array(); 


$keyword = '';
$location ='';
$contrat = '0';

if($_GET) {

	if (isset($_GET['s'])) {
		 $keyword = $_GET['s'];
		 };

	if (isset($_GET['contrat'])) {
		$contrat = $_GET['contrat'];

		if ($contrat > 0) {
			array_push($metaquery, array(
						'key' => 'job_contract_type',
				        'value' => CONTRAT[$contrat -1],
				        'compare' => '=',)
				);
		};
	}
    if (isset($_GET['location'])) {
		$location = $_GET['location'];
		if ($location > '') {

			if (is_numeric($location)) {
				array_push($metaquery, array(
			        'key' => 'job_id',
			        'value' => '^' . $location,
			        'compare' => 'REGEXP',
			    ));
			} else {
			array_push($metaquery, array(
			        'key' => 'job_location',
			        'value' => $location,
			        'compare' => 'LIKE',
			    ));
			};
		};
	};


};


$args['meta_query'] = $metaquery;

$myquery = new WP_Query($args);

$wp_query = $myquery;


?>

<div class="position-relative p-3 p-md-5 overflow-hidden header-image">
   <!-- header image & Text -->
   <div class="container header-text">
    <h1 class="crdl-text">CRDL</h1>
    <h1 class="cabinet-text">Cabinet de Recrutement Didier Locoge</h1>
    <h1 class="partner-text mt-5"> Le partenaire de vos recrutements</h1>
   </div>
</div>


<!-- Formulaire de recherche -->
    
 <div class="container position-relative  text-center p-5"> <!--bg-light-transparent -->
        <form method="get" id="search-form" action="<?php echo get_site_url(); ?>">
			<div class="row searchrow justify-content-center">
				<div class="col-md-6 ">
                    <input type="text" id="location" name="location" class="form-control" placeholder="DEPARTEMENT, VILLE, CP" value="<?php echo $location; ?>">
				</div>

				<div class="col-md-6">
					<select name="contrat" id="_contrat-field" class="form-control form-select espace-mob-formulaire">
						<option value="0" <?php if ($activite == '0') echo('selected'); ?>>TYPE DE CONTRAT</option>
						<?php 
						$size = count(CONTRAT);
						for($i=0; $i < $size;++$i) {
							echo("<option value='" . ($i + 1) . "'");
							if($contrat == $i + 1) {
								echo(" selected='selected'");
							}
							echo(">". CONTRAT[$i]. "</option>");
						};
						?>

					</select>
				</div>
			</div>
			<div class="row justify-content-center mt-4">
				<div class="col-md-12 search-item">
					<input type="text" id="s" name="s" placeholder=" MOT CLÉS" class="form-control " value="<?php echo $keyword; ?>">
				</div>

				<div class=" col-md-6">
                       <!-- Pour le prochain formulaire -->
				</div>
			</div>
			<div class="row justify-content-center mt-5 mb-1">
					<button type="submit" id="searchsubmit" class="btn" name="search" value="search" title="Lancer votre recherche"><i class="fa fa-search" aria-hidden="true"></i> Rechercher <span class="Search-display">des offres</span></button>
			</div>
		</form>
</div>

<div class="container">
    <h1 class="nos-offres">Nos offres d'emploi</h1>
</div>

<!-- Affichage poste -->

<div class="container-xxl">
    <?php if ( $myquery->have_posts() ) : ?>
        <?php 
        $index = 0; 
        $compteur = 1;  
        while ( $myquery->have_posts() ) : $myquery->the_post(); ?>
            <?php if ( $index % 2 == 0 ) : ?>
            <div class="row">
            <?php endif; ?>

            <?php 
                $postid = get_post_custom_values('job_id')[0];
                $postcontract = get_post_custom_values('job_contract_type')[0];
                $postlocation = get_post_custom_values('job_location')[0];
                $postlink = get_post_custom_values('job_link')[0];
            ?>
            <div class="col-lg-6 mt-1 mb-4">
                <div class="block-offre mb-4 position-relative">
                    <div class="row align-items-center">
                        <div class="col-2">
                                <!-- espace vide -->
                        </div>
                        <div class="col-10"><div>			
                            <div class="row mt-2">
                                    <h4 class="titre-post"> <?php echo the_title_attribute();?></h4>	               
                            </div>
                                <div class="row">
                                        <h4 class="local-offre mt-3"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $postlocation; ?></h4>
                                        <h4 class="type-offre mt-3 mb-4"><i class="fa fa-briefcase" aria-hidden="true"></i>  <?php echo $postcontract?></h4>
                                </div>
                            </div>                  
                            <div class="col-12 text-center">
                                <a href="<?php the_permalink() ?>?s=<?php echo($keyword . '&location=' . $location); ?>" class="stretched-link" title="Visiter l'offre d'emploi <?php echo the_title_attribute();?>">
                                    <button type="submit"  class="btn btn-primary see-post">Voir l'offre</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                        
            <?php $index += 1; $compteur++; ?>
            <?php if ( $index %2 == 0 ) : ?>
                </div>
            <?php endif; ?>

            <!-- Fin boucle-->

        <?php endwhile; wp_reset_postdata(); ?>
        <?php if ( $index %2 <> 0 ) : ?>
        </div>
        <?php endif; ?>


    <?php else : ?>
            <div class="container post-non-trouve shadow-sm rounded-3 mt-5 mb-5 ">
                <div class="row justify-content-center mt-4">  
                    <div class="col-lg-4 text-center">
                    <h3 class="aucun-poste mt-3 mb-3">Aucune offre ne correspond à votre recherche !</h3>
                        <a class="revenir-liste mt-4" href=<?php echo get_site_url();?>><i class="fa fa-angle-left" aria-hidden="true"></i> Retour aux offres</a>
                    </div>
                        <div class="col-lg-4 text-center">
                         <i class="fa fa-search-minus" aria-hidden="true"></i>
                        </div>
                        <div class="col-lg-4 text-center">
                        <h3 class="aucun-poste mt-3 mb-3">Soumettre une candidature spontanée :</h3>
                            <a  class="mt-5" href="https://jobaffinity.fr/apply/h1luaspclin9a0748n" target="_blank" title="Soumettre une candidature spontanée">
                                <button type="button" class="btn btn-primary" onclick="this.blur();"><i class="fa fa-pencil" aria-hidden="true"></i> Candidature spontanée</button>
                            </a>
                        </div>
                 </div>
            </div>
    <?php endif; ?>
</div>

<div class="container d-flex align-items-center justify-content-center mt-5">
        <div class="mb-4">
                        <?php pagination_post();?> 
        </div>
</div>