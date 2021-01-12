<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Borrow
 * 
 * @property int $id
 * @property float $amount
 * @property int $status
 * @property Carbon|null $approved_date
 * @property Carbon|null $declined_date
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|BorrowInstallment[] $borrow_installments
 *
 * @package App\Models
 */
class Borrow extends Model
{
	protected $table = 'borrows';

	protected $casts = [
		'amount' => 'float',
		'status' => 'int',
		'user_id' => 'int'
	];

	protected $dates = [
		'approved_date',
		'declined_date'
	];

	protected $fillable = [
		'amount',
		'status',
		'approved_date',
		'declined_date',
		'user_id'
	];

	public function borrow_installments()
	{
		return $this->hasMany(BorrowInstallment::class);
	}
}
