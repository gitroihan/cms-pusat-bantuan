<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table            = 'kategori';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_kategori', 'deskripsi_kategori', 'ikon', 'urutan', 'id_parent', 'id_user'];

    public function data_id_parent_null()
    {
        $builder = $this->db->table('kategori');
        $builder->select('*');
        $builder->where('id_parent IS NULL');
        $query = $builder->get();
        $data['kategori'] = $query->getResultArray();

        // Get categories with id_parent
        $builder = $this->db->table('kategori');
        $builder->select('id_parent');
        $builder->where('id_parent IS NOT NULL');
        $query = $builder->get();
        $data['id_parents'] = array_column($query->getResultArray(), 'id_parent');

        return $data;
    }
    public function getSubcategoriesWithDetails($id_kategori)
    {
        $subcategories = $this->where('id_parent', $id_kategori)->findAll();
        $allCategories = $this->findAll();

        $data = [
            'subcategories' => $subcategories,
            'parentIds' => array_column($allCategories, 'id_parent')
        ];

        return $data;
    }

    public function getKategoriWithoutParent()
    {
        // Mendapatkan semua id_parent yang digunakan
        $subQuery = $this->db->table($this->table)
            ->select('id_parent')
            ->where('id_parent IS NOT NULL');

        // Mendapatkan kategori yang tidak termasuk dalam id_parent
        return $this->where('id NOT IN (' . $subQuery->getCompiledSelect() . ')', null, false)
            ->findAll();
    }
    // relasi
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id');
    }
    public function artikel()
    {
        return $this->hasMany(ArtikelModel::class, 'id_kategori', 'id');
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
