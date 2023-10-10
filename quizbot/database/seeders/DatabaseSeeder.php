<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Track;
use App\Models\Answer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Track::truncate();
        $this->addTracks();

        $tracks = Track::all();
        Question::truncate();
        Answer::truncate();

        $questionAndAnswers = $this->getData();
        foreach ($tracks as $track) {
            $questionAndAnswers->where('track',$track->id)->each(function ($questions) {
                $createdQuestion = Question::create([
                    'text' => $question['question'],
                    'track_id' => $questions['track'],
                    'question' => $questions['question'],
                ]);
                collect($question['answers'])->each(function ($answer) use ($createdQuestion) {
                    Answer::create([
                        'question_id' => $createQuestion->id,
                        'text' => $answer['text'],
                        'correct_one' => $answer['correct_one'],
                    ]);
                });
            });

        }
    }

    private function addTracks() {
        $track = new Track();
        $track->name = 'Laravel';
        $track->save();
        $track = new Track();
        $track->name = 'Django';
        $track->save();
        $track = new Track();
        $track->name = 'React';
        $track->save();
        $track = new Track();
        $track->name = 'Solidity';
        $track->save();
        $track = new Track();
        $track->name = 'AI';
        $track->save();

    }

    private function getData() {
        return collect([
            [
                'question' => 'Is Laravel 6 an LTS release?',
                'points'=> 10,
                'track' => 1,
                'answers' => [
                    ['text' => 'Yes', 'correct_one' => true],
                    ['text' => 'No', 'correct_one' => false],
                ],
            ],
            [
                'question' => 'Which of the following is a Laravel product?',
                'points' => 10,
                'track' => 1,
                'answers' => [
                    ['text' => 'Laravel Paper', 'correct_one' => false],
                    ['text' => 'Laravel Vapor', 'correct_one' => true],
                    ['text' => 'Laravel Fume', 'correct_one' => false],
                ],
            ],

            [
                'question' => 'The name "_Laravel_" was made up by Taylor, it is a spinoff of...',
                'points' => '20',
                'track' => 1,
                'answers' => [
                    ['text' => 'an animal in Eragon', 'correct_one' => false],
                    ['text' => 'a character in The Neverending Story', 'correct_one' => false],
                    ['text' => 'a place in Narnia', 'correct_one' => true],
                ],
            ],

            [
                'question' => 'What is the correct syntax to create a _model_, _controller_, _migration_ and a _factory_ all at once with artisan?',
                'points' => '15',
                'track' => 1,
                'answers' => [
                    ['text' => 'make:model ModelName --everything', 'correct_one' => false],
                    ['text' => 'make:model ModelName --full', 'correct_one' => false],
                    ['text' => 'make:model ModelName --all', 'correct_one' => true],
                ],

            ],

            [
                'question' => 'What PHP version does Laravel 6 require?',
                'points' => '15',
                'track' => 1,
                'answers' => [
                    ['text' => '>= 7.1.3', 'correct_one' => false],
                    ['text' => '<= 7.3.', 'correct_one' => false],
                    ['text' => '>= 7.2.0', 'correct_one' => true],
                ],
            ],

            [
                'question' => 'What does the following command do? "_php artisan serve_"',
                'points' => '10',
                'track' => 1,
                'answers' => [
                    ['text' => 'It compiles your frontend assets.', 'correct_one' => false],
                    ['text' => 'It spins up a local web server.', 'correct_one' => true],
                    ['text' => 'It publishes every vendor configuration.', 'correct_one' => false],
                ],
            ]
,
            //Django
            [
                'question' => 'What is Django?',
                'points' => 5,
                'track' => 2,
                'answers' => [
                    ['text' => 'A programming language', 'correct_one' => False,],
                    ['text' => 'A web framework', 'correct_one' => True,],
                    ['text' => 'A database management system', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What programming language is Django written in?',
                'points' => 5,
                'track' => 2,
                'answers' => [
                    ['text' => 'Python', 'correct_one' => True,],
                    ['text' => 'PHP', 'correct_one' => False,],
                    ['text' => 'Java', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is the Django ORM?',
                'points' => 30,
                'track' => 2,
                'answers' => [
                    ['text' => 'A library for handling HTTP requests and responses', 'correct_one' => False,],
                    ['text' => 'A database abstraction layer', 'correct_one' => True,],
                    ['text' => 'A tool for creating HTML forms', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is the Django template system?',
                'points' => 5,
                'track' => 2,
                'answers' => [
                    ['text' => 'A tool for generating HTML forms', 'correct_one' => False,],
                    ['text' => 'A library for handling HTTP requests and responses', 'correct_one' => False,],
                    ['text' => 'A language for defining the structure and presentation of HTML pages', 'correct_one' => True,],
                ],
            ],

            [
                'question' => 'What is the Django request-response cycle?',
                'points' => 10,
                'track' => 2,
                'answers' => [
                    ['text' => 'The process of generating HTML pages from Django templates', 'correct_one' => False,],
                    ['text' => 'The process of handling HTTP requests and generating HTTP responses', 'correct_one' => True,],
                    ['text' => 'The process of managing database migrations', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is a Django view?',
                'points' => 5,
                'track' => 2,
                'answers' => [
                    ['text' => 'A Python function that takes a web request and returns a web response', 'correct_one' => True,],
                    ['text' => 'A template for generating HTML pages', 'correct_one' => False,],
                    ['text' => 'A database table representing a model', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is the difference between "django-admin" and "manage.py" commands in Django?',
                'points' => 50,
                'track' => 2,
                'answers' => [
                    ['text' => 'Both are command-line tools for managing Django projects, but "manage.py" is specific to a particular project, while "django-admin" is a global command-line tool that can be used with any Django project', 'correct_one' => True,],
                    ['text' => 'Both are global command-line tools for managing Django projects, but "manage.py" is used for setting up a new project, while "django-admin" is used for managing an existing project', 'correct_one' => False,],
                    ['text' => 'Both are specific to a particular Django project, but "manage.py" is used for running tests, while "django-admin" is used for running the development server', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is "middleware" in Django and how is it used?',
                'points' => 50,
                'track' => 2,
                'answers' => [
                    ['text' => 'Middleware is a way to add hooks for processing requests and responses at various stages of the request-response cycle in Django', 'correct_one' => True,],
                    ['text' => 'Middleware is a way to add authentication and authorization functionality to a Django project', 'correct_one' => False,],
                    ['text' => 'Middleware is a way to manage the state of a Django application', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is the difference between a "function-based view" and a "class-based view" in Django?',
                'points' => 50,
                'track' => 2,
                'answers' => [
                    ['text' => 'Function-based views are simple functions that take a request object and return a response object, while class-based views are classes that define methods for handling different HTTP methods', 'correct_one' => True,],
                    ['text' => 'Function-based views are only used for rendering templates, while class-based views are used for handling form submissions and other user input', 'correct_one' => False,],
                    ['text' => 'Function-based views are used for handling AJAX requests, while class-based views are used for handling standard HTTP requests', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is Django and what is it used for?',
                'points' => 10,
                'track' => 2,
                'answers' => [
                    ['text' => 'Django is a high-level Python web framework that is used for developing web applications', 'correct_one' => True,],
                    ['text' => 'Django is a programming language used for web development', 'correct_one' => False,],
                    ['text' => 'Django is a database management system', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is a "view" in Django and how is it used?',
                'points' => 10,
                'track' => 2,
                'answers' => [
                    ['text' => 'A "view" in Django is a Python function that processes a web request and returns an HTTP response, and is used to handle user input and generate dynamic content in a Django application', 'correct_one' => True,],
                    ['text' => 'A "view" in Django is a user interface element, such as a button or form field', 'correct_one' => False,],
                    ['text' => 'A "view" in Django is a web page template', 'correct_one' => False,],
                ],
            ],

            //React js
            [
                'question' => 'What is the difference between a controlled and uncontrolled component in React?',
                'points' => 20,
                'track' => 3,
                'answers' => [
                    ['text' => 'A controlled component is a component where the state is managed by the parent component, while an uncontrolled component is a component where the state is managed by the component itself', 'correct_one' => True,],
                    ['text' => 'A controlled component is a component that can only be updated by its parent component, while an uncontrolled component can be updated by any component in the React application', 'correct_one' => False,],
                    ['text' => 'A controlled component is a component that can be rendered in multiple ways, while an uncontrolled component is a component that can only be rendered in one way', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is the difference between a presentational component and a container component in React?',
                'points' => 20,
                'track' => 3,
                'answers' => [
                    ['text' => 'A presentational component is a component that is responsible for rendering UI, while a container component is a component that is responsible for managing data and passing it down to its child components', 'correct_one' => True,],
                    ['text' => 'A presentational component is a component that is responsible for managing data, while a container component is a component that is responsible for rendering UI', 'correct_one' => False,],
                    ['text' => 'A presentational component and a container component are identical in function and can be used interchangeably', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What does use useState do in React', 'correct_one'=> TRUE,
                'points' => 20,
                'track' => 3,
                'answers' => [
                    ['text' => 'It allows you to add state to a have state variables in functional components', 'correct_one' => True,],
                    ['text' => 'It allows you to add state to a class component', 'correct_one' => False,],
                    ['text' => 'It allows you to add state to a functional component and a class component', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is the "Virtual DOM" in React.js?',
                'points' => 20,
                'track' => 3,
                'answers' => [
                    ['text' => 'A lightweight representation of the actual DOM in memory', 'correct_one' => True,],
                    ['text' => 'An alternative to the real DOM that does not require browser rendering', 'correct_one' => False,],
                    ['text' => 'A way of optimizing the performance of React components', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is JSX in React.js?',
                'points' => 20,
                'track' => 3,
                'answers' => [
                    ['text' => 'A syntax extension that allows XML-like code to be written in JavaScript', 'correct_one' => True,],
                    ['text' => 'A library for managing state in React components', 'correct_one' => False,],
                    ['text' => 'A tool for generating documentation from React code', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is the difference between React Native and React?',
                'points' => 20,
                'track' => 3,
                'answers' => [
                    ['text' => 'React is JavaScript library created for better UI development and efficient DOM manipulation whereas React Native helps create real and exciting mobile applications for both Android and iOS devices','correct_one'=> TRUE,],
                    ['text' => 'React and React Native do the same thing for every device', 'correct_one' => FALSE,],
                    ['text' => 'React is for android and iOS devices and React Native is for pc devices','correct_one'=> FALSE,],
                ],
            ],

            [
                'question' => 'What does React Dom do?',
                'points' => 20,
                'track' => 3,
                'answers' => [
                    ['text' => 'It is a package that provides DOM-specific methods that can be used at the top level of your app and as an escape hatch to get outside of the React model if you need to.','correct_one'=> TRUE,],
                    ['text' => 'It is a package that provides DOM-specific methods that can be used at the top level of your app and as an escape hatch to get inside of the React model if you need to.','correct_one'=> FALSE,],
                    ['text' => 'It is a package that provides DOM-specific methods that can be used at the top level of your app and as an escape hatch to get outside of the React model if you need to.','correct_one'=> FALSE,],
                ],
            ],

            [
                'question' => 'What is the "virtual DOM" in React.js?',
                'points' => 20,
                'track' => 3,
                'answers' => [
                    ['text' => 'A lightweight representation of the actual DOM that React uses to optimize updates', 'correct_one' => True,],
                    ['text' => 'A way to render React components on the server side', 'correct_one' => False,],
                    ['text' => 'A tool for debugging React applications', 'correct_one' => False,],
                ],
            ],

            //Solidity
            [
                'question' => 'What is Solidity in terms of programming in Web3.0?',
                'points' => 20,
                'track' => 4,
                'answers' => [
                    ['text' => 'Solidity is a programming language used for writing smart contracts on the Ethereum blockchain', 'correct_one' => True,],
                    ['text' => 'Solidity is a programming language used for writing smart contracts on the Bitcoin blockchain', 'correct_one' => False,],
                    ['text' => 'Solidity is a programming language used for writing smart contracts on the Polkadot blockchain', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What languages influenced the creaation of Soldiity?',
                'points' => 20,
                'track' => 4,
                'answers' => [
                    ['text' => 'C++ and JavaScript', 'correct_one' => True,],
                    ['text' => 'C++ and Python', 'correct_one' => False,],
                    ['text' => 'C++ and Java', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'Since solidity is used to write smart contracts, what is a smart contract and what is it used for?',
                'points' => 20,
                'track' => 4,
                'answers' => [
                    ['text' => 'A smart contract is a piece of code that is deployed on a blockchain and can be used to automate the execution of agreements between two or more parties', 'correct_one' => True,],
                    ['text' => 'A smart contract is a website that is deployed on a database and can be used to automate the execution of agreements between two or more parties', 'correct_one' => False,],
                    ['text' => 'A smart contract is a program that is deployed on a blockchain and can be used to automate the execution of agreements between two or more parties', 'correct_one' => False,],
                ],

            ],

            [
                'question' => 'How do you execute a solidity smart contract?',
                'points' => 20,
                'track' => 4,
                'answers' => [
                    ['text' => 'By sending a transaction to the smart contract which can be deployed Online or Offline', 'correct_one' => True,],
                    ['text' => 'By sending a message to the smart contract', 'correct_one' => False,],
                    ['text' => 'By sending a request to the smart contract', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is an Event in Solidity?',
                'points' => 20,
                'track' => 4,
                'answers' => [
                    ['text' => 'An event is a way for notify the applications about the change made to the contracts and applications which can be used to execute the dependent logic.', 'correct_one' => True,],
                    ['text' => 'An event is a way for a smart contract to communicate that something happened on the blockchain to the inside world', 'correct_one' => False,],
                    ['text' => 'An event is a way for a smart contract to communicate that something happened on the blockchain to the outside world', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is Blockchain?',
                'points' => 20,
                'track' => 4,
                'answers' => [
                    ['text' => 'It is a public ledger which is decentralized and peer-to-peer platform', 'correct_one' => TRUE,],
                    ['text' => 'It is Bitcoin and crytpo', 'correct_one' => FALSE,],
                    ['text' => 'It is Web2.0 and NFTs', 'correct_one' => FALSE,],
                ],
            ],

            //AI
            [
                'question' => 'What is AI or Artifical Intelligence?',
                'points' => 20,
                'track' => 5,
                'answers' => [
                    ['text' => 'Artificial intelligence (AI) is the simulation of human intelligence processes by machines, especially computer systems programmed to think and act like humans.', 'correct_one' => True,],
                    ['text' => 'Artificial intelligence (AI) is the simulation of human intelligence processes by humans, especially computer systems.', 'correct_one' => False,],
                    ['text' => 'Artificial intelligence (AI) is the simulation of human intelligence processes by machines, especially human systems.', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What are the types of Aritficical Intelligence (AI)?',
                'points' => 20,
                'track' => 5,
                'answers' => [
                    ['text' => 'Reactive Machines, Limited Memory, Theory Of Mind, Self Awarness', 'correct_one' => True,],
                    ['text' => 'Weak AI and Strong AI', 'correct_one' => False,],
                    [
                        'text' => 'Machine Learning, Neural Networks, Generative and Deep Learning',
                        'correct_one' => false
                    ],
                ],
            ],

            [
                'question' => 'What are the technologies based on Artificial Intelligence?',
                'points' => 20,
                'track' => 5,
                'answers' => [
                    ['text' => 'Machine Learning, Neural Networks, Generative and Deep Learning', 'correct_one' => True,],
                    ['text' => 'Reactive Machines, Limited Memory, Theory Of Mind, Self Awarness', 'correct_one' => False,],
                    ['text' => 'Weak AI and Strong AI', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is the difference between Machine Learning and Generative AI?',
                'points' => 20,
                'track' => 5,
                'answers' => [
                    ['text' => 'Machine Learning is a subset of AI that uses statistical techniques to enable machines to improve with experience, while Generative AI is a subset of Machine Learning that generates new data instances that are similar to those in a given data set.', 'correct_one' => True,],
                    ['text' => 'Machine Learning is an AI that uses human reasonning to enable machines to learn from examples, while Generative AI is an AI that uses statistical techniques to enable machines to improve with experience', 'correct_one' => False,],
                    ['text' => 'Machine Learning is an that uses algorithms to enable machines to create models to go through data and generate new data, while Generative AI is a subset of AI that uses statistical techniques to enable machines to improve guessing', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What are the types of Learning in AI?',
                'points' => 20,
                'track' => 5,
                'answers' => [
                    ['text' => 'Supervised Learning, Unsupervised Learning, Reinforcement Learning', 'correct_one' => True,],
                    ['text' => 'Machine Learning, Neural Networks, Generative and Deep Learning', 'correct_one' => False,],
                    ['text' => 'Weak AI and Strong AI', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What are the types of algorithms for Supervised Learning?',
                'points' => 20,
                'track' => 5,
                'answers' => [
                    ['text' => 'Classification, Regression', 'correct_one' => True,],
                    ['text' => 'Machine Learning, Neural Networks, Generative and Deep Learning', 'correct_one' => False,],
                    ['text' => 'Weak AI and Strong AI', 'correct_one' => False,],
                ],
            ],

            [
                'question' => 'What is an Artificial Neural Network and what does it potray?',
                'points' => 20,
                'track' => 5,
                'answers' => [
                    ['text' => 'An Artificial Neural Network is a computational model that is inspired by the way biological neural networks in the human brain process information. It is composed of a large number of highly interconnected processing elements (neurones) working in unison to solve specific problems.', 'correct_one' => True,],
                    ['text' => 'An Artificial Neural Network is a computational model that is created with alogirthms and statistical approaches trained to generate new data from new data sets. It is composed of a large number algorithms generating new data.', 'correct_one' => False,],
                    ['text' => 'An Artificial Neural Network is a program created by experts for one purpose only and to solve one specific task assigned to it. Its composed of a training data set', 'correct_one' => False,],
                ],
            ],


        ]);

        //])
    }

}

