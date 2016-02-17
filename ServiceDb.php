<?php

class ServiceDb
{

    private $db;
    private $entity;

    public function __construct(\PDO $db, EntidadeInterface $entity)
    {
        $this->db = $db;
        $this->entity = $entity;
    }

    public function find($id)
    {
        $query = "Select * from {$this->entity->getTable()} where id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function listar($ordem = null,$limit = null)
    {
       if($limit) {
          $Limit = "Limit $limit";
       } else {
          $Limit = "";
       }

       if($ordem) {
            $query = "Select * from {$this->entity->getTable()} order by {$ordem} {$Limit}";
        } else {
            $query = "Select * from {$this->entity->getTable()} {$Limit}";
        }


        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function inserir()
    {
        $query = "Insert into {$this->entity->getTable()}(nome,nota,email) Values(:nome, :nota, :email)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->entity->getNome());
        $stmt->bindValue(':nota', $this->entity->getNota());
        $stmt->bindValue(':email', $this->entity->getEmail());

        if($stmt->execute()) {
            return true;
        }
    }

    public function alterar($id)
    {
        $query = "Update {$this->entity->getTable()} set nome=:nome, nota=:nota, email=:email Where id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':id', $this->entity->getId());
        $stmt->bindValue(':nome', $this->entity->getNome());
        $stmt->bindValue(':nota', $this->entity->getNota());
        $stmt->bindValue(':email', $this->entity->getEmail());

        if($stmt->execute()) {
            return true;
        }
    }

    public function deletar($id)
    {
        $query = "delete from {$this->entity->getTable()} where id=:id";
   echo $query;     
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);

        if($stmt->execute()) {
            return true;
        }
    }

}