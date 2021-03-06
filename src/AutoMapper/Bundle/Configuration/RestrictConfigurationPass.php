<?php

namespace Jane\AutoMapper\Bundle\Configuration;

use Jane\AutoMapper\MapperGeneratorMetadataInterface;

class RestrictConfigurationPass implements ConfigurationPassInterface
{
    private $source;

    private $target;

    private $configurationPass;

    public function __construct($source, $target, ConfigurationPassInterface $configurationPass)
    {
        $this->source = $source;
        $this->target = $target;
        $this->configurationPass = $configurationPass;
    }

    public function process(MapperGeneratorMetadataInterface $metadata): void
    {
        if ($metadata->getSource() !== $this->source || $metadata->getTarget() !== $this->target) {
            return;
        }

        $this->configurationPass->process($metadata);
    }
}
