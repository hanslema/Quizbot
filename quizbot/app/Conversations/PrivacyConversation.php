<?php

namespace App\Conversations;

use App\Models\Highscore;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class PrivacyConversation extends Conversation {
    /**
     * Start the conversation
     *
     * @return mixed
     */
    public function run() {
        $this->askAboutDataDeletion();
    }

    private function askAboutDeletion() {
        $user = Highscore::where('chat_id',$this->bot->getUser()->getId())->first();

        if (! $user) {
            return $this->say('You have not played yet. There is no data to delete.');
        }

        $this->say('We stored your name and chat ID for showing you in the highscore.');
        $question = Question::create("Do you want to delete all of this data?")->addButtons([
            Button::create("yes please")->value('yes'),
            Button::create('not now')->value('no')
        ]);

        $this->ask($question, function (Answer $answer) {
            switch ($answer->getValue()) {
                case 'yes':
                    Highscore::deleteUser($this->bot->getUser()->getId());
                    return $this->say('Your data has been deleted.');
                case 'no':
                    return $this->say('Your data has not been deleted.');
                default:
                    return $this->repeat('Sorry, I did not get that. Please use the buttons.');
            }
        });
    }
}


