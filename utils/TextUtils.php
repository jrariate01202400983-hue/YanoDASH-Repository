<?php
    class TextUtils {
        public static function sanitizeIdentifier(string $id) {
            return preg_replace('/[^a-zA-Z0-9\-_:\.]/', '', $id);
        }
    }
?>