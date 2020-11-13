<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/12 0012
 * Time: 16:09
 */

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use JPush\Client;

class JPushChannel
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function send($notifiable, Notification $notification)
    {
        $notifiable->toJPush($notifiable, $this->client->push())->send();
    }
}