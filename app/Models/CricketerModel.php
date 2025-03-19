<?php

namespace App\Models;

use CodeIgniter\Model;

class CricketerModel extends Model
{
    protected $table = 'cricketers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'country', 'matches', 'runs', 'average', 'achievements', 'slug', 'created_at'];

    public function getCricketer($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
