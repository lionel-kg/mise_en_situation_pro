<?php 
require_once('../php/jeton.php');

class User 
{
    protected $id;
    protected $name;
    protected $firstName;
    protected $imageName;
    protected $image;
    

    static function createFromId(int $id)
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
            SELECT *
            FROM user
            WHERE id = :id
SQL
);
    $stmt->bindParam(':id', $id);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
    $stmt->execute();
    if (($object=$stmt->fetch()) !== false) {
        return $object;
    }
    }
    public function getId():string 
    {
         $stmt = MyPDO::getInstance()->prepare(<<<SQL
            SELECT id
            FROM user
            WHERE id = $this->id
SQL
);
        $stmt->execute();
        $ligne = $stmt->fetch(); 
        return $ligne["id"];
    }
    public function getImage()
    {
         $stmt = MyPDO::getInstance()->prepare(<<<SQL
            SELECT image
            FROM user
            WHERE id = $this->id
SQL
);
        $stmt->execute();
        $ligne = $stmt->fetch();
        if($stmt->rowCount() != 0){
            header("Content-type: image"); 
            echo $ligne['image']; 
        }else{
        echo 'Image non trouvée...';
    }
        // $ligne["image"];
    }
    public function setImage($image)
        {
            $stmt = MyPDO::getInstance()->prepare(<<<SQL
                UPDATE user
                SET image = :image
                WHERE id = $this->id;
SQL
);
        $stmt->bindParam(':image', $image);
        $stmt->execute();
            echo 'mise a jour effectué';
        }

       

    public function getName():string 
    {
         $stmt = MyPDO::getInstance()->prepare(<<<SQL
            SELECT name
            FROM user
            WHERE id = $this->id
SQL
);
        $stmt->execute();
        $ligne = $stmt->fetch(); 
        return $ligne["name"];
    }
    public function getFirstName():string 
    {
         $stmt = MyPDO::getInstance()->prepare(<<<SQL
            SELECT firstname
            FROM user
            WHERE id = $this->id
SQL
);
        $stmt->execute();
        $ligne = $stmt->fetch(); 
        return $ligne["firstname"];
    }

    public function getImageName()
    {
         $stmt = MyPDO::getInstance()->prepare(<<<SQL
            SELECT imagename
            FROM user
            WHERE id = $this->id
SQL
);
        $stmt->execute();
        $ligne = $stmt->fetch();
        if($stmt->rowCount() != 0){
            return $ligne['imagename']; 
        }
        else{
            echo 'Image non trouvée...';
        }
    }
    public function setImageName($imageName)
    {
            $stmt = MyPDO::getInstance()->prepare(<<<SQL
                UPDATE user
                SET imagename = :imagename
                WHERE id = $this->id;
SQL
);
            $stmt->bindParam(':imagename', $imageName);
            $stmt->execute();
            echo 'mise a jour effectué';
        }
    
}