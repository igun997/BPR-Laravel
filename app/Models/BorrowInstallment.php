<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BorrowInstallment
 * 
 * @property int $id
 * @property int $amount
 * @property int $borrow_id
 * @property Carbon|null $updated_at
 * @property Carbon|null $created_at
 * 
 * @property Borrow $borrow
 *
 * @package App\Models
 */
class BorrowInstallment extends Model
{
	protected $table = 'borrow_installments';

	protected $casts = [
		'amount' => 'int',
		'borrow_id' => 'int'
	];

	protected $fillable = [
		'amount',
		'borrow_id'
	];

	public function borrow()
	{
		return $this->belongsTo(Borrow::class);
	}
}
