<?php

namespace MasterDmx\LaravelHelpers;

/**
 * Хелпер для чисел
 *
 * @update 2020-09-21
 */
class NumericHelper
{
    /**
     * Трансформирует число по алгоритму в строке
     * @param mixed $numeric Число для трансформирования
     * @param string $logic Алгоритм преобразования, например: *2|+10|-1|/42 (умножить на 2, потом прибавить 10, потом отнять 1 и поделить на 42)
     * @param bool $inversion Произвести все в обратном порядке
     */
    public static function transformate($numeric, string $logic, bool $inversion = false)
    {
        foreach ($inversion ? array_reverse(explode('|', $logic)) : explode('|', $logic) as $logic) {
            $operand = substr($logic, 0, 1);
            $value = substr($logic, 1);

            if ($operand == '*' && !$inversion || $inversion && $operand == '/') {
                $numeric *= $value;
            } elseif ($operand == '/' && !$inversion || $inversion && $operand == '*') {
                $numeric /= $value;
            } elseif ($operand == '+' && !$inversion || $inversion && $operand == '-') {
                $numeric += $value;
            } elseif ($operand == '-' && !$inversion || $inversion && $operand == '+') {
                $numeric -= $value;
            }
        }

        return $numeric;
    }

    /**
     * Сравнить интервалы
     */
    public static function compareIntervals ($min = null, $max = null, $min2 = null, $max2 = null) : bool
    {
        return !(
            (is_null($min) ? -INF : $min) > (is_null($max2) ? INF : $max2) ||
            (is_null($max) ? INF : $max) < (is_null($min2) ? -INF : $min2)
        );
    }
}
