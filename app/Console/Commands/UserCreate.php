<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Verification;
use App\Mail\UserVerify;
use Illuminate\Support\Facades\Mail;

class UserCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to create a new user.';

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
            'email' => 'required|email|unique:users'
        ];

        $data = $this->arguments();
        $validator = \Validator::make($data, $rules);

        if ($validator->fails()) {
            this->error($validator->errors()->first());
        }

        $email = $data['email'];
        $user = User::where('email', $email)->first();

        if(!$user) {

            $hash = md5($email);

            $user = new User();
            $user->email = $email;
            $user->save();

            $verification = new Verification();
            $verification->hash = $hash;
            $verification->user_id = $user->id;
            $verification->save();

            Mail::to($email)->send(new UserVerify(route('admin.user.verify', ['hash' => $hash])));
            $this->info(__('admin.user.created'));
        } else {
            $this->error(__('admin.user.exists'));
        }
    }
}
