<?php
    if (!function_exists('helper')) {
        function formatNumber($number) {
            return number_format($number);
        }

        function calculatePriceAfterDiscount($price, $discount) {
            $priceAfterDiscount = $price - $price * ($discount / 100);

            return number_format($priceAfterDiscount);
        }
    }
