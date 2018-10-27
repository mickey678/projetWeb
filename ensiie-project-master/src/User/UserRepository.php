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
        $rows = $this->connection->query('SELECT * FROM "userf"')->fetchAll(\PDO::FETCH_OBJ);
        $users = [];
        foreach ($rows as $row) {
            $user = new User();
                $user->setId($row->id);
                $user->setName($row->nameu);
                $user->setLastname($row->lastname);
                $user->setUsername($row->username);
                $user->setPassword($row->passwordp);
                $user->setMail($row->mail);
            $users[] = $user;
        }

        return $users;
    }


}
// new \DateTimeImmutable($row->birthday));