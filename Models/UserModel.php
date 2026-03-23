<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['email', 'email_hash', 'last_login_at'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';

    public function findByEmail(string $email): ?array
    {
        return $this->where('email', $email)->first();
    }

    public function findByEmailHash(string $hash): ?array
    {
        return $this->where('email_hash', $hash)->first();
    }

    public function findOrCreate(string $email): array
    {
        $user = $this->findByEmail($email);

        if ($user === null) {
            $id   = $this->insert([
                'email'      => $email,
                'email_hash' => hash('sha256', $email),
            ]);
            $user = $this->find($id);
        }

        return $user;
    }

    public function touchLogin(int $userId): void
    {
        $this->update($userId, ['last_login_at' => date('Y-m-d H:i:s')]);
    }
}
