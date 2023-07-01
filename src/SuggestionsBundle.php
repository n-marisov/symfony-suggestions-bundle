<?php

namespace Maris\Symfony\Suggestions;

use Maris\Symfony\Suggestions\DependencyInjection\SuggestionsExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class SuggestionsBundle extends AbstractBundle{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new SuggestionsExtension();
    }

}