<?php

namespace Maris\Symfony\Suggestions\Service;

use Closure;
use Maris\Symfony\Suggestions\Interfaces\SuggestInterface;
use Maris\Symfony\Suggestions\Model\Suggestion;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Сервис создает финальный объект для передачи
 */
class SuggestService
{
    /**
     * Создает объект ответа из списка SuggestInterface
     * @param iterable<SuggestInterface> $suggestionList
     * @param callable|null $dataCreator
     * @return Response
     */
    public function __invoke( iterable $suggestionList , ?callable $dataCreator = null ):Response
    {
        $list = [];
        $dataCreator = (isset($dataCreator)) ? $dataCreator(...) : null;
        foreach ($suggestionList as $item)
            if(is_a($item,SuggestInterface::class))
                $list[] = new Suggestion( $item, $dataCreator );

        return new JsonResponse( [ "suggestions" => $list ] );
    }

}