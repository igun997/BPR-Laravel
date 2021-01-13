<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Save
 * 
 * @property int $id
 * @property int $type
 * @property int $status
 * @property float $amount
 * @property string|null $notes
 * @property int $user_id
 * @property Carbon|null $save_date
 * @property Carbon|null $created_at
 * @property string|null $deleted_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Save extends Model
{
	use SoftDeletes;
	protected $table = 'saves';

	protected $casts = [
		'type' => 'int',
		'status' => 'int',
		'amount' => 'float',
		'user_id' => 'int'
	];

	protected $dates = [
		'save_date'
	];

	protected $fillable = [
		'type',
		'status',
		'amount',
		'notes',
		'user_id',
		'save_date'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
