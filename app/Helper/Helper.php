<?php

use App\Models\InnerSidebarModel;
use App\Models\RoleModel;
use App\Models\SidebarModel;
use App\Models\UserAccessModel;
use App\Models\VendorModel;

if (!function_exists('getuserdetail')) {
    function getuserdetail($string)
    {
        $sess = session('admin_login');
        return $sess[$string] ?? '';
    }
}

if (!function_exists('get_admin_id')) {
    function get_admin_id()
    {
        $sess = session('admin_login');
        $sess_admin_id = VendorModel::where('admin_id',$sess['id'])->first();
        return $sess_admin_id->id ?? '';
    }
}

if (!function_exists('getRoleName')) {
    function getRoleName($id)
    {
        $role_name = RoleModel::where('id', $id)->first();
        return $role_name->name ?? '';
    }
}

if (!function_exists('getsidebar')) {
    function getsidebar()
    {
        $det = SidebarModel::where('flag','!=','2')->get();
        $mainarr = array();

        if (!empty($det)) {
            foreach ($det as $value) {

                $subarr = array();
                $menu = InnerSidebarModel::where('navigation_id', $value['id'])->where('flag','!=','2')->get();

                if (!empty($menu)) {
                    foreach ($menu as $sidemenu) {

                        if(getuserdetail('role') == 1) {
                            array_push($subarr, array('id' => $sidemenu->id, 'navigation_id' => $sidemenu->navigation_id, 'inner_menu' => $sidemenu->inner_menu, 'slug' => $sidemenu->slug));
                        }else{
                            $exist = UserAccessModel::where('menu','inner')->where('user_id',getuserdetail('id'))->where('nav_id',$sidemenu->id)->where('read_per','1')->first();
                            if(!empty($exist)) {
                                array_push($subarr, array('id' => $sidemenu->id, 'navigation_id' => $sidemenu->navigation_id, 'inner_menu' => $sidemenu->inner_menu, 'slug' => $sidemenu->slug));    
                            }
                        }                        
                    }
                }

                if(getuserdetail('role') == 1) {
                    array_push($mainarr, array('id' => $value['id'], 'icon' => $value['icon'], 'menu' => $value['menu'], 'slug' => $value['slug'], 'innermenu' => $subarr));
                }else{
                    $exist = UserAccessModel::where('menu','main')->where('user_id',getuserdetail('id'))->where('nav_id',$value['id'])->where('read_per','1')->first();
                    if(!empty($exist) || !empty($subarr)) {
                        array_push($mainarr, array('id' => $value['id'], 'icon' => $value['icon'], 'menu' => $value['menu'], 'slug' => $value['slug'], 'innermenu' => $subarr));
                    }
                }
            }
        }

        return $mainarr;
    }
}
?>

