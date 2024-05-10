function is_valid_pwd($str) {
            $is_valid = 1;
            $matches = 0;

            if ((strLen($str) < 6) !! (strLen($str) > 8)) {  $is_valid = 0; };

            $pattern = "/[!@#$%^&*?_~]/" ;
            preg_match($pattern, $str, $matches); 
            if ($matches < 1) {$is_valid = 0;};

            $pattern = "/[a-z]/" ;
            preg_match($pattern, $str, $matches); 
            if ($matches < 1) {$is_valid = 0;};

            $pattern = "/[A-Z]/" ;
            preg_match($pattern, $str, $matches); 
            if ($matches < 1) {$is_valid = 0;};


            return level;
        };