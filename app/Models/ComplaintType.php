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
 * Class ComplaintType
 * 
 * @property int $id
 * @property string $name
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Complaint[] $complaints
 *
 * @package App\Models
 */
class ComplaintType extends Model
{
	use SoftDeletes;
	protected $table = 'complaint_types';

	protected $fillable = [
		'name'
	];

	public function complaints()
	{
		return $this->hasMany(Complaint::class);
	}
}
