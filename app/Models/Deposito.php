<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Deposito
 * 
 * @property int $id
 * @property float $amount
 * @property int $product_id
 * @property int $user_id
 * @property float $interest
 * @property int $status
 * @property Carbon|null $due_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Product $product
 * @property User $user
 *
 * @package App\Models
 */
class Deposito extends Model
{
	use SoftDeletes;
	protected $table = 'depositos';

	protected $casts = [
		'amount' => 'float',
		'product_id' => 'int',
		'user_id' => 'int',
		'interest' => 'float',
		'status' => 'int'
	];

	protected $dates = [
		'due_date'
	];

	protected $fillable = [
		'amount',
		'product_id',
		'user_id',
		'interest',
		'status',
		'due_date'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
