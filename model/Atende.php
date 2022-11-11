<?php

    require_once __DIR__."/../utils/BancoDados.php";

    class Atende{
        public static function cadastrar($idFuncionario,$idAnimal){
            try{
                $conexao = Conexao::getConexao();
                $stmt = $conexao->prepare("INSERT INTO atende(id_funcionario,id_animal,data_atendimento) VALUES (:idFuncionarioA,:idAnimalA,:datasAtendimentoA)");            
                $stmt->execute([                    
                    "idFuncionarioA" => $idFuncionario,
                    "idAnimalA" => $idAnimal,
                    "datasAtendimentoA" => date("Y/m/d H:i:s.u")                    
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
                $stmt = $conexao->prepare("select atende.id, animal.nome as nome_animal, animal.id as id_animal, funcionario.nome as nome_funcionario, funcionario.id as id_funcionario, atende.data_atendimento
                from atende join animal
                on atende.id_animal = animal.id
                join funcionario
                on atende.id_funcionario = funcionario.id order by atende.id asc");            
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
                $stmt = $conexao->prepare("SELECT * FROM atende WHERE id = ?");                            
                $stmt->execute([$id]);
                $stmt->execute();                        
                return $stmt->fetchAll()[0];     
            }
            catch(Exception $e){
                return False;                
            }
        }

        public static function buscarAnimaisPorFuncionario($email,$nome){
            try{
                $conexao = Conexao::getConexao();
                $stmt = $conexao->prepare("select atende.id, animal.nome as nome_animal, animal.raça, animal.data_cadastro, animal.tel_dono, animal.id as id_animal, funcionario.nome as nome_funcionario, funcionario.id as id_funcionario, funcionario.email, atende.data_atendimento
                from atende join animal
                on atende.id_animal = animal.id
                join funcionario
                on atende.id_funcionario = funcionario.id where email = ? or funcionario.nome = ? order by atende.id asc");            
                $stmt->execute([$email,$nome]);                        
                return $stmt->fetchAll();            
            }
            catch(Exception $e){
                return False;
            }
        }

        public static function buscarFuncionariosPorAnimais($nome){
            try{
                $conexao = Conexao::getConexao();
                $stmt = $conexao->prepare("select atende.id, animal.nome as nome_animal, animal.id as id_animal, funcionario.nome as nome_funcionario, funcionario.id as id_funcionario, funcionario.email, atende.data_atendimento, funcionario.data_cadastro
                from atende join animal
                on atende.id_animal = animal.id
                join funcionario
                on atende.id_funcionario = funcionario.id where animal.nome = :nomeA order by atende.id asc");            
                $stmt->execute([
                    'nomeA'=>$nome
                ]);                        
                return $stmt->fetchAll();            
            }
            catch(Exception $e){
                return False;
            }
        }

        public static function editar($id,$idFuncionario,$idAnimal){
            try{
                $conexao = Conexao::getConexao();
                $stmt = $conexao->prepare("UPDATE atende SET id_funcionario = ?, id_animal = ? WHERE id = ? ");                            
                $stmt->execute([$idFuncionario,$idAnimal,$id]);
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
                $stmt = $conexao->prepare("DELETE FROM atende WHERE id = ? ;");                            
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
