<?php

if (!function_exists('iban_format')) {
    /**
     * Formata IBAN com blocos personalizados
     *
     * @param string $value
     * @param array $blocks
     * @return string
     */
    function iban_format(string $value, array $blocks = [4, 4, 4, 1, 1]): string
    {
        // Remove caracteres que não sejam números
        $value = preg_replace('/\D/', '', $value);

        $parts = [];
        $pos = 0;

        foreach ($blocks as $size) {
            $parts[] = substr($value, $pos, $size);
            $pos += $size;
        }

        return implode(' ', $parts);
    }
}