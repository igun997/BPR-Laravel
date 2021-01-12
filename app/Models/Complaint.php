<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Complaint
 * 
 * @property int $id
 * @property int $complaint_type_id
 * @property string $subject
 * @property string|null $content
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ComplaintType $complaint_type
 *
 * @package App\Models
 */
class Complaint extends Model
{
	protected $table = 'complaints';

	protected $casts = [
		'complaint_type_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'complaint_type_id',
		'subject',
		'content',
		'status'
	];

	public function complaint_type()
	{
		return $this->belongsTo(ComplaintType::class);
	}
}
