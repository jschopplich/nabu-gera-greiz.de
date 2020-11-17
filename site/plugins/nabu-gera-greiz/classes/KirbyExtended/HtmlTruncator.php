<?php

namespace KirbyExtended;

use Masterminds\HTML5;

class HtmlTruncator {
    public static array $defaultOptions = [
        'ellipsis' => '…',
        'lengthInChars' => false
    ];

    // These tags are allowed to have an ellipsis inside
    public static array $ellipsableTags = [
        'p', 'ol', 'ul', 'li',
        'div', 'header', 'article', 'nav',
        'section', 'footer', 'aside',
        'dd', 'dt', 'dl'
    ];

    public static array $selfClosingTags = [
        'br', 'hr', 'img'
    ];

    /**
     * Truncate given HTML string to specified length.
     * If `lengthInChars` is `false` it's trimmed by number
     * of words, otherwise by number of characters.
     *
     * @param string $html
     * @param integer $length
     * @param string|array $options
     * @return string
     */
    public static function truncate(string $html, int $length, $options = []): string {
        if (is_string($options)) $options = ['ellipsis' => $options];
        $options = array_merge(static::$defaultOptions, $options);

        // Wrap the HTML in case it consists of adjacent nodes
        // like `<p>foo</p><p>bar</p>`
        $html = '<div>' . static::utf8ForXml($html) . '</div>';

        $html5 = new HTML5();
        $doc = $html5->loadHTML($html);
        $rootNode = $doc->documentElement->lastChild;

        list($text, $_, $options) = static::truncateNode($doc, $rootNode, $length, $options);
        $text = mb_substr(mb_substr($text, 0, -6), 5);
        return $text;
    }

    protected static function truncateNode($doc, $node, $length, $options) {
        if ($length === 0 && !static::ellipsable($node)) {
            return ['', 1, $options];
        }

        list($inner, $remaining, $options) = static::truncateInner($doc, $node, $length, $options);

        if (0 === mb_strlen($inner)) {
            return [in_array(mb_strtolower($node->nodeName), static::$selfClosingTags)
                ? $doc->saveXML($node)
                : '', $length - $remaining, $options
            ];
        }

        while ($node->firstChild) {
            $node->removeChild($node->firstChild);
        }

        $newNode = $doc->createDocumentFragment();
        $newNode->appendXml($inner);
        $node->appendChild($newNode);
        return [$doc->saveXML($node), $length - $remaining, $options];
    }

    protected static function truncateInner($doc, $node, $length, $options) {
        $inner = '';
        $remaining = $length;

        foreach ($node->childNodes as $childNode) {
            if ($childNode->nodeType === XML_ELEMENT_NODE) {
                list($text, $nb, $options) = static::truncateNode($doc, $childNode, $remaining, $options);
            } elseif ($childNode->nodeType === XML_TEXT_NODE) {
                list($text, $nb, $options) = static::truncateText($childNode, $remaining, $options);
            } else {
                $text = '';
                $nb = 0;
            }

            $remaining -= $nb;
            $inner .= $text;

            if ($remaining < 0) {
                if (static::ellipsable($node)) {
                    $inner = preg_replace('/(?:[\s\pP]+|(?:&(?:[a-z]+|#[0-9]+);?))*$/u', '', $inner) . $options['ellipsis'];
                    $options['ellipsis'] = '';
                }

                break;
            }
        }

        return [$inner, $remaining, $options];
    }

    protected static function truncateText($node, $length, $options) {
        $xhtml = $node->ownerDocument->saveXML($node);
        preg_match_all('/\s*\S+/', $xhtml, $words);
        $words = $words[0];

        if ($options['lengthInChars']) {
            $count = mb_strlen($xhtml);
            if ($count <= $length && $length > 0) {
                return [$xhtml, $count, $options];
            }

            if (count($words) > 1) {
                $content = '';

                foreach ($words as $word) {
                    if (mb_strlen($content) + mb_strlen($word) > $length) break;
                    $content .= $word;
                }

                return [$content, $count, $options];
            }

            return [mb_substr($node->textContent, 0, $length), $count, $options];
        }

        $count = count($words);
        if ($count <= $length && $length > 0) {
            return [$xhtml, $count, $options];
        }

        return [implode('', array_slice($words, 0, $length)), $count, $options];
    }

    protected static function ellipsable($node) {
        return in_array(mb_strtolower($node->nodeName), static::$ellipsableTags);
    }

    protected static function utf8ForXml(string $string) {
        return preg_replace('/[^\x{0009}\x{000a}\x{000d}\x{0020}-\x{D7FF}\x{E000}-\x{FFFD}]+/u', ' ', $string);
    }
}

