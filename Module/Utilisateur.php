<?php
/**
 * Created by PhpStorm.
 * User: oussama
 * Date: 12/03/2018
 * Time: 23:36
 */
require_once ("ConnexionPDO.php");
class Utilisateur
{
    var $connection;
    function __construct()
    {
        $this->connection = new ConnexionPDO();
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->connection->close();
        unset($this->connection);
    }

    public function authentification($USER_LOGIN , $USER_PASSWORD)
    {
        $data = $this->connection->getDataBase();
        try{
            $query = "SELECT * FROM users WHERE USER_LOGIN = :USER_LOGIN AND USER_PASSWORD = :USER_PASSWORD";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':USER_LOGIN',$USER_LOGIN,PDO::PARAM_STR);
            $stmt->bindParam(':USER_PASSWORD',$USER_PASSWORD,PDO::PARAM_STR);
            $stmt->execute();
            $nombre_ligne = $stmt->rowCount();
            return(($nombre_ligne>0)?1:0);
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function infoUtilisateur($USER_LOGIN)
    {
        $data = $this->connection->getDataBase();
        try{
            $query = "SELECT * FROM users WHERE USER_LOGIN = :USER_LOGIN";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':USER_LOGIN',$USER_LOGIN,PDO::PARAM_STR);
            $stmt->execute();
            $ligne = $stmt->fetch();
            return $ligne;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function AjouterUser($NOM_UTILISATEUR , $Login , $Password , $Email , $TYPE)
    {
        $data = $this->connection->getDataBase();
        try{
            $Password = md5(''.$Password);
            $query = "INSERT INTO `users` ( `USER_NAME`, `USER_LOGIN`, `USER_PASSWORD`, `USER_EMAIL`, `USER_TYPE`, `USER_SCORE`) VALUES ( '$NOM_UTILISATEUR', '$Login', '$Password', '$Email', '$TYPE', '0')";
            //$query = "INSERT INTO users VALUES USER_ID = 'null' NOM_UTILISATEUR = :NOM_UTILISATEUR , LOGIN = :Login ,PASSWORD = :Password , Email = :Email , TYPE = :TYPE,USER_SCORE ='0'";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':NOM_UTILISATEUR',$NOM_UTILISATEUR,PDO::PARAM_STR);
            $stmt->bindParam(':LOGIN',$Login,PDO::PARAM_STR);
            $stmt->bindParam(':PASSWORD',$Password,PDO::PARAM_STR);
            $stmt->bindParam(':Email',$Email,PDO::PARAM_STR);
            $stmt->bindParam(':TYPE',$TYPE,PDO::PARAM_STR);
            $resultat = $stmt->execute();
            if (!$resultat)
            {
                return 0;
            }
            else
            {
                return 1;
            }
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function AjouterQuestion($Question , $ReponseErn1 , $ReponseErn2 , $ReponseErn3 , $ReponseVr)
    {
        $data = $this->connection->getDataBase();
        try{
            $query = "INSERT INTO questions SET QUESTION = '$Question' , REPONSE_ERRONE1 = '$ReponseErn1' ,REPONSE_ERRONE2 = '$ReponseErn2' , REPONSE_ERRONE3 = '$ReponseErn3' , REPONSE_VR = '$ReponseVr'";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':QUESTION',$Question,PDO::PARAM_STR);
            $stmt->bindParam(':REPONSE_ERRONE1',$ReponseErn1,PDO::PARAM_STR);
            $stmt->bindParam(':REPONSE_ERRONE2',$ReponseErn2,PDO::PARAM_STR);
            $stmt->bindParam(':REPONSE_ERRONE3',$ReponseErn3,PDO::PARAM_STR);
            $stmt->bindParam(':REPONSE_VR',$ReponseVr,PDO::PARAM_STR);
            $resultat = $stmt->execute();
            if (!$resultat)
            {
                return 0;
            }
            else
            {
                return 1;
            }
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function QuestionPhoto($Question , $ReponseErn1 , $ReponseErn2 , $ReponseErn3 , $ReponseVr,$image,$path)
    {
        $data = $this->connection->getDataBase();
        try{
            move_uploaded_file( $_FILES['image'] ['tmp_name'], $path);
            $query = "insert into `questions` (`QUESTION`, `REPONSE_ERRONE1`, `REPONSE_ERRONE2`, `REPONSE_ERRONE3`, `REPONSE_VR`, `ETAT`, `LABEL`, `IMAGE`) VALUES (:question ,:repnse_ern1,:repnse_ern2,:repnse_ern3,:repnse_vr,'','',:image) ";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':question',$Question);
            $stmt->bindParam(':repnse_ern1',$ReponseErn1);
            $stmt->bindParam(':repnse_ern2',$ReponseErn2);
            $stmt->bindParam(':repnse_ern3',$ReponseErn3);
            $stmt->bindParam(':repnse_vr',$ReponseVr);
            $stmt->bindParam(':image',$image);
            $resultat = $stmt->execute();
            if (!$resultat) {
                return 0;
            }
            else{
                return 1;
            }
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function ReturnQuestion()
    {
        $data = $this->connection->getDataBase();
        try{
            $query = "SELECT * FROM questions WHERE LABEL = 'current'";
            $stmt = $data->prepare($query);
            return $stmt;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }


    public function Repondre($ID_PARTICIPANT , $Question , $Reponse)
    {
        $data = $this->connection->getDataBase();
        try{
            $query = "SELECT * FROM questions WHERE ID_Question = $Question AND REPONSE_VR = '$Reponse'";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':REPONSE_VR',$Reponse,PDO::PARAM_STR);
            $stmt->bindParam(':QUESTION',$Question,PDO::PARAM_INT);
            $resultat = $stmt->execute();
            $line = $stmt->fetch();
            if ($line["REPONSE_VR"] == $Reponse){
                $this->AjouterPoint($ID_PARTICIPANT);
                return true;
            }
            else
                return false;
           /* if (!$resultat)
            {
                return 0;
            }
            else
            {
                return 1;
            }*/
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function AjouterPoint($ID_PARTICIPANT)
    {
        $data = $this->connection->getDataBase();
        try {
           $query = "UPDATE users SET USER_SCORE = USER_SCORE+1 WHERE USER_ID = $ID_PARTICIPANT";
           $stmt = $data->prepare($query);
           $stmt->bindParam(':ID_PARTICIPANT',$ID_PARTICIPANT,PDO::PARAM_INT);
           $stmt->execute();
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }

    }

    public function UpdateQuestion()
    {
        $data = $this->connection->getDataBase();
        try {
            $query = "SELECT * FROM questions WHERE LABEl = 'current'";
            $stmt = $data->prepare($query);
            $stmt->execute();
            $ligne = $stmt->fetch();
            $ID = $ligne['ID_QUESTION'];
            $query = "UPDATE questions SET LABEL = '' WHERE LABEL='current'";
            $stmt = $data->prepare($query);
            $stmt->execute();
            $this->UpdateNextQuestion($ID);
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function UpdateNextQuestion($ID)
    {
        $data = $this->connection->getDataBase();
        try {
            $ID = $ID+1;
            $query = "UPDATE questions SET LABEL = 'current' WHERE ID_QUESTION = :ID";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':ID',$ID,PDO::PARAM_INT);
            $stmt->execute();
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }
}