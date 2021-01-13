<?php

namespace App\Http\Middleware;

use App\Casts\LevelAccount;
use App\Casts\ScheduleType;
use App\Casts\StatusAccount;
use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;

class Gateway
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$is_must = null)
    {
        $level = session()->get("level");
        if ($level === NULL || $is_must === NULL){
            if ($request->ajax()){
                return response()->json(["msg"=>"Anda Belum Login "],400);
            }
            return  redirect("/")->withErrors(["msg"=>"Anda Belum Login"]);

        }else{
            $exploded = explode("|",$is_must);

            if (in_array($level,$exploded)){
                $is_must = $level;
//                Config::set("adminlte.sidebar_collapse",true);
                Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e){
                    $e->menu->add([
                        "text"=>"Beranda",
                        "url"=>"dashboard",
                        "icon"=>"fa fa-home"
                    ]);
                });

                if ($level == LevelAccount::ADMIN){
                    Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e){
                        $e->menu->add([
                            "text"=>"Data Kategori Komplain",
                            "url"=>"master/complaint",
                            "icon"=>"fa fa-file"
                        ]);
                        $e->menu->add([
                            "text"=>"Data Produk",
                            "url"=>"master/produk",
                            "icon"=>"fa fa-file"
                        ]);
                        $e->menu->add([
                            "text"=>"Data Akun",
                            "url"=>"master/akun",
                            "icon"=>"fa fa-file"
                        ]);

                    });
                }elseif ($level == LevelAccount::TELLER) {
                    Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e){
                        $e->menu->add([
                            "text"=>"Data Nasabah",
                            "url"=>"teller",
                            "icon"=>"fa fa-file"
                        ]);

                        $e->menu->add([
                            "text"=>"Data Transaksi",
                            "url"=>"transaksi",
                            "icon"=>"fa fa-file"
                        ]);

                        $e->menu->add([
                            "text"=>"Laporan Transaksi",
                            "url"=>"laporan/transaksi",
                            "icon"=>"fa fa-file"
                        ]);

                    });
                }elseif ($level == LevelAccount::CS) {
                    Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e){
                        $e->menu->add([
                            "text"=>"Data Pengaduan",
                            "url"=>"pengaduan",
                            "icon"=>"fa fa-headphones"
                        ]);

                        $e->menu->add([
                            "text"=>"Laporan Pengaduan",
                            "url"=>"laporan/pengaduan",
                            "icon"=>"fa fa-file"
                        ]);

                    });
                }elseif ($level == LevelAccount::ANALIS_KREDIT) {
                    Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e){
                        $e->menu->add([
                            "text"=>"Data Pengajuan",
                            "url"=>"kredit/pengajuan",
                            "icon"=>"fa fa-file"
                        ]);

                        $e->menu->add([
                            "text"=>"Laporan Pengajuan",
                            "url"=>"laporan/pengajuan",
                            "icon"=>"fa fa-file"
                        ]);

                    });
                }elseif ($level == LevelAccount::ADMIN_KREDIT) {
                    Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e){
                        $e->menu->add([
                            "text"=>"Data Pencairan",
                            "url"=>"kredit/pencairan",
                            "icon"=>"fa fa-file"
                        ]);

                        $e->menu->add([
                            "text"=>"Laporan Pencairan",
                            "url"=>"laporan/pencairan",
                            "icon"=>"fa fa-file"
                        ]);

                    });
                }elseif ($level == LevelAccount::KOORDINATOR_KREDIT) {
                    Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e){
                        $e->menu->add([
                            "text"=>"Monitoring Data Pengajuan",
                            "url"=>"kredit/pengajuan",
                            "icon"=>"fa fa-file"
                        ]);

                        $e->menu->add([
                            "text"=>"Monitoring Data Pencairan",
                            "url"=>"kredit/pencairan",
                            "icon"=>"fa fa-file"
                        ]);

                        $e->menu->add([
                            "text"=>"Laporan Pengajuan",
                            "url"=>"laporan/pengajuan",
                            "icon"=>"fa fa-file"
                        ]);

                        $e->menu->add([
                            "text"=>"Laporan Pencairan",
                            "url"=>"laporan/pencairan",
                            "icon"=>"fa fa-file"
                        ]);

                    });
                }elseif ($level == LevelAccount::KOORDINATOR_OPERASIONAL) {
                    Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e){
                        $e->menu->add([
                            "text"=>"Data Transaksi",
                            "url"=>"transaksi",
                            "icon"=>"fa fa-file"
                        ]);

                        $e->menu->add([
                            "text"=>"Data Pengaduan",
                            "url"=>"pengaduan",
                            "icon"=>"fa fa-headphones"
                        ]);

                        $e->menu->add([
                            "text"=>"Laporan Transaksi",
                            "url"=>"laporan/transaksi",
                            "icon"=>"fa fa-file"
                        ]);

                    });
                }elseif ($level == LevelAccount::NASABAH) {
                    Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e){
                        $e->menu->add([
                            "text"=>"History Transaksi",
                            "url"=>"nasabah/transaksi",
                            "icon"=>"fa fa-list"
                        ]);
                        $e->menu->add([
                            "text"=>"Kredit Online",
                            "url"=>"nasabah/kredit",
                            "icon"=>"fa fa-money-bill"
                        ]);


                    });
                }
                Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e){
                    $e->menu->add([
                        "text"=>"Logout",
                        "url"=>"logout",
                        "icon"=>"fa fa-sign-out-alt"
                    ]);
                });
            }

            if ($level == $is_must){
                return $next($request);
            }else{
                if ($request->ajax()){
                    return response()->json(["msg"=>"Anda tidak memiliki akses ke halaman ini  "],400);
                }
                return  redirect("/")->withErrors(["msg"=>"Anda tidak memiliki akses ke halaman ini "]);
            }
        }

    }
}
