<?php

namespace App\Policies;

use App\models\Admin;
use App\models\Banner;
use Illuminate\Auth\Access\HandlesAuthorization;

class BannerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the banner.
     *
     * @param \App\Admin $user
     * @param \App\Banner $banner
     * @return mixed
     */
    public function before(Admin $admin, $ability)
    {
        if ($admin->is_super) {
            return true;
        }
    }

    public function view(Admin $admin)
    {
        return true;
    }


    /**
     * Determine whether the user can create banners.
     *
     * @param \App\Admin $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the banner.
     *
     * @param \App\Admin $user
     * @param \App\Banner $banner
     * @return mixed
     */
    public function update(Admin $user, Banner $banner)
    {
        //
    }

    /**
     * Determine whether the user can delete the banner.
     *
     * @param \App\Admin $user
     * @param \App\Banner $banner
     * @return mixed
     */
    public function delete(Admin $user, Banner $banner)
    {
        //
    }
}
