<?php
namespace Plugin\SecuredPage;

use Kirby\Cms\Page;
use Kirby\Cms\User;

class RouterAfterHook
{
    public function process(?Page $page, ?User $user): bool
    {
        if (!$page) {
            return true;
        }

        $protectedPage = $this->findProtectedPage($page);
        $return = false;

        if ($protectedPage) {
            if (isset($user)) {
                // user is logged in
                $valid = false;

                $roles = $protectedPage->securedPageRoles()->split(', ');

                foreach ($roles as $role) {
                    $sameRole = $role == $user->role()->id();
                    $valid = $valid || $sameRole;
                }

                $return = $valid;
            } else {
                // not logged in
                $return = false;
            }
        } else {
            $return = true;
        }

        return $return;
    }

    private function findProtectedPage(Page $page): ?Page
    {
        if ($page->securedPageEnabled()->toBool()) {
            return $page;
        }

        if ($parent = $page->parent()) {
            return $this->findProtectedPage($parent);
        }

        return null;
    }
}

?>
