<?php

require_once __DIR__."/../utils/BancoDados.php";

    class Funcionario{
        public static function cadastrar($nome,$email){
            try{
                $conexao = Conexao::getConexao();
                $stmt = $conexao->prepare("INSERT INTO funcionario(nome,email,data_cadastro) VALUES (:nomeF,:emailF,:data_cadastroF)");            
                $stmt->execute([
                    "nomeF" => $nome,
                    "emailF" => $email,                    
                    "data_cadastroF" => date("Y/m/d H:i:s.u")                    
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
                $stmt = $conexao->prepare("SELECT * from funcionario");            
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
                $stmt = $conexao->prepare("SELECT * FROM funcionario WHERE id = ?");                            
                $stmt->execute([$id]);
                $stmt->execute();                        
                return $stmt->fetchAll()[0];     
            }
            catch(Exception $e){
                return False;                
            }
        }

        public static function editar($id,$nome,$email){
            try{
                $conexao = Conexao::getConexao();
                $stmt = $conexao->prepare("UPDATE funcionario SET nome = ?, email = ? WHERE id = ? ");                            
                $stmt->execute([$nome,$email,$id]);
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
                $stmt = $conexao->prepare("DELETE FROM funcionario WHERE id = ? ;");                            
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
