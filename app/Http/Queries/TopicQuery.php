<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/8 0008
 * Time: 14:55
 */
namespace App\Http\Queries;

use App\Models\Topic;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TopicQuery extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(Topic::query());

        $this->allowedIncludes('user','category')
            ->allowedFilters([
                'title',
                AllowedFilter::exact('category_id'),
                AllowedFilter::scope('withOrder')->default('recentReplied'),
            ]);
    }
}