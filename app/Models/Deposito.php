<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Deposito
 * 
 * @property int $id
 * @property float $amount
 * @property int $product_id
 * @property float $interest
 * @property int $status
 * @property Carbon|null $due_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Product $product
 *
 * @package App\Models
 */
class Deposito extends Model
{
	protected $table = 'depositos';

	protected $casts = [
		'amount' => 'float',
		'product_id' => 'int',
		'interest' => 'float',
		'status' => 'int'
	];

	protected $dates = [
		'due_date'
	];

	protected $fillable = [
		'amount',
		'product_id',
		'interest',
		'status',
		'due_date'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
