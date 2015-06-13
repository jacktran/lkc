<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 5/11/15
 * Time: 10:01 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Models\AccessModifier;

interface AccessModifierRepositoryInterface
{
    public function  getAccessModifiersByLanguageId($language_id);
}
