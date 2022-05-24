<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">E-Commerce</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      
                 <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="inscription.php"><?php echo ucfirst(LANGUE["inscription"]);?></a>
                 </li>

                 <li class="nav-item">
                   <a class="nav-link active text-white" aria-current="page" href="formDeContact.php"><?php echo ucfirst(LANGUE["Contact"]); ?></a>
                   
                 </li>

                 <li class="nav-item">
                   <a class="nav-link active text-white" aria-current="page" href="connexionClient.php"><?php echo ucfirst(LANGUE["Connexion"]); ?></a>
                 </li>
                   <span class="nav-item mt-2 text-white">/</span>
                 <li class="nav-item ">
                   <a class="nav-link active text-white" aria-current="page" href="deconnexion.php"><?php echo ucfirst(LANGUE["Deconnexion"]); ?></a>
                 </li>
                 
                 <li class="nav-item ">
                 <a href="cart.php"  class="nav-link active text-white " >
                    <img src="inc/panier.png" alt="mon panier" width="30"  class= ms-2>
                  </a>

                 </li>

                 <li class="nav-item ">
                 <a href="reglages.php"  class="nav-link active text-white " >
                    <img src="inc/langue.png" alt="mon panier" width="30"  class= ms-2>
                  </a>

                 </li>

          

            </ul>

            <div>
            <a href="admin/profilAdmin.php" class= "nav-link active text-white"><?php echo ucfirst(LANGUE["Menu Admin"]); ?>
            <img src="inc/admin.png" alt="#" width="40"  class= me-4>
            </div>   </a>
            
            <form class="d-flex" action="index.php"  method ="GET">
              <input class="form-control  me-4" type="search" placeholder=<?php echo ucfirst(LANGUE["Produit"]); ?>  aria-label="Search" name="nom">
              <button class="btn btn-outline-light" type="submit"><?php echo ucfirst(LANGUE["Rechercher"]); ?></button>
            </form>
            
            
          </div>
        </div>
      </nav>