<?php

namespace App\Models;

use CodeIgniter\Model;

class CricketerModel extends Model
{
    protected $table = 'cricketers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'image', 'country', 'matches', 'runs', 'average', 'achievements', 'slug', 'created_at'];

    /**
     * Retrieve cricketer details by slug or return all cricketers if no slug is provided
     */
    public function getCricketer($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    /**
     * Retrieve cricketer statistics by cricketer ID
     */
    public function getStats($cricketer_id)
    {
        $db = db_connect(); // Connect to the database
        $query = $db->table('cricketer_stats')
                    ->where('cricketer_id', $cricketer_id)
                    ->get();

        return $query->getResultArray(); // Return an array of stats records
    }
}
