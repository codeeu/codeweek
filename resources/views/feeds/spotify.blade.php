<?=
'<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL ?>
<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:atom="http://www.w3.org/2005/Atom" version="2.0" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd">
    <channel>
        <title><![CDATA[{{ $meta['title'] }}]]></title>
        <description><![CDATA[{{ $meta['description'] }}]]></description>
        <link>https://dev.codeweek.eu/feed/podcasts</link>
        <image>
            <url>{{ $meta['image']}}</url>
            <title>{{$meta['title']}}</title>
            <link>https://codeweek.eu/feed/podcasts</link>
        </image>
        <generator>Codeweek Podcasts</generator>
        <lastBuildDate>{{ $meta['updated'] }}</lastBuildDate>
        <atom:link href="https://dev.codeweek.eu/feed/podcasts" rel="self" type="application/rss+xml"/>
        <author><![CDATA[Max Bailey]]></author>
        <copyright><![CDATA[Max BaileyT]]></copyright>
        <language><![CDATA[en]]></language>
        <itunes:author>Max Bailey</itunes:author>
        <itunes:summary>{{$meta['description']}}</itunes:summary>
        <itunes:type>episodic</itunes:type>
        <itunes:owner>
            <itunes:name>Max Bailey</itunes:name>
            <itunes:email>m.bailey@mcgroup.com</itunes:email>
        </itunes:owner>
        <itunes:explicit>No</itunes:explicit>
        <itunes:category text="Business">
            <itunes:category text="Management"/>
        </itunes:category>
        <itunes:image
                href="{{$meta['image']}}"/>
        @foreach($items as $item)
            <item>
                <title><![CDATA[{{ $item->title }}]]></title>
                <description><![CDATA[{!! $item->summary !!}]]>
                </description>
                <link>https://codeweek.eu/feed/podcasts</link>
                <guid isPermaLink="false">{{ $item->id }}</guid>
                <dc:creator><![CDATA[Max Bailey]]></dc:creator>
                <pubDate>{{ $item->timestamp() }}</pubDate>
                <enclosure
                        url="{{$item->enclosure}}"
                        length="638812" type="audio/x-m4a"/>
                <itunes:summary>{!! $item->summary !!}
                </itunes:summary>
                <itunes:explicit>No</itunes:explicit>
                <itunes:duration>39</itunes:duration>
                <itunes:image
                        href="{{$item->image}}"/>
            </item>
        @endforeach
    </channel>
</rss>
