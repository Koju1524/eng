<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vocabulary extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'word',
        'category_id',
        'sentence',
    ];

    protected $table = 'vocabulary';

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * update vocabulary
     *
     * @param array $inputs
     * @param integer $vocabularyId
     * @return void
     */
    public function updateVocabulary($inputs, $vocabularyId)
    {
        $this->find($vocabularyId)->fill($inputs)->save();
    }
}