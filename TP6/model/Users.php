<?php
include "UserModel.php";
class Users {
    private int $id;
    private string $login;
    private string $password;

    public static function deConnecter(){
        if($_SESSION['utilisateur']!=null) $_SESSION['utilisateur']=null;
    }
    public static function estConnecter() : bool{
        $bool = false;
        if(isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']!=null){
            $bool=true;
        }
        return $bool;
    }
    public static function fromForm() : ? Users{
        $user=null;
        if((isset($_POST['login']) && $_POST['login']!="") && (isset($_POST['password']) && $_POST['password']!="")) {
            $user = new Users($_POST["login"], $_POST['password']);
        }
        return $user;
    }

    public function __construct( string $login, string $password){
        $this->password=$password;
        $this->login=$login;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin(): string {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): string {
        return $this->password;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void {
        $this->login = $login;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function connecter(){
        $this->setId(UserModel::getID($this));
        $table = ['id' => $this->id, 'login' => $this->login, 'password' => $this->password];
        $_SESSION['utilisateur'] = $table;
        var_dump($_SESSION['utilisateur']);
        var_dump($_SESSION);
    }

    public function check() : bool{
        return UserModel::checkPassword($this);
    }
}