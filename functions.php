<?php

if (!function_exists('var_view')) {
    /**
     * Дебаг с помощью print_r или var_dump
     *
     * @param mixed $data
     * @param boolean $varDumpMode
     * @return void
     */
    function var_view($data, bool $varDumpMode = false): void
    {
        echo '<pre style="position: relative; z-index: 400;">';

        if (is_array($data) || is_object($data)) {
            $varDumpMode ? var_dump($data) : print_r($data);
        } else {
            $varDumpMode ? var_dump($data) : print_r(htmlspecialchars($data));
        }

        echo '</pre>';
    }
}
