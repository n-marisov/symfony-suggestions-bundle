<?php

namespace Maris\Symfony\Suggestions\Model;

use JsonSerializable;
use Maris\Symfony\Suggestions\Interfaces\SuggestInterface;

class Suggestion implements JsonSerializable
{

    protected SuggestInterface $suggest;

    /**
     * @param SuggestInterface $suggest
     */
    public function __construct( SuggestInterface $suggest )
    {
        $this->suggest = $suggest;
    }


    public function jsonSerialize(): array
    {
        $result = [
            "value" => $this->suggest->suggestTitle(),
            "unrestricted_value" => $this->suggest->suggestDescription()
        ];
        if(!is_null( $data = $this->suggest->suggestData() ))
            $result["data"] = $data;

        return $result;
    }
}