namespace App\Models;

use CodeIgniter\Model;

class CricketerStatsModel extends Model
{
    protected $table = 'cricketer_stats';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'cricketer_id', 'competition', 'matches', 'runs', 'batting_avg', 
        'hundreds', 'fifties', 'top_score', 'balls_bowled', 'wickets', 
        'bowling_avg', 'best_bowling', 'catches', 'stumpings'
    ];

    // Fetch statistics for a specific cricketer
    public function getStatsByCricketer($cricketer_id)
    {
        return $this->where('cricketer_id', $cricketer_id)->findAll();
    }
}
