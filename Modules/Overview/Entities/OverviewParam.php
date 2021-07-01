<?php

namespace Modules\Overview\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\SoftDeletes as SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/*** 
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Spatie\Permission\Traits\HasRoles;
**/

class OverviewParam extends Model implements HasMedia
{
    use HasTranslations;
    use InteractsWithMedia;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'overview_params';
    protected $fillable = [];
    protected $translatable = [];

    protected static function newFactory()
    {
        return \Modules\Overview\Database\factories\OverviewParamFactory::new();
    }
    
    /***
    public function registerMediaCollections() : void
    {
        $this->addMediaCollection('slugified-table-name');
        // ->useFallbackUrl('/images/undefined-class.jpg')
        // ->useFallbackPath(public_path('/images/undefined-class.jpg'));
    }
    **/

    public function user()
    {
        return $this->belongsTo(App\Models\User::class);
    }
    
    public function member()
    {
        return $this->belongsTo(Modules\Members\Entities\Member::class);
    }

}
