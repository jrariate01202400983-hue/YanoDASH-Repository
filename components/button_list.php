<?php
    function linkButtonList(array $buttons): string {
        $list = [];
        foreach ($buttons as [$label, $link, $id, $classlist]) {
            $sanitizedLabel = htmlspecialchars($label);

            $outputLink = "#";
            $isLinkValid = filter_var($link, FILTER_VALIDATE_URL);
            if ($isLinkValid) {
                $parsed = parse_url($link);
                if (in_array($parsed['scheme'] ?? '', ['http', 'https'])) $outputLink = $parsed;
            }
            array_push($list, "<a class=\"link-button\"></a>");
        }

        $output = implode("\n", $list);
        return $output;
    }
?>