<?php
class UserTP5
{
    private const LOGIN="toto";
    private const PASSWORD = 'toto';
    private string $login;
    private string $password;
    private int $id;

    public static function fromForm() : ? UserTP4{
        $user=null;
        if((isset($_POST['login']) && $_POST['login']!="") && (isset($_POST['password']) && $_POST['password']!="")) {
            $user = new UserTP4($_POST["login"], $_POST['password']);
        }
        return $user;
    }

    public static function deConnecter(){
        $_SESSION["utilisateur"]=null;
    }

    public function __construct(string $login, string $password){
        $this->login = $login;
        $this->password = $password;
    }

    /*public function verifier() : bool{
        /*if(($this->login == self::LOGIN) && ($this->password == self::PASSWORD)){
            return true;
        }
        else{
            return false;
        }*/

        /*
         * Verifier login, mot de passe
         * set id
      }*/

    public function estConnecter() : bool{
        if(isset($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]!=null){
            return true;
        }
        else{
            return false;
        }
    }

    public function getLogin() : string{
        return $this->login;
    }

    public function getPassword() : string{
        return $this->password;
    }
    public function getId(): int {
        return $this->id;
    }

    public function setLogin(string $login){
        $this->login = $login;
    }
    public function setPassword(string $password){
        $this->password = $password;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function connecter(){
        $_SESSION["utilisateur"] = $this;
    }

    public function __toString() : string{
        return "login: ".$this->getLogin().", password: ".$this->getPassword()."";
    }
}