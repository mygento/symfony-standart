<?php

$finder = PhpCsFixer\Finder::create()
    ->in('.')
    ->exclude('Test/tmp')
    ->name('*.phtml')
    ->ignoreVCSIgnored(true);

$config = new \Mygento\Symfony\Config\Symfony();
$config->setFinder($finder);
return $config;
