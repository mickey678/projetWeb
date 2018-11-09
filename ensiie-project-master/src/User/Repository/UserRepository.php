<?php
namespace User\Repository;
include_once '../../../src/User/Hydrator/User.php';
include_once '../../../src/Adapter/DatabaseFactory.php';
include_once '../../../src/User/Entity/User.php';
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
    public function __construct()
    {
        $this->hydrator = new \User\Hydrator\User();
        $this->dbAdapter = new \Adapter\DatabaseFactory();
        $this->dbAdapterFunction= $this->dbAdapter->getDbAdapter();

    }

    public function findByOne($mail,$password){
        $user = null;
        $statement = $this->dbAdapterFunction->prepare('SELECT * FROM "userf" where mail=:mail and passwordp=:password');
        $statement->bindparam(':mail',$mail);
        $statement->bindParam(':password',$password);
        $statement->execute();
        $rows = $statement->fetchAll();
        foreach ($rows as $row){
            $entity = new \User\Entity\User();
            $user = $this->hydrator->hydrate($row, $entity);
        }
        return $user;
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

    public function createUser(User\Entity\User $userObject,$data){
        $userObject->setId($data["id"] ?? null);
        $userObject->setName($data["name"] ?? null);
        $userObject->setPassword($data["password"] ?? null);
        $userObject->setUsername($data["username"] ?? null);
        $userObject->setMail($data["mail"] ?? null);
        $userObject->setLastName($data["lastname"] ?? null);
        return $userObject;

    }



}
// new \DateTimeImmutable($row->birthday));