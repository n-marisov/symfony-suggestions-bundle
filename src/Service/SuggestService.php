<?php

namespace Maris\Symfony\Suggestions\Service;

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
     * @return Response
     */
    public function __invoke( iterable $suggestionList ):Response
    {
        $list = [];
        foreach ($suggestionList as $item)
            if(is_a($item,SuggestInterface::class))
                $list[] = new Suggestion($item);

        return new JsonResponse( [ "suggestions" => $list ] );
    }

}