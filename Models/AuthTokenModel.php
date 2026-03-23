<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthTokenModel extends Model
{
    protected $table         = 'auth_tokens';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['user_id', 'token', 'expires_at', 'used_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = '';   // brak updated_at w tej tabeli

    /** Tworzy nowy token dla użytkownika (15 minut ważności). */
    public function createForUser(int $userId): string
    {
        $token = bin2hex(random_bytes(32)); // 64 znaki hex

        $this->insert([
            'user_id'    => $userId,
            'token'      => $token,
            'expires_at' => date('Y-m-d H:i:s', strtotime('+15 minutes')),
        ]);

        return $token;
    }

    /**
     * Weryfikuje token. Zwraca rekord jeśli token jest:
     * - istniejący
     * - nieużyty (used_at IS NULL)
     * - niewyeksopirowany
     *
     * Zwraca null w przeciwnym razie.
     */
    public function findValid(string $token): ?array
    {
        return $this
            ->where('token', $token)
            ->where('used_at', null)
            ->where('expires_at >=', date('Y-m-d H:i:s'))
            ->first();
    }

    /** Oznacza token jako zużyty. */
    public function consume(int $id): void
    {
        $this->db->table($this->table)
            ->where('id', $id)
            ->update(['used_at' => date('Y-m-d H:i:s')]);
    }
}
