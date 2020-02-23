<?php


class Anagram
{
    private $chars;

    /**
     * nustatau kokie simboliai gali buti 2 stringu palyginime
     */
    private function __construct()
    {
        $this->chars = range('a', 'z');
    }

    /**
     * @param string $string
     * @return array
     * visas stringo raides pakeiciu i mazasias
     * stringa perdarau į array ir panaikinu simbolius ne raides
     */
    private function prepareString(string $string): array
    {
        $string = strtolower($string);

        $array = str_split($string, 1);

        foreach ($array as $key => $letter) {
            if (!in_array($letter, $this->chars)) unset($array[$key]);
        }
        return $array;
    }

    /**
     * @param string $first
     * @param string $second
     * @return bool
     *
     */
    public static function check(string $first, string $second): bool
    {
        $obj = new self();
        $first = $obj->prepareString($first);
        $second = $obj->prepareString($second);

        //palyginu as sutampa array elemntu kiekiai jei ne, tai negali buti anagrama
        if (count($first) !== count($second)) return false;

        foreach ($first as $f_key => $f_letter) {
            $status = false;

            foreach ($second as $s_key => $s_letter) {

                if ($f_letter == $s_letter) {
                    $status = true;
                    unset($second[$s_key]);
                    break;
                }
            }
            if (!$status) return false;
        }
        return true;
    }
}