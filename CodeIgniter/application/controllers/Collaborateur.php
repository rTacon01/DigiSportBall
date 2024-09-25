<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Collaborateur extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('db_model');
        $this->load->helper('url_helper');
    }

    /**
     * Cette fonction permet d'ajouter un Collaborateur à la BDD via l'ajout de ces informations dans un formulaire d'ajout.
     * 
     */
    public function ajouter()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nom', 'nom', 'required');
        $this->form_validation->set_rules('prenom', 'prenom', 'required');
        $this->form_validation->set_rules('mail', 'mail', 'required|is_unique[t_profil_prf.prf_adresseMailProfil]');
        $this->form_validation->set_rules('ville', 'ville', 'required');
        $this->form_validation->set_rules('telephone', 'telephone', 'required');
        $this->form_validation->set_rules('anneeclub', 'anneeclub', 'required');
        $this->form_validation->set_rules('nomclub', 'nomclub', 'required|is_unique[t_club_clu.clu_nomClub]');
        $this->form_validation->set_rules('division', 'division', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this -> form_validation -> set_message ( 'required' ,  'Le champ {field} est réquis pour se connecter.' );
        $this -> form_validation -> set_message ( 'is_unique' ,  'Le champ {field} existe déjà, merci de mettre un champ différent.' );

        $data['message'] = NULL;

        if ($this->form_validation->run() == FALSE)
        {
            //Récupération du pseudo du compte.
            $data['pseudo'] = $pseudo = $_SESSION['username'];
            //Chargement de la view haut.php
            $this->load->view('templates/haut.php');
            //Chargement de la view menu_administrateur.php
            $this->load->view('templates/menu_administrateur.php');
            //Chargement de la view hero.php
            $this->load->view('templates/hero.php',$data);
            //Chargement de la view ajouter_collaborateur.php
            $this->load->view('ajouter_collaborateur.php',$data);
            //Chargement de la view bas.php
            $this->load->view('templates/bas_administrateur.php');
        }
        else
        {
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $mail = $this->input->post('mail');
            $ville = $this->input->post('ville');
            $adresse = $this->input->post('adresse');
            $telephone = $this->input->post('telephone');
            $anneeClub = $this->input->post('anneeclub');
            $villeClub = $this->input->post('villeclub');
            $nomClub = $this->input->post('nomclub');
            $divisionClub = $this->input->post('division');
            $descriptionClub = $this->input->post('description');

            // Permettre l'ajout de caractères spéciaux au moment de l'insertion de caractères spéciaux lors de l'ajout d'un nom d'un prénom, de la ville, du nom d'un club, d'une description etc...
        
            $nom = addslashes($nom);
            $prenom = addslashes($prenom);
            $ville = addslashes($ville);
            $adresse = addslashes($adresse);
            $villeClub = addslashes($villeClub);
            $nomClub = addslashes($nomClub);
            $descriptionClub = addslashes($descriptionClub);

            //création d'une série de 16 chiffres et lettres qui constitueront le numéro de dossier du collaborateur
            $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $dossier = '';

            for ($i = 0; $i < 16; $i++)
            {
                $dossier .= $caracteres[rand(0,strlen($caracteres) -1)];
            }
            


            if($this->db_model->add_compte_collaborateur($nom, $prenom, $mail, $ville, $telephone, $dossier, $nomClub, $anneeClub, $villeClub, $divisionClub, $descriptionClub))
            {
                $_SESSION['message'] = "Collaborateur ok";
                redirect(base_url()."index.php/accueil/afficher_admin");
            }
            else
            {
                //Récupération du pseudo du compte.
                $data['pseudo'] = $pseudo = $_SESSION['username'];
                //Chargement de la view haut.php
                $this->load->view('templates/haut.php');
                //Chargement de la view menu_visteur.php
                $this->load->view('templates/menu_visiteur.php');
                //Chargement de la view hero.php
                $this->load->view('templates/hero.php',$data);
                //Chargement de la view connexion.php
                $this->load->view('connexion.php',$data);
                //Chargement de la view bas.php
                $this->load->view('templates/bas_administrateur.php');
            }
        }
    }

    /**
     * Fonction qui permet de générer toutes les informations des Collaborateurs présents dans l'application.
     * 
     */
    public function voir()
    {
        $data['pseudo'] = $_SESSION['username'];
        //récupération des informations des collaborateurs.
        $data['collaborateurs'] = $this->db_model->get_all_collaborateurs();
        //Chargement de la view haut.php
        $this->load->view('templates/haut.php');
        //Chargement de la view menu_administrateur.php
        $this->load->view('templates/menu_administrateur.php');
        //Chargement de la view hero.php
        $this->load->view('templates/hero.php',$data);
        //Chargement de la view voir_collaborateur.php
        $this->load->view('voir_collaborateur.php',$data);
        //Chargement de la view bas.php
        $this->load->view('templates/bas_administrateur.php');
    }

    /***
     * Cette fonction permet d'afficher la page d'un collobrateur afin qu'il est son espace.
     * Cette page affiche en autre :
     * -> Les informations de ce collaborateur
     * -> Les informations liées au club du collaborateur
     * -> L'historique de commande liée à ce collaborateur
     */
    public function afficher_page_collaborateur($numDossier = FALSE)
    {
        if ($numDossier==FALSE)
        {   
            $url=base_url(); header("Location:$url");
        }
        else{
            $data['pseudo'] = NULL;
            $data['infos'] = $this->db_model->get_infos_collaborateur($numDossier);
            $data['commandes'] = $this->db_model->get_historique_commande_collaborateur($numDossier);
            $data['articles'] = $this->db_model->get_articles_dispo_club($numDossier);
            
            //Chargement de la view haut.php
            $this->load->view('templates/haut.php');
            //Chargement de la view menu_collaborateur.php
            $this->load->view('templates/menu_collaborateur.php');
            //Chargement de la view hero.php
            $this->load->view('templates/hero.php',$data);
            //Chargement de la view afficher_espace_collaborateur.php
            $this->load->view('afficher_espace_collaborateur.php',$data);
            //Chargement de la view bas.php
            $this->load->view('templates/bas.php');

        }
    }

    /***
     *  Cette fonction permet à un administrateur de se connecter sur l'application 
     *  en remplissant le formualaire avec son pseudo et son mot de passe
     */
    public function connexion_collaborateur()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('numdossier', 'numdossier', 'required');
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
            $this->load->view('connexion_collaborateur.php',$data);
            //Chargement de la view bas.php
            $this->load->view('templates/bas.php');
        }
        else
        {
            $numDossier = $this->input->post('numdossier');
            $password = $this->input->post('mdp');

            //Ajout du sel
            $salt = "OnRajouteDuSelPourAllongerleMDP123!!45678__Test";

            //On ajoute le hash et le sel pour former le mot de passe présent dans la BDD
            $password = hash('sha256', $salt.$password);
            
            if($this->db_model->connect_collaborateur($numDossier,$password))
            {
                //Stockage du numéro de dossier dans la variable de session
                $_SESSION['numdossier']=$numDossier;
                $data['pseudo'] = NULL;
                redirect(base_url()."index.php/collaborateur/afficher_page_collaborateur/".$numDossier );
            } 
            else
            {
                $data['pseudo'] = NULL;
                $data['message'] = 'Compte inconnu, merci de mettre des 
                champs valides !';
                //Chargement de la view haut.php
                $this->load->view('templates/haut.php');
                //Chargement de la view menu_visteur.php
                $this->load->view('templates/menu_visiteur.php');
                //Chargement de la view hero.php
                $this->load->view('templates/hero.php',$data);
                //Chargement de la view connexion.php
                $this->load->view('connexion_collaborateur.php',$data);
                //Chargement de la view bas.php
                $this->load->view('templates/bas.php');
            }
        }

    }

    /***
     * Cette fonction permet à un individu de se déconnecter de l'application.
     */
    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect(base_url()."index.php/accueil/afficher");
    }

}