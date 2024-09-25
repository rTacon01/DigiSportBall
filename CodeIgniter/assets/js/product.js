  var idTaille = 1;
  var quantity = 1  ;

  function choisirTaille(taille) {
    if(taille === null)
    {
      taille = 1;
      idTaille = taille;
    }else
    {idTaille = taille;}
  }

  function ajouterPanier(profilId, articleId, prixArticle, nomClub, quantityInputId) {
    quantite = document.getElementById(quantityInputId).value;
    var url = "https://romaintacon.abalone.studio/index.php/panier/add_article_panier/" + profilId + 
    "/" + articleId + "/" + idTaille + "/" + prixArticle + "/" + quantite + "/" + nomClub;
    document.location.replace(url);
  }

  function deleteArticle(PanierId, articleId, prixArticle, taille, quantityPanier, nomClub) {
    var url = "https://romaintacon.abalone.studio/index.php/panier/delete_article_panier/" + PanierId + 
    "/" + articleId + "/" + taille + "/" + prixArticle + "/" + quantityPanier + "/" + nomClub;
    document.location.replace(url);
  }