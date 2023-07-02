<?php

namespace Maris\Symfony\Suggestions\Model;

use Closure;
use JsonSerializable;
use Maris\Symfony\Suggestions\Interfaces\SuggestInterface;

class Suggestion implements JsonSerializable
{

    protected SuggestInterface $suggest;

    protected ?Closure $dataCreator;

    /**
     * @param SuggestInterface $suggest
     * @param Closure|null $dataCreator
     */
    public function __construct( SuggestInterface $suggest , ?Closure $dataCreator = null )
    {
        $this->suggest = $suggest;
        $this->dataCreator = $dataCreator;
    }


    public function jsonSerialize(): array
    {
        $result = [
            "value" => $this->suggest->suggestTitle(),
            "unrestricted_value" => $this->suggest->suggestDescription()
        ];

        if(isset($this->dataCreator))
            $data = $this->dataCreator->call( $this->suggest, $this->suggest );
        else $data = $this->suggest->suggestData();

        if(!is_null( $data ))
            $result["data"] = $data;

        return $result;
    }
}