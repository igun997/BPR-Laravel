<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Profit
 * 
 * @property int $id
 * @property int $borrow_id
 * @property float $amount
 * @property float $interest
 * @property Carbon|null $transaction_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Borrow $borrow
 *
 * @package App\Models
 */
class Profit extends Model
{
	protected $table = 'profits';

	protected $casts = [
		'borrow_id' => 'int',
		'amount' => 'float',
		'interest' => 'float'
	];

	protected $dates = [
		'transaction_date'
	];

	protected $fillable = [
		'borrow_id',
		'amount',
		'interest',
		'transaction_date'
	];

	public function borrow()
	{
		return $this->belongsTo(Borrow::class);
	}
}
