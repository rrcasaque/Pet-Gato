<?php

    require_once __DIR__."/../utils/BancoDados.php";

    class Animal{
        public static function cadastrar($nome,$raca,$telDono){
            try{
                $conexao = Conexao::getConexao();
                $stmt = $conexao->prepare("INSERT INTO animal(nome,raça,tel_dono,data_cadastro) VALUES (:nomeA,:racaA,:tel_donoA,:data_cadastroA)");            
                $stmt->execute([
                    "nomeA" => $nome,
                    "racaA" => $raca,
                    "tel_donoA" => $telDono,
                    "data_cadastroA" => date("Y/m/d H:i:s.u")                    
                ]);
                if($stmt->rowCount() > 0)
                    return true;
                else
                    return false;
            }
            catch(Exception $e){
                return False;                
            }
        }
        public static function consultar(){
            try{
                $conexao = Conexao::getConexao();
                $stmt = $conexao->prepare("SELECT * from animal");            
                $stmt->execute();                        
                return $stmt->fetchAll();            
            }
            catch(Exception $e){
                return False;                
            }
        }

        public static function consultarRaca(){
            try{
                $conexao = Conexao::getConexao();
                $stmt = $conexao->prepare("SELECT DISTINCT raça from animal");            
                $stmt->execute();                        
                return $stmt->fetchAll();            
            }
            catch(Exception $e){
                return False;                
            }
        }

        public static function consultarTelefone(){
            try{
                $conexao = Conexao::getConexao();
                $stmt = $conexao->prepare("SELECT DISTINCT tel_dono from animal");            
                $stmt->execute();                        
                return $stmt->fetchAll();            
            }
            catch(Exception $e){
                return False;                
            }
        }

        public static function buscarID($id){
            try{
                $conexao = Conexao::getConexao();
                $stmt = $conexao->prepare("SELECT * FROM animal WHERE id = ?");                            
                $stmt->execute([$id]);
                $stmt->execute();                        
                return $stmt->fetchAll()[0];     
            }
            catch(Exception $e){
                return False;                
            }
        }

        public static function buscarAnimaisPorRaca($raca){
            try{
                $conexao = Conexao::getConexao();
                $stmt = $conexao->prepare("select * from animal where raça = ?");            
                $stmt->execute([$raca]);                        
                return $stmt->fetchAll();            
            }
            catch(Exception $e){
                return False;                
            }
        }

        public static function buscarAnimaisPorTelefone($telefone){
            try{
                $conexao = Conexao::getConexao();
                $stmt = $conexao->prepare("select * from animal where tel_dono = ?");            
                $stmt->execute([$telefone]);                        
                return $stmt->fetchAll();            
            }
            catch(Exception $e){
                return False;                
            }
        }
        
        public static function editar($id,$nome,$raca,$telDono){
            try{
                $conexao = Conexao::getConexao();
                $stmt = $conexao->prepare("UPDATE animal SET nome = ?, raça = ?, tel_dono = ? WHERE id = ? ");                            
                $stmt->execute([$nome,$raca,$telDono,$id]);
                if($stmt->rowCount() > 0)
                    return true;
                else
                    return false;
            }
            catch(Exception $e){
                return False;                
            }
        }
        public static function excluir($id){
            try{
                $conexao = Conexao::getConexao();
                $stmt = $conexao->prepare("DELETE FROM animal WHERE id = ? ;");                            
                $stmt->execute([$id]);
                if($stmt->rowCount() > 0)
                    return true;
                else
                    return false;
            }
            catch(Exception $e){
                return False;                
            }
        }
    }

?>