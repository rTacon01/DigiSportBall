<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Compte extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('db_model');
        $this->load->helper('url_helper');
    }

    /***
     *  Cette fonction permet à un administrateur de se connecter sur l'application 
     *  en remplissant le formualaire avec son pseudo et son mot de passe
     */
    public function connexion()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pseudo', 'pseudo', 'required');
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
            $this->load->view('connexion.php',$data);
            //Chargement de la view bas.php
            $this->load->view('templates/bas.php');
        }
        else
        {
            $username = $this->input->post('pseudo');
            $password = $this->input->post('mdp');

            //Ajout du sel
            $salt = "OnRajouteDuSelPourAllongerleMDP123!!45678__Test";

            //On ajoute le hash et le sel pour former le mot de passe présent dans la BDD
            $password = hash('sha256', $salt.$password);
            if($this->db_model->connect_compte($username,$password))
            {
                //Stockage du pseudo dans la variable de session
                $_SESSION['username']=$username;
                $data['pseudo'] = $_SESSION['username'];
                //récupération des informations des commandes pour les administrateurs.
                $data['commandes'] = $this->db_model->get_all_commandes_admin();
                $data['message'] = NULL;
                //Chargement de la view haut.php
                $this->load->view('templates/haut.php');
                //Chargement de la view menu_visteur.php
                $this->load->view('templates/menu_administrateur.php');
                //Chargement de la view hero.php
                $this->load->view('templates/hero.php',$data);
                //Chargement de la view connexion.php
                $this->load->view('accueil_admin.php',$data);
                //Chargement de la view bas.php
                $this->load->view('templates/bas_administrateur.php');        
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
                $this->load->view('connexion.php',$data);
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


    /***
     * Cette fonction permet d'afficher toutes les informations d'un compte administrateur.
     */
    public function afficher()
    {
        //Récupération du pseudo du compte.
        $data['pseudo'] = $pseudo = $_SESSION['username'];
        //Récupération des informations de compte grâce à ce pseudo
        $data['infos'] = $this->db_model->get_infos_compte($pseudo);
        //Chargement de la view haut.php
        $this->load->view('templates/haut.php');
        //Chargement de la view menu_visteur.php
        $this->load->view('templates/menu_administrateur.php');
        //Chargement de la view hero.php
        $this->load->view('templates/hero.php',$data);
        //Chargement de la view profil.php
        $this->load->view('profil.php',$data);
        //Chargement de la view bas.php
        $this->load->view('templates/bas_administrateur.php');
        
    }

    /***
     * Cette fonction permet d'ajouter un compte administrateur en ajoutant toutes les informations d'un compte dans la BDD de l'application.
     */
    public function ajouter()
    {
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nom', 'nom', 'required');
        $this->form_validation->set_rules('prenom', 'prenom', 'required');
        $this->form_validation->set_rules('pseudo', 'pseudo', 'required|is_unique[t_profil_prf.prf_pseudoProfil]');
        $this->form_validation->set_rules('mail', 'mail', 'required|valid_email|is_unique[t_profil_prf.prf_adresseMailProfil]');
        $this->form_validation->set_rules('mdp', 'mdp', 'required');
        $this->form_validation->set_rules('confirmemdp', 'confirmemdp', 'required|matches[mdp]');
        $this -> form_validation -> set_message ( 'matches' ,  'Confirmation du mot de passe erronnée, veuillez réessayer !' );
        $this -> form_validation -> set_message ( 'required' ,  'Le champ de saisie {field} est vide !' );
        $this -> form_validation -> set_message ( 'is_unique' ,  'Le champ de saisie {field} est pas unique !' );
        $this -> form_validation -> set_message ( 'valid_email' ,  'Merci de mettre une adresse email valide.' );
        $data['message'] = NULL;

        if ($this->form_validation->run() == FALSE)
        {
            //Récupération du pseudo du compte.
            $data['pseudo'] = $pseudo = $_SESSION['username'];
            //Chargement de la view haut.php
            $this->load->view('templates/haut.php');
            //Chargement de la view menu_visteur.php
            $this->load->view('templates/menu_administrateur.php');
            //Chargement de la view hero.php
            $this->load->view('templates/hero.php',$data);
            //Chargement de la view profil.php
            $this->load->view('ajouter_compte.php');
            //Chargement de la view bas.php
            $this->load->view('templates/bas_administrateur.php');
        }
        else
        {
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $mail = $this->input->post('mail');
            $username = $this->input->post('pseudo');
            $password = $this->input->post('mdp');

            // Permettre l'ajout de caractères spéciaux au moment de l'insertion de caractères spéciaux lors de l'ajout d'un nom ou un prénom
            $nom = addslashes($nom);
            $prenom = addslashes($prenom);

            //Ajout du sel
            $salt = "OnRajouteDuSelPourAllongerleMDP123!!45678__Test";

            //On ajoute le hash et le sel pour former le mot de passe présent dans la BDD
            $password = hash('sha256', $salt.$password);
            if($this->db_model->add_compte_admin($nom,$prenom,$username,$mail,$password))
            {
                //Stockage du pseudo dans la variable de session
                $_SESSION['username']=$username;
                $data['pseudo'] = $_SESSION['username'];
                //récupération des informations des commandes pour les administrateurs.
                $data['commandes'] = $this->db_model->get_all_commandes_admin();
                $data['message'] = "compte ok";
                //Chargement de la view haut.php
                $this->load->view('templates/haut.php');
                //Chargement de la view menu_visteur.php
                $this->load->view('templates/menu_administrateur.php');
                //Chargement de la view hero.php
                $this->load->view('templates/hero.php',$data);
                //Chargement de la view connexion.php
                $this->load->view('accueil_admin.php',$data);
                //Chargement de la view bas.php
                $this->load->view('templates/bas_administrateur.php');        
            }
            else
            {
                //Récupération du pseudo du compte.
                $data['pseudo'] = $pseudo = $_SESSION['username'];
                //Chargement de la view haut.php
                $this->load->view('templates/haut.php');
                //Chargement de la view menu_visteur.php
                $this->load->view('templates/menu_administrateur.php');
                //Chargement de la view hero.php
                $this->load->view('templates/hero.php',$data);
                //Chargement de la view profil.php
                $this->load->view('ajouter_compte.php');
                //Chargement de la view bas.php
                $this->load->view('templates/bas_administrateur.php');
            }
        }
    }
}
?>