<?=
/* Using an echo tag here so the `<? ... ?>` won't get parsed as short tags */
    '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL ?>
<rss xmlns:media="https://search.yahoo.com/mrss/"
     xmlns:itunes="https://www.itunes.com/dtds/podcast-1.0.dtd"
     xmlns:dcterms="https://purl.org/dc/terms/"
     xmlns:spotify="https://www.spotify.com/ns/rss"
     xmlns:psc="https://podlove.org/simple-chapters/"
     version="2.0">
    <channel>
        <title><![CDATA[{{ $meta['title'] }}]]></title>
        <link>
        <![CDATA[{{ url($meta['link']) }}]]></link>
        @if(!empty($meta['image']))
            <image>
                <url>{{ $meta['image'] }}</url>
                <title><![CDATA[{{ $meta['title'] }}]]></title>
                <link>
                <![CDATA[{{ url($meta['link']) }}]]></link>
            </image>
        @endif
        <description><![CDATA[{{ $meta['description'] }}]]></description>
        <language>{{ $meta['language'] }}</language>
        <pubDate>{{ $meta['updated'] }}</pubDate>

        <itunes:owner>
            <itunes:author>Max Bailey</itunes:author>
            <itunes:email>m.bailey@mcgroup.com</itunes:email>
        </itunes:owner>
        <author>Max Bailey</author>
        <email>m.bailey@mcgroup.com</email>
        <itunes:category text="Coding"/>
        <itunes:type>episodic</itunes:type>
        <itunes:image
                href="{{$meta['image']}}"/>

        @foreach($items as $item)
            <item>
                <guid isPermaLink="false">{{ $item->id }}</guid>
                <title><![CDATA[{{ $item->title }}]]></title>
                <media:title><![CDATA[{{ $item->title }}]]></media:title>
                <description><![CDATA[{!! $item->summary !!}]]></description>
                <media:description><![CDATA[{!! $item->summary !!}]]></media:description>
                <media:content type="audio/mpeg" url="{{$item->enclosure}}"/>
                <pubDate>{{ $item->timestamp() }}</pubDate>
                <itunes:duration>2700</itunes:duration>
                <enclosure
                        url="{{$item->enclosure}}" type="audio/mpeg" length="21830720"/>
                <itunes:image
                        href="{{$item->image}}"/>
            </item>
        @endforeach
    </channel>
</rss>
