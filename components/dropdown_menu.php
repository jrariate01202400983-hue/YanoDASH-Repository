<?php
    function dropdownMenu(string $id, array $choices) {
        $sanitizedID = htmlspecialchars($id);

        # Extract the choices and store them in $outputs
        $outputs = [];
        foreach ($choices as $text => $link) {
            array_push($outputs, "<a href=\"$link\">$text</a>");
        }
        # Join the outputs into a single string with valid HTML syntax
        $choiceList = implode("\n", $outputs);

        $html = <<< HTML
            <div id="$sanitizedID" class="dropdown-contents">
                $choiceList
            </div>
        HTML;
        return $html;
    }
?>