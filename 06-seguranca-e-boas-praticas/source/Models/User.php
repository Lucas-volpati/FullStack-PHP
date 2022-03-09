<?php

namespace Source\Models;

use Source\Core\Model;

class User extends Model {
    
    /** @var array $safe no update or create */
    protected static $safe = ["id", "created_at", "updated_at"];

    /** @var string $entity database table */
    protected static $entity = "users";

    /** @var array $required table fields */
    protected static $required = ["first_name", "last_name", "email", "password"];

    public function bootstrap(string $firstName, string $lastName, string $email, string $password, string $document = null) :?User {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->document = $document;
        return $this;
    }

    /**
     * @param string $terms
     * @param string $params
     * @param string $columns
     * @return User|null
     */
    public function find(string $terms, string $params, string $columns = "*"): ?User {
        $find = $this->read("SELECT {$columns} FROM ". self::$entity ." WHERE {$terms}", $params);
        if ($this->fail() || !$load->rowCount()) {
            return null;
        }
        return $load->fetchObject(__CLASS__);
    }

    public function findById(int $id, string $columns = "*") :?User 
    {        
        return $this->find("id=:id", "id={$id}", $columns);
    }

    public function findByEmail($email, string $columns = "*") :?User 
    {        
        return $this->find("email=:email", "email={$email}", $columns);
    }

    public function all($limit = 30, $offset = 0, $columns = "*") :?array {
        $all = $this->read("SELECT {$columns} FROM ". self::$entity ." LIMIT :l OFFSET :o", "l={$limit}&o={$offset}");
        if ($this->fail() || !$all->rowCount()) {
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    public function save() :?User {

        if (!$this->required()) {
            $this->message->warning("Nome, sobrenome, email e senha são obrigatórios.");
            return null;
        }
        
        /** User update */
        if (!empty($this->id)) {
            $userId = $this->id;

            $email = $this->read("SELECT id FROM users WHERE email = :email AND id = :id", "email={$this->email}&id={$userId}");

            if ($email->rowCount()) {
                $this->message = "O email informado já está cadastrado!";
                return null;
            }

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$userId}");

            if ($this->fail()) {
                $this->message = "Erro ao atualizar, veririfique os dados";
            }

            $this->message = "Dados atualizados com sucesso!";
        }
        
        /** User Create */
        if (empty($this->id)) {
            if ($this->find($this->email)) {
                $this->message = "O email informado já está cadastrado!";
                return null;
            }

            $userId = $this->create(self::$entity, $this->safe());

            if ($this->fail()) {
                $this->message = "Erro ao cadastrar, veririfique os dados";
            }

            $this->message = "Cadastro realizado com sucesso!";
        }

        $this->data = $this->read("SELECT * FROM users WHERE id = :id", "id={$userId}")->fetch();
        return $this;
    }

    public function destroy() :?User {
        if (!empty($this->id)) {
            $this->delete(self::$entity, "id=:id", "id={$this->id}");
        }

        if ($this->fail()) {
            $this->message = "Não foi póssivel remover o usuário!";
            return null;
        }

        $this->message = "Usuário removido com sucesso!";
        $this->data = null;
        return $this;
    }

    // private function required() :bool {
    //     if (empty($this->first_name) || empty($this->last_name) || empty($this->email)) {
    //         $this->message = "Nome, sobrenome e email são obrigatórios!";
    //         return false;
    //     }

    //     if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
    //         $this->message = "O e-mail informado não parece válido, favor confirmar!";
    //         return false;
    //     }

    //     return true;
    // }


}