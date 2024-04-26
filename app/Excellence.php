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
 *
 * @mixin \Eloquent
 */
class Excellence extends Model
{
    use HasFactory;

    protected $fillable = ['edition', 'name_for_certificate', 'certificate_url'];

    public static function byYear($year, $type = 'Excellence')
    {
        return Excellence::with('user')->where(
            [
                ['edition', '=', $year],
                ['notified_at', '=', null],
                ['type', '=', $type],

            ]
        )->get();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\User::class);
    }
}
