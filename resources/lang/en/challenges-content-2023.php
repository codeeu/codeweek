<?php

return [
    'common' => [
        'share' => 'Share the link or QR code of your project on Instagram or Facebook, add the hashtag #CodeWeekChallenge and mention @CodeWeekEU.',
        'audience' => [
            'Teachers and educators',
            'Primary School students (6 to 12 years)',
            'Lower Secondary School students (12 to 16 years)',
            'Upper Secondary School students (16 to 18 years)'
        ],
    ],
    'code-a-dice' => [
        'title' => 'Code a Dice to Roll',
        'author' => 'Fabrizia Agnello',
        'purposes' => [
            'Code interactive riddles',
            'To code a simulation of a randomly moving object to be used if the real object is not available'
        ],
        'description' =>
            'In this challenge you will code a dice to randomly roll on your command. You can choose any type of dice with the number of faces you like, as those used in role play games, and add sounds as well. ',
        'instructions' => [
            'Log in to Scratch',
            'Choose a backdrop',
            'Create your dice sprite or search for one on the web and upload it to your program',
            'Create as many costumes for the sprite as the number of faces of the chosen dice, each of them showing a different number',
            'Choose how you want the dice to start rolling (pressing a keyboard key, clicking on the sprite, etc.) and write the code',
            'Code the sprite to randomly change costume at the end of the roll',
            'Add sound effects',
        ],
        'example' => 'Roll a D-20 dice'
    ],
    'personal-trainer' => [
        'title' => 'Personal trainer with micro:bit',
        'author' => '',
        'purposes' => [
            'To code micro:bit in order to use the buzzer and led panel',
            'To create a personal device to control your physical activity',
            'To code micro:bit to improve your health through sport',
        ],
        'description' =>
            'This challenge allows you to code your micro:bit to control the repetition times of physical exercises combined with rest time. You will track your physical activity at school, at home or in the park.'
        ,
        'instructions' => [
            'When A+B, create a 3-second countdown timer with a musical note sound every second and display the word GO!',
            'During the first exercise, display a flashing 2x2 square for 20 seconds. Then play a sound and keep the square fixed. During the remaining time, another flashing image must be displayed for 10 seconds. When it finished, play a sound.',
            'Then repeat the same action but display a 3x3 panel for the exercise time. Repeat these actions until the 5x5 panel is displayed.',
        ],
        'duration' => '30-40 minutes'
    ],
    'create-a-spiral' => [
        'title' => 'Create a spiral',
        'author' => 'Lydie El-Halougi',
        'purposes' => [
            'To learn and practice loop and variables.',
            'To enhance creativity in coding.'],
        'description' => 'In this challenge you will write a project with Scratch to create a spiral, using the pen blocks, a loop and a variable.',

        'instructions' => [
            'The Pen blocks',
            'Create a new project and name it Spiral.',
            'Click on the purple icon “Add extension” on the bottom-left side of the window',
            'Select “pen”: the pen blocks are now available for your project!',
            'To start your project, drag and drop the “when green flag clicked” block:',
            'You need to start with a blank page: within the pen blocks, add the “erase all” block:',
            'You want to start drawing at the center of the stage, which means your sprite has to go to the center of the stage (0,0):',
            'Your sprite can move without drawing, or move and draw:',
            'when you want it to draw, you can use the pen down block',
            'when you don’t want that, you can use the pen up block',
            'Now, you want to draw! Add the “pen down” block:',
            'The hexagon',
            'Add the blocks below to your project:',
            'You now have one sixth of your hexagon. You need to repeat this sequence 6 times:',
            'The spiral',
            'To create a spiral, you’ll need to add 2 to the length of each next side.',
            'To do so, you will use a <strong>variable.</strong>',
            'In the variable blocks, click on Make a Variable',
            'Name it length, then click OK:',
            'The spiral is going to grow, you’ll need to start small: set the first length to 10, and insert this block before the loop.',
            'Insert the variable “length” in the “move … steps” block',
            'To have the spiral grow, you also need to have the length grow in every loop: add the block below at the end of the loop:',
            'Here is your current project:',
            'A beautiful spiral ',
            'You drew a spiral! For it to go on and on, replace the “repeat 6” loop with the “forever” loop:',
            'To draw a colorful spiral, add the following block in the loop:',
            'When you start over, the sprite draws an unwanted line. To prevent it, add a “pen up” block at the beginning of the project.',
            'Here’s your final project:',
            'Congratulations! You created a lovely spiral!',
        ],

    ],
    'play-against-ai' => [
        'title' => 'Create and play against AI - Rock, Scissors, Paper Game',
        'author' => 'Kristina Slišurić',
        'purposes' => [
            'to understand how the machine learning cycle works.',
            'to build a machine learning model using Teachable Machine',
            'to familiarize yourself with the Pictoblox tool and import the created model into the project',
            'to set the stage and characters, create and initialize variables in Pictoblox',
            'to initialize the game, identify player movements, program random AI movements',
            'to create and test a game that involves artificial intelligence as an opponent in a game of Rock, Paper, Scissors.'

        ],
        'description' => 'We will create a model using Teachable Machine from images using three classes: Rock, Scissors and Paper. Model will be loaded into Pictoblox and used to create game which we can play against AI.',
        'duration' => '90 minutes',
        'instructions' => [
            'Create a new image project on Teachable machine with 3 classes named Rock, Paper, and Scissor. For each class, capture via camera at least 400 pictures. Make sure to have a clear background. Train and export the model. Upload model and copy link.',
            'Create a free account on Pictoblox site. Add a Machine Learning Extension and upload a model. Set the stage, variables and sprites. Initialize the game, identify player moves and the moves of AI and who wins the round.',
            'Train the data for the game.',
            'Testing the model.',
            'Export the model.',
            'Add machine learning extension and load the model.',
            'Set up the stage, variables and Sprite.',
            'Initialize the game.',
            'Identify Player’s Moves.',
            'Set random AI Moves.',
            'Broadcast random AI moves.',
            'Make three blocks. Who wins the round? ',
            'Check if the player wins the round.',
            'Check if the AI wins the round.',
            'Check if round is a draw.',
            'Program blocks.',
            'Rock Paper Scissors Sprite',
        ]
    ],
    'air-drawing-with-AI' => [
        'title' => 'Air drawing with AI',
        'author' => 'Kristina Slišurić',
        'purposes' => [
            'to write a program using the human body detection extension to recognize the movement of fingers in front of the camera.',
            'to code with simple blocks in a few lines of code.',
            'to see an example of using AI'
        ],
        'description' => 'Creation of a program that allows the user to draw in the air with their hand (index finger) in front of the camera and everything they draw is automatically displayed on the stage of Pictoblox.',
        'instructions' => [
            'Create account on Pictoblox',
            'follow the visual instructions to:',
            'add extensions Human Body Detection and Pen;',
            'set the stage and add sprite (Pencil) and additional sprites for: Pen Down, Pen Up, Delete all;  ',
            'write a code for sprite Pencil to follow the finger',
            'write a code for buttons: Pen Up, Pen Down and Delete all and also for Pen',
            'Now you are set to make your own drawings and play with different colors and size of a pen.',
        ],
        'materials' => [
            'A laptop or a computer with a camera',
            'The latest version of PictoBlox downloaded (recommended) or online Pictoblox (free)',
            'Pictoblox account (free)',
            'Good Internet connection'
        ]
    ],
    'emobot-kliki' => [
        'title' => 'Emobot Kliki',
        'author' => 'Margareta Zajkova',
        'purposes' => [
            'To learn basic concepts of machine learning and text recognition.',
            'To understand the role of emotions in communications.',
            'To use code to create dialogues between chatbot and a user.',
            'To understand how computers can recognize emotional tones through text analysis and respond accordingly.'
        ],
        'description' => [
            'Create Emotional Bot in Scratch that can display happy face for positive messages (if you say nice things to it), an angry face for negative messages (if you say mean things to it) and confused face if the message is unspecified.',
            'Our Emobot Kliki will recognize compliments and insults so we will see how computers can be trained to recognize emotional tone.',
        ],
        'instructions' => [
            'To get started, program a list of rules for what is nice or kind and what is bad or mean.',
            'Log in to https://machinelearningforkids.co.uk/ or create a new account.',
            'Make a new machine learning model adding 3 new labels, first call it “nice”, second bucket called “bad” and optional if you want to recognize your name, create third label called “name”.',
            'Train the new machine learning model, test it and use it to make Emobot in Scratch.',
            'Launch the Scratch 3 editor, delete the cat sprite, insert 3 new sprites made by Microsoft Bing Image Creator (happy, angry and not sure computer cartoon) or create a new sprite by clicking on the Paint icon by drawing three copies of the costume for happy, angry and not sure face.',
            'Click the “Code” tab and enter the following script.']
        ,
        'example' => [
            'Share your Emobot Kliki with your friends and learn more about AI and emotions!',
            'Instead of a computer cartoon you can try something different, like an animal. Instead of  kind and mean you could train the character to recognize other types of messages.',
        ],

    ],
    'craft-magic' => [
        'title' => 'Craft Magic with AI Hand Gestures',
        'author' => 'Georgia Lascaris',
        'purposes' => [
            'To cultivate coding skills among students, allowing them to use basic commands.',
            'To develop algorithmic thinking skills by breaking down complex tasks into manageable steps.',
            'To encourage creative problem-solving in finding unique applications of hand gestures for drawing and writing.',
            'To foster an understanding of AI concepts, particularly how AI enables computers to recognize and interpret hand gestures.',
            'To raise awareness about the significance of technology for individuals with disabilities.',
            'To promote collaborative problem-solving and teamwork among students as they work together to improve their hand gesture programs.',
            'To connect coding and computational thinking skills to real-world applications, emphasizing the meaningful impact of technology on people\'s lives and aligning with Sustainable Development Goals(SDGs).'
        ],
        'duration' => [
            '90 min for students 10-12',
            '45 min for students 12-15'
        ],
        'description' => 'Create a Scratch block-based program using the AI “Human Body” extension in a creative and engaging way, in order to draw on a screen without the need for a traditional mouse or touchscreen.',
        'instructions' => [
            'Connect to the https://ai.thestempedia.com and create a teacher & students accounts.',
            'Import the extensions ‘Human Body Detection’,’ Pen’,’ Text to Speech’.',
            'Add the ‘Pencil’ Sprite from the library and create 7 sprites (‘write’, ‘clear’, ‘black’, ‘red’, ‘blue’, ‘green’, ‘pink’).',
            'Write commands to check what happens when the ‘pencil’ sprite touches one of the other sprites.',
            'Write commands to enable the camera to recognize Hand Pose and move the pencil to the x and y coordinates of your index finger.',
            'Change costume at the end of the roll.',
            'Add sound effects.',
        ],
        'materials' => [
            'Programming platform https://ai.thestempedia.com (free)',
            'teacher account (free)',
            'student account (free)',
            'Computers with camera',
            'Internet connection',
        ]
    ],
    'circle-of-dots' => [
        'title' => 'A circle of dots',
        'author' => 'Marin Popov',
        'purposes' => [
            'To write code to draw a line of points.',
            'To write code to draw a line of dashes.',
            'To write code to draw a circle.',
            'Write code to draw a circle of dots (dashes).',
        ],
        'description' => 'Draw a circle from dots or dashes.',
        'duration' => '40 minutes',
        'instructions' => [
            'Building a dot block.',
            'Building a dash block.',
            'Constructing a circle from dot.',
            'Constructing a circle from dash.'
        ]
    ],
    'coding-escape-room' => [
        'title' => 'Create a coding escape room',
        'author' => 'Stefania Altieri and Elisa Baraghini',
        'purposes' => [
            'To teach/learn and reflect about coding concepts.',
            'To use simple coding tools.',
            'To develop computational thinking and problem solving.'
        ], 'description' => [
            'Create an escape coding experience like this:',
            'You can use google form, genially, google presentation, any tool to create a storytelling based on coding ;).'

        ],
        'duration' => '90 minutes',
        'instructions' =>
            'You can divide your students in small group, they can play and then create another challenge with the template: '
        ,

        'materials' => [
            'Any tool can be used (Google and Microsoft platform to create and share documents, presentations and sheets). Any coding construct, tool or character linked to ICT and coding.'
        ],
        'example' => [
            'Some characters who had a very important role in the ICT history and basic concepts of coding and programming, are introduced by playing. This is the best way to learn and actively participate. This game can be played in teams or individually, like a challenge or a competition. Students can then create something similar and develop competences such as creativity and coding skills.',
            'This is a very practical resource to be re-used and to be easily re-created. Google forms is one of the possible tools. You can also use Google slides, Genial.ly or Emaze or any other tool to create crossroads stories and your own adventures.',
            'The escape challenge is divided in sessions. If you guess you can go ahead. Students have to create the coding quizzes.',
        ],
    ],
    'let-the-snake-run' => [
        'title' => 'Let the snake run',
        'author' => 'Ágota Klacsákné Tóth',
        'purposes' => [
            'To code the snake\'s movement on their own micro:bit.',
            'To set the correct placing and timing for the joint animation.'
        ],
        'description' => 'Students must write codes to navigate the snake through micro:bits next to each other. It has to be done in a way that it looks like the snake is running from one micro:bit to the other.',
        'duration' => '30 minutes',
        'instructions' => [
            'Design a track that goes through several micro:bits next to each other (e.g., forming a 2x2 square).',
            'Write codes as a snake moves along a track.',
            'Work on your own device then put them together and run the code.',
            'Consider the timing and placement: If the snake goes out of one micro:bit, it will appear on the next micro:bit.',
            'Further challenges: With micro:bit v2, play music until the snake leaves your device.',
            'Design the snake by changing the brightness of the LEDs.',
            'Try longer, or more snakes.'
        ],
        'example' => [
            'This is an example for a 6 pixel long snake with4 micro:bits forming a 2x2 square: ',
            'Coding the starting micro:bit (the teacher can do it)',
            'All codes are initiated by this micro:bit, which sends a radio signal to other micro:bits when the A button is pressed.',
            'Coding the snake movement',
            'Each micro:bit must be in the same radio group as the starting micro:bit.',
            'Allanimations start when the radio signal is received.',
            'The animation of the first microbit is immediately visible, the others wait until the snake gets there.',
            'The time between the two phases determines the speed of the snake.',
        ], 'materials' => [
            'micro:bits (for every student if possible)',
            'laptop or computer for makecode.microbit.org editor'
        ]
    ],
    'illustrate-a-joke' => [
        'title' => 'Illustrate a joke with bitsy',
        'author' => 'Margot Schubert',
        'purposes' => 'To design a little game where the user finds the answer to a joke question.',
        'description' => 'The students design a game where the user finds the answer to a joke question when the figure hits an object on the playing field. The students use basic features of bitsy to complete the challenge.',
        'instructions' => [
            'Think of a joke question. Go to bitsy and start a new project. You will need:',
            'an avatar - sprite that you can move around',
            'A white cat on a purple background',
            'Description automatically generated',
            'an object to which your avatar has to go',
            'a room - the background of your program',
            'two messages: a question and an answer',
            'The finished game can be downloaded as an html file.'
        ],
        'example' => 'In this website you see an example of a joke and there is a link to a digital whiteboard:',
        'materials' => 'bitsy runs in a browser'
    ],
    'app-that-counts-in-several-languages' => [
        'title' => 'App that counts in several languages',
        'author' => 'Samuel Branco',
        'purposes' => [
            'To learn how to create a simple app.',
            'To learn to program through blocks.',
            'To learn how to add Labels, buttons, images, sensors and media.',
            'To learn how to organize elements on an app screen.'
        ],
        'description' => 'The app lets you count in multiple languages at the press of a button. Whenever the user shakes the smartphone, the count goes back to zero. The challenge is to add another language.',
        'instructions' => [
            'To complete the challenge, you need to define the other language in which you want the app to count.',
            'Then you have to download from the internet (e.g. from Pixabay or Unsplash) the flag of that country and upload it to the MIT APP Inventor platform through the element called flag, in the Picture property.',
            'Next you should find out how to spell the name of the country in English and how to say leave and press me in the language of that country.',
            'Finally, you have to add the necessary blocks for the app to work in the new language.',
        ],
        'materials' => [
            'To develop an app you need a computer or a laptop with internet access.',
            'Create an account on the MIT APP Inventor platform, accessible through the https://ai2.appinventor.mit.edu',
            'It is also necessary to install the MIT AI2 Companion app on the smartphone in order to test the developed application.'
        ]
    ],
    'coding-with-art-through-storytelling' => [
        'title' => 'Coding with art through Storytelling',
        'author' => 'Maria Tsapara and Anthi Arkouli',
        'purposes' => [
            'To cultivate skills of observation, interpretation, and questioning through engagement with art.',
            'To be creative and collaborate with others for a common goal',
            'To create an algorithm in order to re-narrate the story.',
        ],
        'description' => 'In this challenge students will get inspired by an artwork, create a story and illustrate it. Then they will try to re-narrate the story by using a programmable robotic kit/or as an unplugged activity.',
        'materials' => [
            'This activity can be implemented as an unplugged activity or by using an educational programmable robot such as beebot/bluebot/mouse robot.',
            'beebot arrow cards or arrow cards for the unplugged activity',
            'in Greek',
            'In order to learn more for the Project Zero\'s Thinking Routine Toolbox you can visit',
            '',
        ],
        'example' => [
            'The teacher works with the students to model how to design an algorithm with the cards that will provide instructions for the Bee-Bot or other robot to get to the first event of the story on the mat. Students work in teams of 3-4 to design an algorithm for the robot to move to the next sequence. Students test their algorithms on the class mat and debug, as necessary.',
            'They continue to move through as many story events as they can',
            'This activity can be implemented also as an unplugged activity.',
            'One child is the robot - another child the programmer. The programmer creates an algorithmic path by using the arrow cards in order to help the robot  to move from one image to another and re-narrate the story. Each time the robot is in an image it is asked to tell a part of the story.',
        ],
        'instructions' => [
            'The teacher asks students to observe a painting/photo.',
            'They use the thinking routine "Beginning, Middle, End" (Project Zero of Harvard School) in order to create a story.',
            'The teacher asks them "If this artwork is the beginning/middle/end of a story, what might happen next/before/in the end?',
            'Students illustrate the events of the story.',
            'Students recall the story and put the events in the grid. Using arrow cards, they create an algorithm helping beebot re-narrate the story.'
        ],
    ],
    'coding-with-legoboost' => [
        'title' => 'Coding and programming with LegoBoost - Scratch extension',
        'author' => 'Lidia Ristea',
        'purposes' => [
            'to build models using LegoBoost.',
            'to develop programming skills in Scratch.',
            'to program robots using commands from simple to complex.'
        ],
        'description' => 'In this challenge, students will use the Scratch-LegoBoost extension and enter codes in the application for the robots to move forward, backward, obstacle avoidance and voice commands.',
        'duration' => '120 minutes',
        'instructions' => [
            'Log in to the Scratch.mit.edu application.',
            'Launch Scratch Link and activate Bluetooth on the Laptop.',
            'Click Add an Extension from Scratch and choose LegoBoost.',
            'Add a picture about EU Code Week.',
            'Set the two AB motors ON, and when meeting a red obstacle, OFF.',
            'In the green color motor A is set ON, in the black color motor B ON.',
            'Green, red and black obstacles will be placed on a route.',
            'Add commands for movement and turns from arrows and text-to-speech when encountering an obstacle.',
            'Test it!'
        ]
    ]


];
