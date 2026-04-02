<?php
    require __DIR__. '/../utils/TextUtils.php';

    # A function to create a main section with a specified element ID, text, content, background image, background tint,
    # and inner content alignment (0 = left, 1 = center, 2 = right)
    function mainSection(
        string $id, 
        string $title, 
        string $content, 
        string $bgImage, 
        string $bgImageTint, 
        int $alignment = 0)
        : string {

        # Escaped outputs
        $sanitizedID = htmlspecialchars(TextUtils::sanitizeIdentifier($id));
        $sanitizedTitle = htmlspecialchars($title);
        $sanitizedContent = htmlspecialchars($content);
        $sanitizedBGImage = htmlspecialchars($bgImage);
        $sanitizedBGImageTint = htmlspecialchars($bgImageTint);

        # Dynamic outputs
        $alignmentClass = match ($alignment) {
            default => "left-contents",
            0 => "left-contents",
            1 => "center-contents",
            2 => "right-contents"
        };
        $classList = "main-section $alignmentClass";

        $html = <<< HTML
            <div class="$classList" style="
                background: linear-gradient($sanitizedBGImageTint, $sanitizedBGImageTint), url('$sanitizedBGImage');
                background-size: cover;
                background-position: center;">
                <div class="content-section">
                    <h1 id="{$sanitizedID}-title">$sanitizedTitle</h1>
                    <p id="{$sanitizedID}-text">$sanitizedContent</p>
                </div>
            </div>
        HTML;
        return $html;
    }
?>