<?=
/* Using an echo tag here so the `<? ... ?>` won't get parsed as short tags */
    '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <atom:link href="{{ url($meta['link']) }}" rel="self" type="application/rss+xml" />
        <title><![CDATA[{{ $meta['title'] }}]]></title>
        <link><![CDATA[{{ url($meta['link']) }}]]></link>
        @if(!empty($meta['image']))
            <image>
                <url>{{ $meta['image'] }}</url>
                <title><![CDATA[{{ $meta['title'] }}]]></title>
                <link><![CDATA[{{ url($meta['link']) }}]]></link>
            </image>
        @endif
        <description><![CDATA[{{ $meta['description'] }}]]></description>
        <language>{{ $meta['language'] }}</language>
        <pubDate>{{ $meta['updated'] }}</pubDate>
        <itunes:author>This American Life</itunes:author>
        <itunes:category text="News & Politics" />
        <itunes:type>episodic</itunes:type>
        <itunes:image
                href="{{$meta['image']}}" />
        <itunes:author>Max Bailey</itunes:author>

        @foreach($items as $item)
            <item>
                <guid>{{ url($item->id) }}</guid>
                <title><![CDATA[{{ $item->title }}]]></title>
                <description><![CDATA[{!! $item->summary !!}]]></description>
                <pubDate>{{ $item->timestamp() }}</pubDate>
                <itunes:duration>2700</itunes:duration>
                <enclosure
                        url="{{$item->filename}}" type="audio/mpeg" length="21830720"/>
            </item>
        @endforeach
    </channel>
</rss>
