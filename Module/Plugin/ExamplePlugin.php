<?php

namespace Advanced\Module\Plugin;

class ExamplePlugin
{
    public function beforeSetTitle(
        \Advanced\Module\Controller\Example\Example $subject,
        $title
    ) {
        $title = $title . " to ";
        echo __METHOD__ . "</br>";

        return [$title];
    }

    public function afterGetTitle(
        \Advanced\Module\Controller\Example\Example $subject,
        $result
    ) {
        echo __METHOD__ . "</br>";

        return '<h1>' . $result . 'You' . '</h1>';
    }

    public function aroundGetTitle(
        \Advanced\Module\Controller\Example\Example $subject,
        callable $proceed
    ) {
        echo __METHOD__ . " - Before proceed() </br>";
        $result = $proceed();
        echo __METHOD__ . " - After proceed() </br>";

        return $result;
    }
}
