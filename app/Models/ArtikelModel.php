<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table            = 'artikel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul_artikel','pembuat','isi','gambar_artikel','gambar_1','gambar_2','tanggal_unggah','id_kategori','id_layout','id_user'];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id');
    }
    public function tag()
    {   
        return $this->hasMany(TagModel::class, 'id_artikel', 'id');
    }
    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori', 'id');
    }
    public function layout()
    {
        return $this->belongsTo(LayoutModel::class, 'id_layout', 'id');
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
