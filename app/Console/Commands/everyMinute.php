<?php

namespace App\Console\Commands;

use App\Scheduler;
use App\Notification;
use Ramsey\Uuid\Uuid;
use Illuminate\Console\Command;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:minute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To check for new notification every minute.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $schedulers = Scheduler::where('is_triggered' , '=' , 0)->where('trigger_datetime' , '<=' , date('Y-m-d H:i:s'))->get();

        foreach ($schedulers as $key => $scheduler) {
            if($scheduler->url_to_call == "triggeredNotification")
            {
                $params = json_decode($scheduler->params);

                //Noti Kick In Yo
                $noti = New Notification;
                $noti->id = Uuid::uuid4()->getHex();
                $noti->to_user = $params->to_user;
                $noti->tiny_img_url = $params->tiny_img_url;
                $noti->title = $params->title;
                $noti->desc =  $params->desc;
                $noti->type = $params->type;
                $noti->click_url = $params->click_url;
                $noti->send_status = $params->send_status;
                $noti->status = $params->send_status;
                $noti->created_by = $params->created_by;
                $noti->save();

                //FCM Kick In Yo
                $user = User::find($noti->to_user);
                $noti->notificationFCM($user->device_token , $noti->title , $noti->desc , null , $noti->click_url);

                $scheduler->is_triggered = 1;
                $scheduler->save();

                echo "Operation Done";
            }
        }

    }
}
