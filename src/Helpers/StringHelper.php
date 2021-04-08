<?php

namespace MasterDmx\LaravelExtension\Helpers;

/**
 * Хелпер строк
 *
 * @update 2020-09-21
 */
class StringHelper
{
    /**
     * Просклонять строку по числу
     * @param $numeric определяющее число
     * @param string $form1 Первая форма слова (*1* конфета)
     * @param string $form2 Первая форма слова (*2* конфеты)
     * @param string $form3 Первая форма слова (*9* конфет)
     * @return string нужная форма слова
     */
    public static function inclineByNumeric($numeric, string $form1, ?string $form2 = null, ?string $form3 = null)
    {
        $numeric = empty($numeric) || !is_numeric($numeric) ? 0 : $numeric;
        $form2 = !empty($form2) ? $form2 : $form1;
        $form3 = !empty($form3) ? $form3 : $form2;

        $numeric = abs($numeric) % 100;
        $lnumeric = $numeric % 10;

        if ($numeric >= 11 && $numeric <= 19) {
            return $form3;
        }
        if ($lnumeric >= 2 && $lnumeric <= 4) {
            return $form2;
        }
        if ($lnumeric == 1) {
            return $form1;
        }

        return $form3;
    }

    /**
     * Склонение слова из массива по числу
     * @param $numeric определяющее число
     * @param array $forms Массив из 3-х форм слова
     * @return string нужная форма слова
     */
    public static function inclineByNumericOfArray ($numeric, array $forms)
    {
        return static::inclineByNumeric($numeric, $forms[0] ?? null, $forms[1] ?? null, $forms[2] ?? null);
    }
}
