<?php
namespace User;
class FoodRepository
{
    /**
     * @var \PDO
     */
    private $connection;

    /**
     * UserRepository constructor.
     * @param \PDO $connection
     */
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function fetchAll()
    {
        $rows = $this->connection->query('SELECT * FROM "food" ')->fetchAll(\PDO::FETCH_OBJ);
        $foods = [];
        foreach ($rows as $row) {
            $food = new Food();
                $food->setId($row->id);
                $food->setName($row->name);
                $food->setType($row->type);
                $food->setPrice($row->price);
                $food->setQuantity($row->quantity);
                $food->setCodeBarre($row->codebarre);
            $foods[] = $food;
        }

        return $foods;
    }


}
?>