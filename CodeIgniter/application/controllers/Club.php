<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Club extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('db_model');
        $this->load->helper('url_helper');
    }

     /***
     * Cette fonction permet l'affichage de la fiche du club d'un collaborateur grâce au nom de son club.
     */
    public function get_fiche_club($nomClub)
    {
        //A l'affichage de la page, on supprime les données liées au collaborateur
        //On supprime les données liées à la session du collaborateur àprès l'affichage de la page
        unset($_SESSION['numdossier']);        
        // On récupère le nom du club et on retire les %20 générés par l'url de l'application
        $nom = str_replace("%20", " ",$nomClub);
        $_SESSION['nom_club'] = $nom;
        
        $data['articles'] = $this->db_model->get_articles_dispo_club_by_nomClub($nom);
        $data['infos'] = $this->db_model->get_infos_club($nom);

        
        //Dans un premier temps on créer un client avec des informations fictives afin que l'on puisse lui attribuer le panier plus tard
        //Lors du procéder du panier et de la commande
        //On vérifie d'abord si l'id du profil est présente ou non en variable de SESSION
        if(isset($_SESSION['id_profil']))
        {
            //Récupération du pseudo du compte.
            $data['pseudo'] = NULL;

            //Comme la page a déjà été build une fois, on a juste à récupérer les infos pour mettre à jour le prix et les articles sauvegarder
            $data['articles1'] = $this->db_model->get_articles_panier($_SESSION['id_panier']->pnr_idPanier);
            $data['prix'] = $this->db_model->get_total_panier($_SESSION['id_panier']->pnr_idPanier);

            //Chargement de la view haut.php
            $this->load->view('templates/haut.php');
            //Chargement de la view menu_visiteur.php
            $this->load->view('templates/menu_visiteur.php');
            //Chargement de la view hero.php
            $this->load->view('templates/hero.php',$data);
            //Chargement de la view fiche_commande.php
            $this->load->view('fiche_club.php',$data);
            //Chargement de la view bas.php
            $this->load->view('templates/bas.php');
        }
        else{
            
            $nom = "client";
            $prenom = "client";
            //création d'une série de 14 chiffres et lettres qui constitueront un mail fictif
            $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $mail = '';

            for ($i = 0; $i < 14; $i++)
            {
                $mail .= $caracteres[rand(0,strlen($caracteres) -1)];
            }
            $adresse = NULL;
            $password = NULL;

            // On créer un client fictif dans la BDD afin de pouvoir lui attribuer un panier avec les articles que 
            //l'utilisateur ajoutera au fur et à mesure de sa commande
            $this->db_model->add_infos_client($nom, $prenom, $mail, $adresse, $password);
           
            //On récupère son id et on le stock dans une variable de SESSION
            $_SESSION['id_profil'] = $this->db_model->get_last_id_profil();

            //A l'affichage de la fiche de club, on créer un panier comportant aucuns articles 
            $prix = 0;
            $data['add_infos'] = $this->db_model->create_panier($_SESSION['id_profil']->prf_idProfil,$prix);
            //On récupère l'id du panier créé et on le stock dans une variable de session
            $_SESSION['id_panier'] = $this->db_model->get_last_id_panier();

            //Maintenant on peut faire l'affichage du prix du panier ainsi que des articles commandés :
            //Ici normalement rien de commandé pour l'instant.
            $data['articles1'] = $this->db_model->get_articles_panier($_SESSION['id_panier']->pnr_idPanier);
            $data['prix'] = $this->db_model->get_total_panier($_SESSION['id_panier']->pnr_idPanier);


            //Récupération du pseudo du compte.
            $data['pseudo'] = NULL;
            //Chargement de la view haut.php
            $this->load->view('templates/haut.php');
            //Chargement de la view menu_visiteur.php
            $this->load->view('templates/menu_visiteur.php');
            //Chargement de la view hero.php
            $this->load->view('templates/hero.php',$data);
            //Chargement de la view fiche_commande.php
            $this->load->view('fiche_club.php',$data);
            //Chargement de la view bas.php
            $this->load->view('templates/bas.php');

        }
    }

     /***
     * Cette fonction permet lors de la validation de la commande de supprimer les données de la session et de retourner le consommateur à la page d'accueil du site.
     */
    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect(base_url()."index.php/accueil/afficher/");
    }
}
?>