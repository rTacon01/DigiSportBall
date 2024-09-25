<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accueil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('db_model');
        $this->load->helper('url_helper');
    }

    /***
     * Cette fonction permet d'afficher les informations sur la page d'accueil de l'application.
     */
    public function afficher()
    {
        $data['pseudo'] = NULL;
        $data['articles'] = $this->db_model->get_all_articles_limite();
        $data['commandes'] = $this->db_model->get_nb_commandes();
        $data['comptes'] = $this->db_model->get_nb_comptes();
        $data['article'] = $this->db_model->get_nb_articles();
        $data['clubs'] = $this->db_model->get_nb_clubs();
        $data['message'] = NULL;
        $count = 0;
        if (isset($_SESSION['commande']) && $count == 0)
        {
            $data['message'] = $_SESSION['commande'];
            $count = 1; 
        }

        if($count == 1)
        {
            $this->session->sess_destroy();
        }

        //Chargement de la view haut.php
        $this->load->view('templates/haut.php');

        //Chargement de la view menu_visteur.php
        $this->load->view('templates/menu_visiteur.php');

        //Chargement de la view hero.php
        $this->load->view('templates/hero.php',$data);

        //Chargement de la viex page_accueil.php
        $this->load->view('page_accueil.php',$data);

        //Chargement de la view bas.php
        $this->load->view('templates/bas.php');

    }

    /***
     * Cette fonction permet d'afficher les informations sur la page d'accueil de l'administrateur de l'application.
     */
    public function afficher_admin()
    {

        //Récupération du pseudo de l'administrateur connecté
        $data['pseudo'] = $_SESSION['username'];
        //récupération des informations des commandes pour les administrateurs.
        $data['commandes'] = $this->db_model->get_all_commandes_admin();
        $count = 0;
        $data['message'] = NULL;
        if (isset($_SESSION['message']) && $count == 0)
        {
            $data['message'] = $_SESSION['message'];
            var_dump($data['message']);
            $count = 1; 
        }

        if($count == 1)
        {
            unset($_SESSION['message']);
        }
        //Chargement de la view haut.php
        $this->load->view('templates/haut.php');
        //Chargement de la view menu_visteur.php
        $this->load->view('templates/menu_administrateur.php');
        //Chargement de la view hero.php
        $this->load->view('templates/hero.php',$data);
        //Chargement de la view accueil_admin.php
        $this->load->view('accueil_admin.php',$data);
        //Chargement de la view bas.php
        $this->load->view('templates/bas_administrateur.php');

    }
}
?>