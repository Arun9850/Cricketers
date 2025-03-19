<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $allowedFields = ['cricketer_id', 'username', 'review', 'rating', 'created_at'];

    public function getReviews($cricketer_id)
    {
        return $this->where(['cricketer_id' => $cricketer_id])->findAll();
    }
}
