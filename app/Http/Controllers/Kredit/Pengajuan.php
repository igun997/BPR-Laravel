<?php

namespace App\Http\Controllers\Kredit;

use App\Casts\BorrowStatus;
use App\Casts\Helpers\BorrowHelper;
use App\Casts\Helpers\SaveHelper;
use App\Casts\LevelAccount;
use App\Casts\SaveStatus;
use App\Casts\SaveType;
use App\Http\Controllers\Controller;
use App\Mail\MailerNotification;
use App\Models\Borrow;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Pengajuan extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "kredit.pengajuan";
        $this->middleware($this->allowedAccess([LevelAccount::KOORDINATOR_KREDIT,LevelAccount::ADMIN_KREDIT,LevelAccount::ANALIS_KREDIT]));
    }

    public function index()
    {
        $title = "Data Pengajuan Kredit";
        $borrow = Borrow::all();
        return $this->loadView("index",compact("title","borrow"));
    }

    public function detail($id)
    {
        $borrow = Borrow::findOrfail($id);
        $title = "Detail Pengajuan #".str_pad($id,4,0,STR_PAD_LEFT);
        return $this->loadView("detail",compact("title","borrow"));
    }

    public function update_status(Request  $req,$id)
    {
        $req->validate([
            "status"=>"required"
        ]);

        $borrow = Borrow::findOrFail($id);
        $borrow->status = $req->status;
        if ($borrow->save()){
            if ($req->status == BorrowStatus::BERJALAN){
                SaveHelper::createSave(SaveType::KREDIT,SaveStatus::VERIFIED,$borrow->amount,"Pencairan Pinjaman #".str_pad($id,4,0,0),date("Y-m-d"),$borrow->user_id);
                $subject = "PT BPR Bumi Bakti Kencana - Notifikasi Klaim Kredir";
                $form = [
                    "<p>Hi ".$borrow->user->name." , Klaim Kredit Mu Telah Berhasil Di Cairkan Dengan Nomor Transaksi  #".str_pad($id,4,0,0),date("Y-m-d")."</p>",
                    "<p>Silahkan Cek di Menu Kredit Anda</p>",
                ];
                $mail_data = [
                    "title"=>$subject,
                    "subject"=>$subject,
                    "name"=>"PT BPR Bumi Bandung Kencana",
                    "from"=>env("MAIL_FROM_ADDRESS"),
                    "content"=>join("",$form)
                ];
                Mail::to($req->email)->send(new MailerNotification($mail_data,"mailer.register"));
            }elseif ($req->status == BorrowStatus::SEDANG_DIREVIEW){
                $subject = "PT BPR Bumi Bakti Kencana - Notifikasi Klaim Kredir";
                $form = [
                    "<p>Hi ".$borrow->user->name." , Kredit Kamu Sedang Review , Mohon untuk menerima telepon dari kami ya untuk wawancara kredit</p>",
                ];
                $mail_data = [
                    "title"=>$subject,
                    "subject"=>$subject,
                    "name"=>"PT BPR Bumi Bandung Kencana",
                    "from"=>env("MAIL_FROM_ADDRESS"),
                    "content"=>join("",$form)
                ];
                Mail::to($req->email)->send(new MailerNotification($mail_data,"mailer.register"));
            }elseif ($req->status == BorrowStatus::DIAJUKAN){
                $subject = "PT BPR Bumi Bakti Kencana - Notifikasi Klaim Kredir";
                $form = [
                    "<p>Hi ".$borrow->user->name." , Kamu telah mengajukan klaim kredit harap tunggu proses klaim selanjutnya</p>",
                ];
                $mail_data = [
                    "title"=>$subject,
                    "subject"=>$subject,
                    "name"=>"PT BPR Bumi Bandung Kencana",
                    "from"=>env("MAIL_FROM_ADDRESS"),
                    "content"=>join("",$form)
                ];
                Mail::to($req->email)->send(new MailerNotification($mail_data,"mailer.register"));
            }elseif ($req->status == BorrowStatus::PENGAJUAN_DITOLAK){
                $subject = "PT BPR Bumi Bakti Kencana - Notifikasi Klaim Kredir";
                $form = [
                    "<p>Hi ".$borrow->user->name." , Pengajuan Kamu Telah di Tolak</p>",
                ];
                $mail_data = [
                    "title"=>$subject,
                    "subject"=>$subject,
                    "name"=>"PT BPR Bumi Bandung Kencana",
                    "from"=>env("MAIL_FROM_ADDRESS"),
                    "content"=>join("",$form)
                ];
                Mail::to($req->email)->send(new MailerNotification($mail_data,"mailer.register"));
            }
            return $this->successBack(false);
        }
        return $this->failBack(false);
    }
}
