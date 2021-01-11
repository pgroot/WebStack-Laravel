@foreach($categories as $category)

    @if(count($category->sites) != 0)
        <h4 class="text-gray"><i class="linecons-tag" style="margin-right: 7px;"
                                 id="{{ $category->title }}"></i>{{ object_get($category, 'parent.title') }}

        @if(object_get($category, 'parent'))
                / {{ $category->title }}
        @else
                {{ $category->title }}
        @endif
        </h4>

        @foreach($category->sites->chunk(6) as $sites)
        <div class="row">
            @foreach($sites as $site)
                @if(substr( $site->url, 0, 4 ) === "http")
                    <div class="col-sm-2">
                        <div class="xe-widget xe-conversations box2 label-info" onclick="window.open('{{$site->url}}', '_blank')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{$site->url}}">
                            <div class="xe-comment-entry">
                                <div class="xe-comment">
                                    <a href="#" class="xe-user-name overflowClip_1">
                                        <strong>{{$site->title}}</strong> &nbsp;<i class="fa fa-external-link"></i>
                                    </a>
                                    <p class="overflowClip_2">{{$site->describe}}</p>
                                </div>
                            </div>

                            @include('inc.access_level', ['access_level' => $site->access_level])
                        </div>
                    </div>
                @else
                    <div class="col-sm-2">
                        <div class="xe-widget xe-conversations box2 label-info copy" data-clipboard-text="{{$site->url}}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{$site->url}}">
                            <div class="xe-comment-entry">
                                <div class="xe-comment">
                                    <a href="#" class="xe-user-name overflowClip_1">
                                        <strong>{{$site->title}}</strong> &nbsp;<i class="fa fa-copy"></i>
                                    </a>
                                    <p class="overflowClip_2">{{$site->describe}}</p>
                                </div>
                            </div>

                            @include('inc.access_level', ['access_level' => $site->access_level])
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        @endforeach


    @endif

    <br>
@endforeach