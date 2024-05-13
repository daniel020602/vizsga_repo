<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Task extends Model
{
    use HasFactory;

    protected $fillable=['title','desc','deadline','done','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeSearch(Builder $query, \Illuminate\Http\Request $request)
    {
        return $query
            ->when(
                $request->title,
                function (Builder $query, string $title) {
                    // where (title LIKE "%great Brain%" OR title LIKE "%great%" OR title LIKE "%Brain%)"
                    $query->where(function (Builder $query) use ($title) {
                        return $query->where('title', 'LIKE', '%' . $title . '%')
                        ->orWhere('desc', 'LIKE', '%' . $title . '%')
                            ->when(
                                str_contains($title, ' '),
                                function (Builder $query) use ($title) {
                                    foreach (explode(' ', $title) as $search) {
                                        $query->orWhere('title', 'LIKE', '%' . $search . '%')
                                        ->orWhere('desc', 'LIKE', '%' . $search . '%');
                                    }
                                }
                            )
                            ;
                    });
                })
                ;
           
    }
}
