<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Commande extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('db_model');
        $this->load->helper('url_helper');
    }

    /***
     * Cette fonction permet de d'afficher toutes les commandes présentes dans la BDD de l'application
     * afin que l'administrateur se repère dans le statut de ses commandes.
     */
    public function voir_commandes_admin()
    {
        $data['pseudo'] = $_SESSION['username'];
        //récupération des informations des commandes pour les administrateurs.
        $data['commandes'] = $this->db_model->get_all_commandes_admin();

        //Chargement de la view haut.php
        $this->load->view('templates/haut.php');
        //Chargement de la view menu_visteur.php
        $this->load->view('templates/menu_administrateur.php');
        //Chargement de la view hero.php
        $this->load->view('templates/hero.php',$data);
        //Chargement de la view liste_articles.php
        $this->load->view('liste_articles.php',$data);
        //Chargement de la view bas.php
        $this->load->view('templates/bas_administrateur.php');

    }

    /***
     * Cette fonction affiche par le biais de couple numéro de la commande/mot de passe, la page contenant lecontenu de la commande du client.
     */
    public function connexion_commande()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('numcommande', 'numcommande', 'required');
        $this->form_validation->set_rules('mdp', 'mdp', 'required');
        $this -> form_validation -> set_message ( 'required' ,  'Le champ {field} est réquis pour se connecter.' );
        $data['message'] = NULL;
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['pseudo'] = NULL;
            //Chargement de la view haut.php
            $this->load->view('templates/haut.php');
            //Chargement de la view menu_visteur.php
            $this->load->view('templates/menu_visiteur.php');
            //Chargement de la view hero.php
            $this->load->view('templates/hero.php',$data);
            //Chargement de la view connexion.php
            $this->load->view('connexion_commande.php',$data);
            //Chargement de la view bas.php
            $this->load->view('templates/bas.php');
        }
        else
        {
            $numCommande = $this->input->post('numcommande');
            $password = $this->input->post('mdp');

            //Ajout du sel
            $salt = "OnRajouteDuSelPourAllongerleMDP123!!45678__Test";

            //On ajoute le hash et le sel pour former le mot de passe présent dans la BDD
            $password = hash('sha256', $salt.$password);

            if($this->db_model->connect_commande($numCommande,$password))
            {

                $data['pseudo'] = NULL;
                redirect(base_url()."index.php/commande/afficher_fiche_commande/".$numCommande );
            } 
            else
            {
                $data['message'] = 'Commande inconnu, merci de mettre des 
                champs valides !';
                $data['pseudo'] = NULL;
                //Chargement de la view haut.php
                $this->load->view('templates/haut.php');
                //Chargement de la view menu_visteur.php
                $this->load->view('templates/menu_visiteur.php');
                //Chargement de la view hero.php
                $this->load->view('templates/hero.php',$data);
                //Chargement de la view connexion_commande.php
                $this->load->view('connexion_commande.php',$data);
                //Chargement de la view bas.php
                $this->load->view('templates/bas.php');
            }
        }
    }

    /***
     * Cette fonction permet de d'afficher la page contenant les détails de la commande d'un client.
     */
    public function afficher_fiche_commande($numCommande)
    {
        
        $data['pseudo'] = NULL;
        //récupération des informations des commandes pour les administrateurs.
        $data['commandes'] = $this->db_model->get_commande_client($numCommande);
        $data['articles'] = $this->db_model->get_articles_commande($numCommande);

        //Chargement de la view haut.php
        $this->load->view('templates/haut.php');
        //Chargement de la view menu_visteur.php
        $this->load->view('templates/menu_visiteur.php');
        //Chargement de la view hero.php
        $this->load->view('templates/hero.php',$data);
        //Chargement de la view liste_articles.php
        $this->load->view('commande_client.php',$data);
        //Chargement de la view bas.php
        $this->load->view('templates/bas.php');

    }


    /***
     * Cette fonction permet l'affichage de la fiche récapitulative du panier contenant les articles sélectionnés ainsi que le formulaire pour
     * ajouter le client dans la BDD et confirmer la commande.
     */
    public function get_fiche_commande($nomClub)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nom', 'nom', 'required');
        $this->form_validation->set_rules('prenom', 'prenom', 'required');
        $this->form_validation->set_rules('mail', 'mail', 'required|valid_email|is_unique[t_profil_prf.prf_adresseMailProfil]');
        $this->form_validation->set_rules('adresse', 'adresse', 'required');
        $this -> form_validation -> set_message ( 'required' ,  'Le champ de saisie {field} est vide !' );
        $this -> form_validation -> set_message ( 'is_unique' ,  'Le champ de saisie {field} est pas unique !' );
        $this -> form_validation -> set_message ( 'valid_email' ,  'Merci de mettre une adresse email valide.' );

        $data['message'] = NULL;
        $data['articles'] = $this->db_model->get_articles_panier($_SESSION['id_panier']->pnr_idPanier);
        $data['prix'] = $this->db_model->get_total_panier($_SESSION['id_panier']->pnr_idPanier);

        // On récupère le nom du club et on retire les %20 généré par l'url de l'application
        $nomC = str_replace("%20", " ",$nomClub);
        $data['infos'] = $nomC;

        if ($this->form_validation->run() == FALSE)
        {
            //Récupération du pseudo du compte.
            $data['pseudo'] = NULL;
            //Chargement de la view haut.php
            $this->load->view('templates/haut.php');
            //Chargement de la view menu_visiteur.php
            $this->load->view('templates/menu_visiteur.php');
            //Chargement de la view hero.php
            $this->load->view('templates/hero.php',$data);
            //Chargement de la view fiche_commande.php
            $this->load->view('fiche_commande.php',$data);
            //Chargement de la view bas.php
            $this->load->view('templates/bas.php');
        }
        else
        {
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $mail = $this->input->post('mail');
            $adresse = $this->input->post('adresse');

            //Ajout de la possibilité d'ajouter des caractères spéciaux lors de l'ajout des informations sur le nom et le prénom du client.
            $nom = addslashes($nom);
            $prenom = addslashes($prenom);

            //création d'une série de 16 chiffres et lettres qui constitueront le numéro de dossier du collaborateur et le mot de passe de lié à la commande
            $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $caracteres2 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $numCommande = '';
            $password = '';

            for ($i = 0; $i < 16; $i++)
            {
                $numCommande .= $caracteres[rand(0,strlen($caracteres) -1)];
                $password .= $caracteres2[rand(0,strlen($caracteres2) -1)];

            }

            for ($i = 0; $i < 8; $i++)
            {
                $password .= $caracteres2[rand(0,strlen($caracteres2) -1)];

            }

            //Ajout du sel
            $salt = "OnRajouteDuSelPourAllongerleMDP123!!45678__Test";

            //On ajoute le hash et le sel pour former le mot de passe présent dans la BDD
            $password = hash('sha256', $salt.$password);

            if($this->db_model->update_infos_client($_SESSION['id_profil']->prf_idProfil,$nom,$prenom,$mail,$adresse,$password))
            {
                $idClub = $this->db_model->get_id_club($nomC);
                $prix = $this->db_model->get_total_panier($_SESSION['id_panier']->pnr_idPanier);
                $data['commande'] = $this->db_model->add_commande_client($numCommande,$prix->pnr_prixPanier,$idClub->clu_idClub,$_SESSION['id_profil']->prf_idProfil,$_SESSION['id_panier']->pnr_idPanier);
                unset($_SESSION['id_panier'], $_SESSION['id_profil']);
                $_SESSION['commande'] = $this->db_model->get_last_id_commande();
                redirect(base_url()."index.php/accueil/afficher/");
                
            }

            
            
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
