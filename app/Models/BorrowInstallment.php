<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BorrowInstallment
 * 
 * @property int $id
 * @property int $amount
 * @property int $status
 * @property string|null $recipt
 * @property int $borrow_id
 * @property string|null $deleted_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $created_at
 * 
 * @property Borrow $borrow
 *
 * @package App\Models
 */
class BorrowInstallment extends Model
{
	use SoftDeletes;
	protected $table = 'borrow_installments';

	protected $casts = [
		'amount' => 'int',
		'status' => 'int',
		'borrow_id' => 'int'
	];

	protected $fillable = [
		'amount',
		'status',
		'recipt',
		'borrow_id'
	];

	public function borrow()
	{
		return $this->belongsTo(Borrow::class);
	}
}
