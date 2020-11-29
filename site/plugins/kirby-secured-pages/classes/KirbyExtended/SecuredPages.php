<?php
namespace KirbyExtended\SecuredPages;

use Kirby\Cms\Page;

class SecuredPages
{
    public static function isBlocked(?Page $page): bool
    {
        if (!$page) {
            return false;
        }

        $protectedPage = static::findProtectedPage($page);
        if (!$protectedPage) {
            return false;
        }

        if (kirby()->session()->get("securedPages.access.{$protectedPage->id()}", false)) {
            return false;
        }

        return true;
    }

    public static function findProtectedPage(Page $page): ?Page
    {
        if ($page->securedPageEnabled()->toBool()) {
            return $page;
        }

        if ($parent = $page->parent()) {
            return static::findProtectedPage($parent);
        }

        return null;
    }
}

?>
