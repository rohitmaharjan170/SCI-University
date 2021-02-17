<?php

function checkPermissionToAccess($permissionName){
    $admin = auth('admin')->user();
    $authorize = ($admin->can($permissionName) OR $admin->is_super) ? true:false;
    return $authorize;
}