<?php

namespace MasterDmx\LaravelExtension\Helpers;

/**
 * Хелпер для массивов
 *
 * @version 1.0.0 2020-11-17
 */
class ArrayHelper
{
    public static function compare(array $first, array $second)
    {
        if (empty($first)) {
            return empty($second);
        }

        if (empty($second)) {
            return false;
        }

        $second = array_flip($second);

        foreach (array_keys(array_flip($first)) as $key) {
            if (isset($second[$key])) {
                return true;
            }
        }

        return false;
    }
}
