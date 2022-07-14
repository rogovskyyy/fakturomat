<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceController extends Controller
{
    public static function kwotaSlownie($kwota) {
        $kwota = number_format((float)$kwota, 2, '.', '');
        $kwota = str_replace('.', ',', $kwota);
        $tab = array();
        $tab = explode(",", $kwota);
        $zlotowki = "";
        $grosze = "";
        if (count($tab) > 0) $zlotowki = self::moneyToText($tab[0]);
        if (count($tab) == 2) $grosze = self::moneyToText($tab[1], 1);

        if (empty($zlotowki)) $zlotowki = 'zero';

        $kwota = explode(',', $kwota);

        return $zlotowki .= " złotych i " . $kwota[1] . "/100 gr";
    }

    public static function moneyToText($money, $czyGrosze = false)
    {
        if (strlen($money) == 1) {
            return self::cipherToText($money[0]);
        }

        if (!empty($czyGrosze)) {
            preg_match("/^0*$/", $money, $matches, PREG_OFFSET_CAPTURE);
            if (count($matches) == 1) {
                return "zero";
            }
        }

        if (strlen($money) == 2) {
            if ($money[0] == '1') {
                switch ($money[1]) {
                    case '0':
                        return 'dziesięć';
                    case '1':
                        return "jedenaście";
                    case '2':
                        return "dwanaście";
                    case '3':
                        return "trzynaście";
                    case '4':
                        return "czternaście";
                    case '5':
                        return "piętnaście";
                    case '6':
                        return "szesnaście";
                    case '7':
                        return "siedemnaście";
                    case '8':
                        return "osiemnaście";
                    case '9':
                        return "dziewiętnaście";
                }

                return "";

            } else if ($money[0] == '0') {
                return self::moneyToText(substr($money, 1));
            } else if ($money[0] == '2') {
                return "dwadzieścia " . self::moneyToText(substr($money, 1));
            } else if ($money[0] == '3') {
                return "trzydzieści " . self::moneyToText(substr($money, 1));
            } else if ($money[0] == '4') {
                return "czterdzieści " . self::moneyToText(substr($money, 1));
            } else {
                return self::cipherToText($money[0]) . "dziesięć" . self::moneyToText(substr($money, 1));
            }
        }

        if (strlen($money) == 3) {
            if ($money[0] == '0') {
                return self::moneyToText(substr($money, 1));
            } else if ($money[0] == '1') {
                return "sto " . self::moneyToText(substr($money, 1));
            } else if ($money[0] == '2') {
                return "dwieście " . self::moneyToText(substr($money, 1));
            } else if ($money[0] == '3' || $money[0] == '4') {
                return self::cipherToText($money[0]) . "sta " . self::moneyToText(substr($money, 1));
            } else {
                return self::cipherToText($money[0]) . "set " . self::moneyToText(substr($money, 1));
            }
        }

        if (strlen($money) == 4) {
            if ($money[0] == '1') {
                return self::cipherToText($money[0]) . " tysiąc " . self::moneyToText(substr($money, 1));
            } else if ($money[0] == '2' || $money[0] == '3' || $money[0] == '4') {
                return self::cipherToText($money[0]) . " tysiące " . self::moneyToText(substr($money, 1));
            } else {
                return self::cipherToText($money[0]) . " tysięcy " . self::moneyToText(substr($money, 1));
            }
        }
        return "";
    }

    public static function cipherToText($ch)
    {
        switch ($ch) {
            case '1':
                return "jeden";
            case '2':
                return "dwa";
            case '3':
                return "trzy";
            case '4':
                return "cztery";
            case '5':
                return "pięć";
            case '6':
                return "sześć";
            case '7':
                return "siedem";
            case '8':
                return "osiem";
            case '9':
                return "dziewięć";
        }
        return "";
    }

}
