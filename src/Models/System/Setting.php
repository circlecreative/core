<?php
/*
 * This file is part of the NEO ERP Application.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         PT. Lingkar Kreasi (Circle Creative)
 * @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */

namespace Neo\Core\Models\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Neo\Libraries\Stamps\HasUserStamps;

/**
 * Neo\Models\System\Setting
 *
 * @property int $id
 * @property string|null $model_type
 * @property int|null $model_id
 * @property string $key
 * @property string|null $value
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|Setting onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|Setting withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Setting withoutTrashed()
 * @property-read \Neo\Models\System\User|null $creator
 * @property-read \Neo\Models\System\User|null $destroyer
 * @property-read \Neo\Models\System\User|null $editor
 */
class Setting extends Model
{
    use HasUserStamps;
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $table = 'sys_settings';


    /**
     * @return Collection
     */
    public function options(): Collection
    {
        $settings =  static::query()->whereNull('model_id')->whereNull('model_type')->get()->keyBy('key')->transform(function ($key) {
            return isJson($key->value) ? json_decode($key->value, true) : (string) $key->value;
        });

        if ($settings->isNotEmpty()) {
            $settings['site_icon'] = Storage::url(config('app.unique_id').'/'.$settings['site_icon']);
            $settings['app_icon'] = Storage::url(config('app.unique_id').'/'.$settings['app_icon']);
            $settings['logo_rectangle'] = Storage::url(config('app.unique_id').'/'.$settings['logo_rectangle']);
            $settings['logo_rectangle_dark'] = Storage::url(config('app.unique_id').'/'.$settings['logo_rectangle_dark']);
            $settings['logo_square'] = Storage::url(config('app.unique_id').'/'.$settings['logo_square']);
            $settings['logo_square_dark'] = Storage::url(config('app.unique_id').'/'.$settings['logo_square_dark']);

        }



        return $settings;
    }
}
