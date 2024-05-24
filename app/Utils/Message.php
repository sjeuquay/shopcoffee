<?php

namespace App\Utils;

class Message
{
    const LABEL = 'response_message';

    /**
     * Output a formatted message string.
     *
     * @param string $type Type of the message.
     * @param string $displayText Text to display.
     * @param string $addOnClasses Additional classes to add to the tag.
     * @return string Formatted message string.
     */
    public static function out(string $type, string $displayText, string $addOnClasses = ''): string
    {
        return "<small class=\"text-{$type} {$addOnClasses}\">{$displayText}</small>";
    }

    public static function PRIMARY(string $displayText, string $addOnClasses = '')
    {
        return [ self::LABEL => self::out('primary', $displayText, $addOnClasses) ];
    }
    public static function DANGER(string $displayText = 'Xóa thành công', string $addOnClasses = '')
    {
        return [ self::LABEL => self::out('danger', $displayText, $addOnClasses) ];
    }
    public static function INFO(string $displayText = 'Cập nhật thành công', string $addOnClasses = '')
    {
        return [ self::LABEL => self::out('info', $displayText, $addOnClasses) ];
    }
    public static function SUCCESS(string $displayText = 'Thêm thành công', string $addOnClasses = '')
    {
        return [ self::LABEL => self::out('success', $displayText, $addOnClasses) ];
    }
    public static function SECONDARY(string $displayText, string $addOnClasses = '')
    {
        return [ self::LABEL => self::out('secondary', $displayText, $addOnClasses) ];
    }
}
