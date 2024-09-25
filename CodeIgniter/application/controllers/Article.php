<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Article extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('db_model');
        $this->load->helper('url_helper');
    }

    /***
     * Cette fonction permet d'afficher tous les articles présent dans la BDD de l'application.
     */
    public function lister_articles()
    {
        //Récupération du pseudo de l'administrateur connecté.
        $data['pseudo'] = $_SESSION['username'];
        //récupération des informations liées aux articles.
        $data['articles'] = $this->db_model->get_all_articles();
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
}
