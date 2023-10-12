<?php

namespace App\Conversation;

use App\Models\Highscore;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer as BotManAnswer;
use BotMan\BotMan\Messages\Outgoing\Question as BotManQuestion;
use BotMan\BotMan\Messages\Outgoing\Action\Buttons;

class HighscoreConversation extends Conversation {
    /**
     * Start the conversation
     *
     * @return mixed
     */

     public function run() {
        $this->showHighscore();
     }

     private function showHighscore() {
        $topUsers = Highscore::topUsers();

        if (! $topUsers->count()) {
            return $this->say('No highscore yet. Be the first one! ');
        }

        $topUsers->transform(function ($user) {
            return "_{$user->rank} - {$user->name}_ *{$user->points} points*";
        });

        $this->say('Here are the top 15 users: ');
        $this->bot->typesAndWaits(1);
        $this->say('HIGHSCORE');
        $this->bot->typesAndWaits(1);
        $this->say($topUsers->implode("\n"),['parse_mode' => 'Markdown']);
        $this->bot->typesAndWaits(2);
        $this->say("If you want to play another round click: /start \n One of the ways to improve what you know about Laravel is by going through their documentation at https://laravel.com/docs/.");

     }
}



