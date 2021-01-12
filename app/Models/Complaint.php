<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Complaint
 * 
 * @property int $id
 * @property int $complaint_type_id
 * @property int $user_id
 * @property string $subject
 * @property string|null $content
 * @property int $status
 * @property Carbon|null $created_at
 * @property string|null $deleted_at
 * @property Carbon|null $updated_at
 * 
 * @property ComplaintType $complaint_type
 * @property User $user
 *
 * @package App\Models
 */
class Complaint extends Model
{
	use SoftDeletes;
	protected $table = 'complaints';

	protected $casts = [
		'complaint_type_id' => 'int',
		'user_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'complaint_type_id',
		'user_id',
		'subject',
		'content',
		'status'
	];

	public function complaint_type()
	{
		return $this->belongsTo(ComplaintType::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
