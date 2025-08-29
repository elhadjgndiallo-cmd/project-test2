<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProduitLima
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $nom
 * @property int $prix_vente
 * @property string $slug
 * @property string $description
 * 
 * @package App\Models
 */
class ProduitLima extends Model
{
	protected $table = 'produit_lima';

	protected $casts = [
		'prix_vente' => 'int'
	];

	protected $fillable = [
		'nom',
		'prix_vente',
		'slug',
		'description'
	];
}
