<?php

class Brand
{
    private ?int $id =null;
    private ?string $name =null;
    private ?String $description =null;    
    private $connection;
    public function __construct()
    {
        $this -> connection = Database::Connect();
    }
 public function list()
 {
     try 
     {
        $query = $this->connection->prepare("select * from brand");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
     } 
     catch (Exception $e) 
     {
         die($e->getMessage());
     }
 }
 public function insert()
    {
        try
        {
        $query = "INSERT INTO brand (name,description) VALUES (?,?);";
        $this -> connection-> prepare($query)
                            ->execute(array
                            (
                                $this->name,
                                $this->description                                
                            ));
                            $this->id=$this->connection->lastInsertId();
                            return $this;
                        }catch(Exception $e){
                            die($e->getMessage());
                        }
                            
    }

    public function update()
    {
        try 
        {
           $query="UPDATE brand SET
           name=?,
           description=?           
           WHERE id=?;";
           $this-> connection->prepare($query)
           ->execute(array(
               $this->getName(),
               $this->getDescription(),               
               $this->getId(),
           ));
           return $this;
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function getById($id){
        try{
        $query= "SELECT * FROM brand where id=?;";
        $query= $this-> connection-> prepare($query);
        $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $query->execute(array($id));
        return $query->fetch();

    }catch(Exception $e){
        die($e->getMessage());
        }
    }
    public function delete(){
        try{
            $query= "DELETE FROM brand WHERE id=?;";
            $this-> connection->prepare($query)
                            ->execute(array($this->id));
        }catch(Exception $e){
            die($e->getMessage());

        }
    }
    /**
     * Get the value of id
     */ 
    function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    function getName() : ?string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of cost
     */ 
    function getDescription() : ?String
    {
        return $this->description;
    }

    /**
     * Set the value of cost
     *
     * @return  self
     */ 
    function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
   
}

?>