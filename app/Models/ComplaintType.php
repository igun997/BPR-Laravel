<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ComplaintType
 * 
 * @property int $id
 * @property int $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Complaint[] $complaints
 *
 * @package App\Models
 */
class ComplaintType extends Model
{
	protected $table = 'complaint_types';

	protected $casts = [
		'name' => 'int'
	];

	protected $fillable = [
		'name'
	];

	public function complaints()
	{
		return $this->hasMany(Complaint::class);
	}
}
