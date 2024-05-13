<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


class Image extends Model
{
    protected $fillable=['title','desc','image_url'];
    use HasFactory;
    public function scopeSearch(Builder $query, Request $request )
    {
        return $query->when(
            $request->title, function (Builder $query ,string $title)
            {
                $query->where(function (Builder $query) use ($title) 
                {
                return $query->where('title', 'LIKE','%'.$title.'%')->when(str_contains($title, ' '), 
                function(Builder $query) use ($title) 
                {
                    foreach (explode(',', $title) as $search)
                    {
                        $query->orWhere('title','LIKE','%'.$search.'%');
                    }
                }
            );
            });
        }
    )->when(
        $request->filled('created_at.from') && $request->filled('created_at.to'),
        function (Builder $query) use ($request) {
            $fromDate = date('Y-m-d 00:00:00', strtotime($request->input('created_at.from')));
            $toDate = date('Y-m-d 23:59:59', strtotime($request->input('created_at.to')));

            $query->whereBetween('created_at', [$fromDate, $toDate]);
        }
    );
    }
}
