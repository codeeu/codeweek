<?php

return [
    'feeds' => [
        'main' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * [App\Model::class, 'getAllFeedItems']
             *
             * You can also pass an argument to that method.  Note that their key must be the name of the parameter:             *
             * [App\Model::class, 'getAllFeedItems', 'parameterName' => 'argument']
             */
            'items' => 'App\Podcast@getFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => '/feed/podcasts',

            'title' => 'Code Week Podcast',
            'description' => 'Welcome to the EU Code Week Podcast Series. We bring coding, computational thinking, robotics and innovation closer to you, your community and your school. Join Eugenia Casariego and Arjana Blazic as they explore a range of topics, from media literacy to robotics, with the help of expert guests – to empower you to equip your students with the skills to confront the challenges and opportunities posed by a digital future.',
            'language' => 'en',

            /*
             * The image to display for the feed.  For Atom feeds, this is displayed as
             * a banner/logo; for RSS and JSON feeds, it's displayed as an icon.
             * An empty value omits the image attribute from the feed.
             */
            'image' => 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/art/cover.png',

            /*
             * The format of the feed.  Acceptable values are 'rss', 'atom', or 'json'.
             */
            'format' => 'rss',

            /*
             * The view that will render the feed.
             */
            'view' => 'feeds.spotify',

            /*
             * The mime type to be used in the <link> tag.  Set to an empty string to automatically
             * determine the correct value.
             */
            'type' => '',

            /*
             * The content type for the feed response.  Set to an empty string to automatically
             * determine the correct value.
             */
            'contentType' => '',
        ],
    ],
];
