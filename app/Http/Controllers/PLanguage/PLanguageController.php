<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/11/15
 * Time: 8:42 PM
 * To change this template use File | Settings | File Templates.
 */

namespace App\Http\Controllers\PLanguage;

use Models\PLanguage\PLanguageRepositoryInterface;

use App\Http\Requests\Admin\StorePLanguagePostRequest;

use Models\PLanguage\Commands\StorePLanguageCommand;

use App\Http\Controllers\Controller;

use Models\PLanguage\Commands\ShowPLanguageCommand;

use Lang;
use ClientMessage;

class PLanguageController extends Controller
{

    /** Create new programing language
     * @param \App\Http\Requests\Admin\StorePLanguagePostRequest $request
     * @param \Models\PLanguage\PLanguageRepositoryInterface $pLanguageRepository
     * @return mixed
     */
    public function create(StorePLanguagePostRequest $request, PLanguageRepositoryInterface $pLanguageRepository)
    {
        try {
            $pLanguage = $this->dispatch(new StorePLanguageCommand($request, $pLanguageRepository));
            return ClientMessage::create_success(array(Lang::get('p_language.store_success')), $pLanguage);

        } catch (\Exception $ex) {
            return ClientMessage::create_error(
                array(
                    Lang::get('p_language.unexpected_problem'),
                    $ex->getMessage()
                ));
        }

    }

    /**
     * @param \Models\PLanguage\PLanguageRepositoryInterface $pLanguageRepository
     * @return mixed
     */
    public function  get(PLanguageRepositoryInterface $pLanguageRepository)
    {
        try
        {
            return ClientMessage::create_success(array(Lang::get('p_language.store_success')), $this->dispatch(new ShowPLanguageCommand($pLanguageRepository)));
        }
        catch(\Exception $ex){
            return ClientMessage::create_error(
                array(
                    Lang::get('p_language.unexpected_problem'),
                    $ex->getMessage()
                ));
        }

    }

}
