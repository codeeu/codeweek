<?=
'<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL ?>
<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:atom="http://www.w3.org/2005/Atom" version="2.0" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd">
    <channel>
        <title><![CDATA[{{ $meta['title'] }}]]></title>
        <description><![CDATA[{{ $meta['description'] }}]]></description>
        <link>
        https://codeweek.eu/feed/podcasts</link>
        <image>
            <url>{{ $meta['image']}}</url>
            <title>{{$meta['title']}}</title>
            <link>
            https://codeweek.eu/feed/podcasts</link>
        </image>
        <generator>Codeweek Podcasts</generator>
        <lastBuildDate>{{ $meta['updated'] }}</lastBuildDate>
        <atom:link href="https://codeweek.eu/feed/podcasts" rel="self" type="application/rss+xml"/>
        <author><![CDATA[EU Code Week]]></author>
        <copyright><![CDATA[EU Code Week]]></copyright>
        <language><![CDATA[en]]></language>
        <itunes:author>EU Code Week</itunes:author>
        <itunes:summary>{{$meta['description']}}</itunes:summary>
        <itunes:type>episodic</itunes:type>
        <itunes:owner>
            <itunes:name>EU Code Week</itunes:name>
            <itunes:email>m.bailey@mcgroup.com</itunes:email>
        </itunes:owner>
        <itunes:explicit>No</itunes:explicit>
        <itunes:category text="Education">
            <itunes:category text="Technology"/>
        </itunes:category>
        <itunes:image
                href="{{$meta['image']}}"/>
        @foreach($items as $item)
            <item>
                <title><![CDATA[{{ $item->title }}]]></title>
                <description><![CDATA[{!! $item->summary !!}]]>
                </description>
                <link>https://codeweek.eu/podcasts</link>
                <guid isPermaLink="false">{{ $item->id }}</guid>
                <dc:creator><![CDATA[EU Code Week]]></dc:creator>
                <pubDate>{{ $item->timestamp() }}</pubDate>
                <enclosure
                        url="{{$item->enclosure}}"
                        length="{{$item->enclosureLength}}" type="{{$item->enclosureType}}"/>
                <itunes:summary><![CDATA[{!! $item->summary !!}]]>
                </itunes:summary>
                <itunes:explicit>No</itunes:explicit>
                <itunes:duration>{{$item->link}}</itunes:duration>
                <itunes:image
                        href="{{$item->image}}"/>
            </item>
        @endforeach
    </channel>
</rss>
