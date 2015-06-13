<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 5/11/15
 * Time: 9:17 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Models\Collection;

interface CollectionRepositoryInterface
{
    public function  getCollectionsByLanguageId($language_id);
}
