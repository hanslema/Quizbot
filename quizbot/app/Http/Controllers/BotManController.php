<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\LaravelCache;
use BotMan\BotMan\Drivers\DriverManager;

class BotManController extends Controller
{

    public function handle() {
        DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);

        $config = [
            'user_cache_time' => 720,
            'config' => [
                'conversation_cache_time' => 720,
            ],

            "telegram" => [
                "token" => env('TELEGRAM_TOKEN'),
            ]
        ];

        $botman = BotManFactory::create($config, new LaravelCache());

        $botman->middleware->captured(new PreventDoubleClicks);

        $botman->hears('Mambo | /aanza', function (BotMan $bot) {
            $bot->reply('Safi nzima!');
        });

        $botman->hears('Niaje', function (BotMan $bot) {
            $bot->reply('Poa sana!');
        });

        $botman->hears('start | /start', function (BotMan $bot) {
            $bot->startConversation(new QuizConversation());
        })->stopsConversation();

        $botman->hears('/highscore |highscore', function (BotMan $bot) {
            $bot->startConversation(new HighscoreConversation());
        })->stopsConversation();

        $botman->hears('/about |about', function (BotMan $bot) {
            $bot->reply("This quizbot will give you a round of questions to test yourself on the knowledge of current IT trends");
        })->stopsConversation();

        $botman->hears('/deletedata |deletedeata', function (BotMan $bot) {
            $bot->startConversation(new PrivacyConversation());
        })->stopsConversation();
        

        $botman->listen();

    }


}
