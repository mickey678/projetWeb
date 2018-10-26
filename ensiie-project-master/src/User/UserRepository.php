<?php
namespace User;
class UserRepository
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
        $rows = $this->connection->query('SELECT * FROM "user"')->fetchAll(\PDO::FETCH_OBJ);
        //var_dump($rows);
        $users = [];
        foreach ($rows as $row) {
           //var_dump($row->username);
            $user = new User();
            $user->setID($row->id);
            $user->setLastname($row->lastname);
            $user->setName($row->name);
            $user->setPassword($row->passwordd);
            $user->setUsername($row->username);
            $user->setMail($row->mail);
            $users[] = $user;
        }
       
        return $users;
    }


}
// new \DateTimeImmutable($row->birthday));