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
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string $username
 * @property string $password
 * @property string|null $alamat
 * @property string|null $no_hp
 * @property int $level
 * @property string|null $ktp
 * @property string|null $no_ktp
 * @property int $status
 * @property string|null $no_rekening
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Borrow[] $borrows
 * @property Collection|Complaint[] $complaints
 * @property Collection|Deposito[] $depositos
 * @property Collection|Save[] $saves
 *
 * @package App\Models
 */
class User extends Model
{
	use SoftDeletes;
	protected $table = 'users';

	protected $casts = [
		'level' => 'int',
		'status' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'email',
		'username',
		'password',
		'alamat',
		'no_hp',
		'level',
		'ktp',
		'no_ktp',
		'status',
		'no_rekening'
	];

	public function borrows()
	{
		return $this->hasMany(Borrow::class);
	}

	public function complaints()
	{
		return $this->hasMany(Complaint::class);
	}

	public function depositos()
	{
		return $this->hasMany(Deposito::class);
	}

	public function saves()
	{
		return $this->hasMany(Save::class);
	}
}
