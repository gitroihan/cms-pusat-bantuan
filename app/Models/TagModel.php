<?php

namespace App\Models;

use CodeIgniter\Model;

class TagModel extends Model
{
    protected $table            = 'tag';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_tag', 'id_artikel', 'id_user'];
    // protected $allowedFields    = ['nama_tag','id_user','id_artikel'];

    public function getAllTags()
    {
        return $this->db->table($this->table)
            ->select('nama_tag')
            ->groupBy('nama_tag')
            ->get()
            ->getResultArray();
    }
    public function addArtikelTagRelation($artikelId, $userId, $tagName)
    {
        // Cek apakah tag sudah ada, jika belum tambahkan ke database
        $existingTag = $this->where('nama_tag', $tagName)->first();
        if (!$existingTag) {
            $tagId = $this->insert(['nama_tag' => $tagName]);
        } else {
            $tagId = $existingTag['id'];
        }

        // Simpan relasi antara artikel dan tag ke database
        $tagArtikelData = [
            'id_artikel' => $artikelId,
            'id_user' => $userId
        ];
        $this->db->table('tag')->insert($tagArtikelData);
    }
    public function addTag($tagName)
    {
        $existingTag = $this->where('nama_tag', $tagName)->first();
        if (!$existingTag) {
            $this->insert(['nama_tag' => $tagName]);
        }
    }



    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id');
    }
    public function artikel()
    {
        return $this->belongsTo(ArtikelModel::class, 'id_artikel', 'id');
    }

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
