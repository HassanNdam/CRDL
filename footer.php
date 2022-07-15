
<!-- Footer -->

<footer class="text-center mt-5 pt-3 text-lg-start bg-light text-muted" style=" border-top: 1px solid #0c71c3">
  <section>
    <div class="container text-center text-md-start ">
      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <a href="https://www.crdl.fr/" target="_blank">
            <img class ="img-fluid"src="<?php echo (get_template_directory_uri() . '/assets/logo/Logo-footer.png') ?>" alt="" width="100">
          </a>
        </div>
        <div class="col-md-3 col-lg-2 col-xl-3 mb-4">
            <a href="https://www.crdl.fr/index.php/formulaire-client/?et_fb=1&PageSpeed=off" class="text-reset" target="_blank">Contactez-Nous</a>
        </div>
        <div class="col-md-3 col-lg-2 col-xl-3 mx-auto mb-4">
            <a href="https://www.crdl.fr/index.php/mentions-legales/?et_fb=1&PageSpeed=off" class="text-reset" target="_blank">Mentions légales</a>
        </div>
      </div>
    </div> 
  </section>
  <div class="text-center p-4 text-white" style="background-color: #0e18dc;">
    © 2022 Copyright @ Designed by:
    <a class="text-reset fw-bold" href="https://paradisiak.com/" target="_blank">Paradisiak</a>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="<?php echo(get_template_directory_uri() . '/assets/js/main.js') ?>" defer></script>


<!-- Intégration des données cookies & RGPD -->

<div id="wrapper">
    <div class="cookie-container text-center alert alert-dismissible fade show" role="alert">
        <h1 class="mb-4 mt-5">Ce site utilise des Cookies</h1>
      <p class="cookie-text text-center text-justify">
        Nous utilisons les cookies dans ce site pour vous offrir la meilleure 
        expérience de navigation possible. Bien vouloir lire notre 
        <a href="https://www.crdl.fr/index.php/conditions-generales-de-ventes/?et_fb=1&PageSpeed=off" target="_blank">Politique de confidentialité</a> et la <a href="https://www.crdl.fr/index.php/conditions-generales-de-ventes/?et_fb=1&PageSpeed=off" target="_blank">Politique des Cookies</a>.
      </p>
      <p class=" text-center text-white text-justify">
        Nos données sont traitées conformément au Réglement Général de la Protection des Données (RGPD).
      </p>
      <button class="cookie-btn mt-4" title="Nous respectons votre vie privée et les règles RGPD"><i class="fa fa-check" aria-hidden="true"></i> Accepter et fermer</button>
      <button type="button" class="btn-close bg-danger" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

<script>
    const cookieContainer = document.querySelector(".cookie-container");
    const cookieButton = document.querySelector(".cookie-btn");

    cookieButton.addEventListener("click", () => {
    cookieContainer.classList.remove("active");
    localStorage.setItem("cookieBannerDisplayed", "true");
    });

    setTimeout(() => {
    if (!localStorage.getItem("cookieBannerDisplayed")) {
    cookieContainer.classList.add("active");
    }
    }, 1500);
</script>

</body>
</html>