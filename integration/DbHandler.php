<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbHandler
 *
 * @author chan2
 */

$db = new DbHandler();
//$db->findWord("lepel");
if ($db->findWord("lepel") == TRUE){
    $db->printWord();
}else {
    echo "Geen kaas vandaag";
}

        
class DbHandler {
    // dit noemen we in OO een attribute
    private $word;
    
    //een functie in OO heet een method
    function findWord($word){
        $result = FALSE;
        $this->word = $word;
        // stap 1 : instellen PDO
        $options = [
            PDO::ATTR_ERRMODE               =>  PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    =>  PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES      =>  false,
        ];
        
        $host = '127.0.0.1';
        $charset = 'utf8mb4';
        $db = 'palindroom';
        $user = "root";
        $password = "";
        
        $host = "mysql:host=$host;dbname=$db;charset=$charset";
        
        $sql = "SELECT * FROM palindromen WHERE woord='".$word."';";
        //Stap 2: Connect
        try {
            $conn = new PDO($host,$user,$password,$options);
            // Stap 3: rim tje query
            $stmt = $conn->query($sql);
            // Stap 4: fetch
            if($stmt->rowCount() ==1){
                $result = TRUE;
            }
           // $rs = $stmt->fetchAll();
            
            
        } catch (PDOException $e) {
                echo "fout" . $e->getMessage()."(".$e->getCode().").";
        }
               return $result;
    }
    function printWord(){
        echo $this->word;
    }
  }
    //put your code here
     

