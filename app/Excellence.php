<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Excellence
 *
 * @property int $id
 * @property int $user_id
 * @property int $edition
 * @property string|null $name_for_certificate
 * @property string|null $certificate_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $notified_at
 * @property string $type
 * @property-read \App\User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Excellence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Excellence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Excellence query()
 * @method static \Illuminate\Database\Eloquent\Builder|Excellence whereCertificateUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Excellence whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Excellence whereEdition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Excellence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Excellence whereNameForCertificate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Excellence whereNotifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Excellence whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Excellence whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Excellence whereType($value)
 *
 * @mixin \Eloquent
 */
class Excellence extends Model
{
    use HasFactory;

    /**
     * Mass assignable fields. 
     * Including 'user_id', 'type', and 'notified_at' 
     * so updateOrCreate(...) can set them properly.
     */
    protected $fillable = [
        'user_id',
        'edition',
        'type',
        'name_for_certificate',
        'certificate_url',
        'certificate_generation_error',
        'notified_at',
        'certificate_sent_error',
    ];

    /**
     * Scope or static method to get winners by year and type
     * who haven't been notified yet (notified_at=null).
     */
    public static function byYear($year, $type = 'Excellence')
    {
        return self::with('user')
        ->where('edition', $year)
            ->whereNull('notified_at')
            ->where('type', $type)
            ->get();
    }

    /**
     * Relationship: each Excellence row belongs to a User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\User::class);
    }
}
