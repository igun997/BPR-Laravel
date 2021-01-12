<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $name
 * @property int $type
 * @property float|null $interest
 * @property int $month_term
 * @property int $status
 * @property string $img
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property string|null $deleted_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Borrow[] $borrows
 * @property Collection|Deposito[] $depositos
 *
 * @package App\Models
 */
class Product extends Model
{
	use SoftDeletes;
	protected $table = 'products';

	protected $casts = [
		'type' => 'int',
		'interest' => 'float',
		'month_term' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'name',
		'type',
		'interest',
		'month_term',
		'status',
		'img',
		'description'
	];

	public function borrows()
	{
		return $this->hasMany(Borrow::class);
	}

	public function depositos()
	{
		return $this->hasMany(Deposito::class);
	}
}
