<?php


class ModelAdmin
{


    public function getAdminByEmail($mail){
        global $dsn, $user, $pass;

        $adminG = new AdminGateway(new Connection($dsn,$user,$pass));
        $result = $adminG->finAdminByEmail($mail);

        if (empty($result)){
            return NULL;
        }



        $admin = $result[0];

        return new Admin($admin['pseudo'],$admin['password'],$admin['nom'],$admin['prenom'],$admin['email']);

    }

    public function login($login, $mdp)
    {

        if (!Validation::isEmail($login)) {
            throw new Exception('c pas un email');
        }
        $admin =$this->getAdminByEmail($login);

        if ($admin == null) {
            throw new Exception('Mauvaise email');
        }

        if (!password_verify($mdp,$admin->getMotDePasse())){
            throw new Exception('Mauvais mdp');
        }
        $_SESSION['login'] = $login;
        $_SESSION['role'] = "admin";

    }
    public function logout(){
        session_destroy();
        unset($_SESSION);
        $_SESSION = array();
    }

    public function isAdmin()
    {
         if(isset($_SESSION['login']) && isset($_SESSION['role']))
            {
             $login=Validation::purify($_SESSION['login']);
             $admin =$this->getAdminByEmail($login);
            return $admin;
            }
        else return null;
        }


}