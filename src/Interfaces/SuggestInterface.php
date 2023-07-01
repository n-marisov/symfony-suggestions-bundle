<?php

namespace Maris\Symfony\Suggestions\Interfaces;


interface SuggestInterface
{
    /**
     * Возвращает заголовок записи.
     * @return string
     */
    public function suggestTitle():string;

    /**
     * Возвращает описание записи
     * @return string
     */
    public function suggestDescription():string;

    /**
     * Возвращает свободные данные.
     * @return array|null
     */
    public function suggestData():?array;


}