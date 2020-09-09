<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/8 0008
 * Time: 14:55
 */
namespace App\Http\Queries;

use App\Models\Reply;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ReplyQuery extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(Reply::query());

        $this->allowedIncludes('user','topic','topic.user');
    }
}