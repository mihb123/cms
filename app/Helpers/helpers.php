<?php

use App\Common\Response;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

if (!function_exists('getListStatus')) {
    function getListStatus()
    {
        $data = [
            config("constants.status_verified") => '公開',
            config("constants.status_draft") => '非公開'
        ];

        return $data;
    }
}

if (!function_exists('getStar')) {
    function getStar()
    {
        $data = [
            config("constants.status_verified") => '公開',
            config("constants.status_draft") => '非公開'
        ];

        return $data;
    }
}

if (!function_exists('getTypeNews')) {
    function getTypeNews()
    {
        $data = [
            config("constants.type_topic") => 'お役立ち記事',
            config("constants.type_articles") => 'お役立ちトピックス記事'
        ];

        return $data;
    }
}

if (!function_exists('slug')) {
    function slug($string, $separator = '-')
    {
        if (is_null($string)) {
            return "";
        }
        $string = trim($string);
        $string = mb_strtolower($string, "UTF-8");;
        $string = preg_replace("/[^a-z0-9_\s-]#u/", "", $string);
        $string = preg_replace("/[\s-]+/", " ", $string);
        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }
}

if (!function_exists('handleDateFormat')) {
    function handleDateFormat($date)
    {
        if (empty($date)) {
            return;
        }

        return Carbon::parse($date)->format(config('constants.date_format'));
    }
}

if (!function_exists('getImageThumb')) {
    function getImageThumb($path)
    {
        if (empty($path)) {
            return;
        }
        return isset($path) ? thumb($path) : '';
    }
}
if (!function_exists('getDayOffWeek')) {
    function getDayOffWeek($day)
    {
        $day = date("w", strtotime($day));

        switch ($day) {
            case 1:
                $weekday = '月';
                break;
            case 2:
                $weekday = '火';
                break;
            case 3:
                $weekday = '水';
                break;
            case 4:
                $weekday = '木';
                break;
            case 5:
                $weekday = '金';
                break;
            case 6:
                $weekday = '土';
                break;
            default:
                $weekday = '日';
                break;
        }

        return $weekday;
    }
}

if (!function_exists('handleDayMonthFomart')) {
    function handleDayMonthFomart($date)
    {
        if (empty($date)) {
            return;
        }

        return Carbon::parse($date)->format(config('constants.day_month_format'));
    }
}

if (!function_exists('handleHourFomart')) {
    function handleHourFomart($date)
    {
        if (empty($date)) {
            return;
        }

        return Carbon::parse($date)->format(config('constants.hour_format'));
    }
}
if (!function_exists('getLink')) {
    function getLink($link)
    {
        if (empty($link)) {
            return '';
        }
        if ((strpos($link, 'http') === 0)
            || (strpos($link, 'https') === 0)
        ) {
            return $link;
        }

        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
            $https = 'https://';
        } else {
            $https = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://';
        }

        $link = $https . $_SERVER['HTTP_HOST'] . '/' . $link;

        return $link;
    }
}

if (!function_exists('getGender')) {
    function getGender()
    {
        $data = [
            config("constants.gender_male") => '男性',
            config("constants.gender_female") => '女性',
            config("constants.gender") => '-'
        ];

        return $data;
    }
}

if (!function_exists('getGenderTag')) {
    function getGenderTag()
    {
        $data = [
            config("constants.gender_male") => '- 男性',
            config("constants.gender_female") => '- 女性',
            config("constants.gender") => '-'
        ];

        return $data;
    }
}

if (!function_exists('getTypeFamily')) {
    function getTypeFamily()
    {
        $data = [
            config("constants.family_topic") => 'pickup',
            config("constants.family_news") => 'news'
        ];

        return $data;
    }
}

if (!function_exists('listBorder')) {
    function listBorder()
    {
        return config("constants.listBorder");
    }
}

if (!function_exists('getAgeMember')) {
    function getAgeMember($dateOfBirth)
    {
        $years = Carbon::parse($dateOfBirth)->age;

        return $years;
    }
}

if (!function_exists('getYearMonth')) {
    function getYearMonth($dateStart, $dateEnd)
    {
        $dateStart = Carbon::parse($dateStart);
        $dateEnd = Carbon::parse($dateEnd);
        $years = $dateEnd->diffInYears($dateStart);
        $month = $dateEnd->diffInMonths($dateStart) % 12;

        return $years . '年' . $month . 'ヶ月';
    }
}

if (!function_exists('customPaginate')) {
    function customPaginate($items, $perPage = 1, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => Request::Url()]);
    }
}

if (!function_exists('getFile')) {
    function getFile($file)
    {
        if (!$file) {
            return asset('/cms/image/image_default.png');
        }

        return asset($file);
    }
}

if (!function_exists('getTypePosts')) {
    function getTypePosts()
    {
        $data = [
            config("constants.post_top") => 'Yes',
            config("constants.post_no_top") => 'No',
        ];

        return $data;
    }
}

if (!function_exists('validateSort')) {
    function validateSort($request)
    {
        $rule = [
            'sort' => 'date_format:Y-m-d H:i:s',
        ];
        $message = [
            'sort.date_format' => sprintf(__('sortはY-m-d H:i:s形式で指定してください。'))
        ];

        $validation = Validator::make($request->all(), $rule, $message);

        if ($validation->fails()) {
            $error = json_decode(json_encode($validation->errors()));
            $msg = '';
            foreach ($error as $k => $m) {
                $msg = $m[0];
                break;
            }
            return Response::error($msg);
        }
    }
}

if (!function_exists('getListCalculate')) {
    function getListCalculate()
    {
        return config("constants.listCalculate");
    }
}

if (!function_exists('getListPositionBanner')) {
    function getListPositionBanner()
    {
        return config("constants.listPositionBanner");
    }
}

if (!function_exists('getListPositionPostTopic')) {
    function getListPositionPostTopic()
    {
        return config("constants.listPositionPostTopic");
    }
}

if (!function_exists('getCalculate')) {
    function getCalculate()
    {
        return config("constants.calculate");
    }
}

if (!function_exists('getFixedPrice')) {
    function getFixedPrice()
    {
        return config("constants.fixedPrice");
    }
}

if (!function_exists('formatTextByCharNumAndLine')) {
    function formatTextByCharNumAndLine($text, $maxChars = null, $maxCharsPerLine = null, $maxLines = null, $useEllipsis = false)
    {
        if (!preg_match('/^\s*<p>.*<\/p>\s*$/s', $text)) {
            $text = "<p>{$text}</p>";
        }

        preg_match_all('/<p>(.*?)<\/p>/s', $text, $matches);
        if ($maxLines == 1 && count($matches[1]) > 1){
            $matches[1] = array_slice($matches[1],0,1);
        }

        $formartedParagraphs = array_map(function ($paragraph) use ($maxChars, $maxCharsPerLine, $maxLines, $useEllipsis) {
            $lines = [];
            $currentLine = '';
            $currentCharCount = 0;
            $totalCharCount = 0;
            $words = preg_split('//u', strip_tags($paragraph), -1, PREG_SPLIT_NO_EMPTY);
            foreach ($words as $char) {
                if ($maxChars !== null && $totalCharCount + 1 > $maxChars) {
                    if ($useEllipsis) {
                        $currentLine .= '...';
                    }
                    break;
                }
                if ($maxCharsPerLine !== null && $currentCharCount + 1 > $maxCharsPerLine) {
                    $lines[] = $currentLine;
                    $currentLine = $char;
                    $currentCharCount = 1;
                } else {
                    $currentLine .= $char;
                    $currentCharCount += 1;
                }
        
                $totalCharCount += 1;
            }
    
            if ($currentLine !== '') {
                $lines[] = $currentLine;
            }
            
            if ($maxLines !== null && count($lines) > $maxLines) {
                $lines = array_slice($lines, 0, $maxLines);
            }
            
            return implode("<br>", $lines);
        }, $matches[1]);
        
        return implode("<br>", $formartedParagraphs);
    }
}