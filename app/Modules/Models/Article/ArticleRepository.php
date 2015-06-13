<?php
    /**
     * Created by JetBrains PhpStorm.
     * User: PhucTran
     * Date: 5/2/15
     * Time: 10:16 PM
     * To change this template use File | Settings | File Templates.
     */

namespace Models\Article;

use Modules\Infrastructure\EloquentRepository;

class ArticleRepository extends EloquentRepository
{
    public function  model()
    {
        return __NAMESPACE__ . '\Article';
    }
}
