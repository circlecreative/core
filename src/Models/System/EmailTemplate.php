<?php
/**
 * This file is part of the NEO ERP Application.
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         PT. Lingkar Kreasi (Circle Creative)
 *  @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */
// ------------------------------------------------------------------------
namespace Neo\Core\Models\System;

use Illuminate\Database\Eloquent\Model;
use Neo\Libraries\Stamps\HasUserStamps;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Neo\Models\System\EmailTemplate
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $subject
 * @property string|null $greeting
 * @property string|null $content
 * @property string $group
 * @property string|null $recipient
 * @property array|null $addresses
 * @property array|null $params
 * @property string|null $shortcut
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Neo\Models\System\User|null $creator
 * @property-read \Neo\Models\System\User|null $destroyer
 * @property-read \Neo\Models\System\User|null $editor
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereAddresses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereGreeting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereParams($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereRecipient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereShortcut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class EmailTemplate extends Model
{
    use HasUserStamps;
    use HasSlug;

    protected $table = 'sys_email_templates';
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'subject',
        'greeting',
        'content',
        'group',
        'recipient',
        'addresses',
        'params',
        'status',
        'shortcut',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'addresses' => 'array',
        'params' => 'array',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
