<?php

namespace App\Console\Commands;

use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Verification;
use App\Mail\UserVerify;
use Illuminate\Support\Facades\Mail;


class UserResend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:resend {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resend verification email for final verification.';

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
     * @return int
     */
    public function handle()
    {
        $rules = [
            'email' => 'required|email|exists:users,email'
        ];

        $data = $this->arguments();
        $validator = \Validator::make($data, $rules);

        if ($validator->fails()) {
            $this->error($validator->errors()->first());
            return 1;
        }

        $email = $data['email'];
        $hash = md5(Carbon::now()->toDateTimeString().$email);
        $user = User::where('email', $email)->first();

        if(count($user->verifications) > 0) {
            foreach($user->verifications as $verification) {
                $verification->delete();
            }
        }


        $verification = new Verification();
        $verification->hash = $hash;
        $verification->user_id = $user->id;
        $verification->save();


        Mail::to($email)->send(new UserVerify(route('admin.user.verify', ['hash' => $hash])));
        $this->info(__('admin.user.created'));

        return 0;
    }
}
