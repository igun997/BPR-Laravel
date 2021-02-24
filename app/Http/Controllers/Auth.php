<?php

namespace App\Http\Controllers;

use App\Casts\LevelAccount;
use App\Casts\StatusAccount;
use App\Mail\MailerNotification;
use App\Models\User;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Auth extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "";
    }

    public function index(){
        if(session()->get("id")){
            return  redirect()->route("dashboard");
        }
        return view("login");
    }

    public function register()
    {
        $title = "Form Registrasi";
        return $this->loadView("register",compact("title"));
    }

    public function verify(Request $req)
    {
        $req->validate([
            "key"=>"required"
        ]);

        User::where(["username"=>base64_decode($req->key)])->update(["status"=>StatusAccount::ACTIVE]);
        return redirect()->route("login")->with(["msg"=>"Verifikasi Akun Berhasil , Silahkan Login"]);
    }

    public function register_action(Request  $req)
    {
        $req->validate([
            "name"=>"required",
            "alamat"=>"required",
            "email"=>"required",
            "no_hp"=>"required",
            "username"=>"required",
            "password"=>"required",
        ]);

        $data = $req->all();
        $data["status"] = StatusAccount::INACTIVE;
        $data["level"] = LevelAccount::NASABAH;
        $create = User::create($data);
        if ($create){
            $subject = "BPR Bumi Bakti Kencana - Aktivasi Akun";
            $link = route("index.verify",["key"=>base64_encode($req->username)]);
            $form = [
                "<p>Aktivasikan akun anda dengan meng-akses link berikut</p>",
                "<p><a href='$link' target='_blank'>$link</a></p>"
            ];
            $mail_data = [
                "title"=>$subject,
                "subject"=>$subject,
                "name"=>"PT BPR Bumi Bandung Kencana",
                "from"=>env("MAIL_FROM_ADDRESS"),
                "content"=>join("",$form)
            ];
            Mail::to($req->email)->send(new MailerNotification($mail_data,"mailer.register"));
            if (!Mail::failures()){
                return redirect()->route("login")->with(["msg"=>"Silahkan Cek Email Untuk Mengaktifkan Akun Anda"]);
            }
        }
        return  $this->failBack(false);
    }

    public function login(Request $req)
    {
        $req->validate([
            "username"=>"required",
            "password"=>"required"
        ]);

        $cek = User::where(["username"=>$req->username,"password"=>$req->password,"status"=>StatusAccount::ACTIVE]);
        if ($cek->count() > 0){
            $build = [
                "name"=>$cek->first()->name,
                "level"=>$cek->first()->level,
                "id"=>$cek->first()->id,
                "username"=>$cek->first()->username,
                "url"=>LevelAccount::redirect($cek->first()->level),
            ];
            session($build);
            return redirect($build["url"])->with(["msg"=>"Selamat Datang ".$build["name"]]);
        }else{
            return back()->withErrors(["msg"=>"Username & Password Salah"]);
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect("/");
    }
}
