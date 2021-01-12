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
 * @property int|null $interest
 * @property Carbon|null $approved_date
 * @property Carbon|null $declined_date
 * @property int $product_id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Product $product
 * @property User $user
 * @property Collection|BorrowInstallment[] $borrow_installments
 * @property Collection|Profit[] $profits
 *
 * @package App\Models
 */
class Borrow extends Model
{
	protected $table = 'borrows';

	protected $casts = [
		'amount' => 'float',
		'status' => 'int',
		'interest' => 'int',
		'product_id' => 'int',
		'user_id' => 'int'
	];

	protected $dates = [
		'approved_date',
		'declined_date'
	];

	protected $fillable = [
		'amount',
		'status',
		'interest',
		'approved_date',
		'declined_date',
		'product_id',
		'user_id'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function borrow_installments()
	{
		return $this->hasMany(BorrowInstallment::class);
	}

	public function profits()
	{
		return $this->hasMany(Profit::class);
	}
}
