@if (isset($listMenu['categoryTags']))
    <div class="kc-tab-content menu-tab-style-2 {{ $key + 1 == 1 ? 'show' : '' }}" id="menu-tab-{{ $key + 1 }}">
        <div class="tab-content--header-2">
            @if (isset($listMenu['categories'][$item]))
                <div class="meta-date">{{ handleDayMonthFomart($listMenu['categories'][$item]->sort) }}
                    ({{ getDayOffWeek($listMenu['categories'][$item]->sort) }})
                    {{ handleHourFomart($listMenu['categories'][$item]->sort) }}
                    更新
                </div>
                @if (isset($listMenu['categories'][$item]->avatar->path))
                    <a href="{{ $listMenu['categories'][$item]->url ?? '' }}" class="img-tab-group">
                        <img class="main-img"
                            src="{{ getLink('media' . '/' . $listMenu['categories'][$item]->avatar->path) }}"
                            alt="" />
                        <span class="arrow-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758"
                                viewBox="0 0 6.935 10.758">
                                <path id="path9429"
                                    d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                    transform="translate(-1.976 -291.965)" fill="#fff"></path>
                            </svg>
                        </span>
                    </a>
                @endif
            @endif
        </div>
        <div class="tab-content-main">
            <div class="tab-tag-wrap">
                @if (isset($listMenu['categoryTags'][$item]))
                    @foreach ($listMenu['categoryTags'][$item] as $key => $menuTag)
                        @if ($menuTag)
                            <div class="{{ ($key + 1) % 2 == 0 ? 'tag-col-2' : 'tag-col-1' }}">
                                <div class="tag-header">
                                    <div class="tag-title">
                                        <span class="title">{{ $menuTag['title_japan'] ?? '' }} </span>
                                        <span class="title-en">{{ $menuTag['title_english'] ?? '' }} </span>
                                    </div>
                                </div>
                                <div class="list-tag">
                                    @if (isset($listMenu['tagGroups'][$item][$menuTag['id']]) && $listMenu['tagGroups'][$item][$menuTag['id']])
                                        @foreach ($listMenu['tagGroups'][$item][$menuTag['id']] as $keyTag => $tag)
                                            @if ($tag)
                                                <a class="tag-item"
                                                    href="{{ route('tag.detail', $tag['id']) }}"><span>#</span>{!! $tag['title'] !!}
                                                </a>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="more">
                <a href="{{ route('tag.list', $item) }}" class="tab-view-more">
                    <span>もっと見る</span>
                    <svg class="icon-link" xmlns="http://www.w3.org/2000/svg" id="external-link_1_"
                        data-name="external-link (1)" width="12.273" height="12.273" viewBox="0 0 12.273 12.273">
                        <script xmlns="" />
                        <script xmlns="" />
                        <g id="Group_2549" data-name="Group 2549" transform="translate(0 0.722)">
                            <path id="Path_3720" data-name="Path 3720"
                                d="M14.107,15.551H5.444A1.448,1.448,0,0,1,4,14.107V5.444A1.448,1.448,0,0,1,5.444,4H8.332a.682.682,0,0,1,.722.722.682.682,0,0,1-.722.722H5.444v8.663h8.663V11.219a.722.722,0,0,1,1.444,0v2.888A1.448,1.448,0,0,1,14.107,15.551Z"
                                transform="translate(-4 -4)" fill="#6879b2" />
                        </g>
                        <g id="Group_2550" data-name="Group 2550" transform="translate(7.219)">
                            <path id="Path_3721" data-name="Path 3721"
                                d="M18.332,8.053a.682.682,0,0,1-.722-.722V4.444H14.722A.682.682,0,0,1,14,3.722.682.682,0,0,1,14.722,3h3.61a.682.682,0,0,1,.722.722v3.61A.682.682,0,0,1,18.332,8.053Z"
                                transform="translate(-14 -3)" fill="#6879b2" />
                        </g>
                        <g id="Group_2551" data-name="Group 2551" transform="translate(5.775)">
                            <path id="Path_3722" data-name="Path 3722"
                                d="M12.722,9.5a.655.655,0,0,1-.505-.217.7.7,0,0,1,0-1.011L17.27,3.217a.715.715,0,0,1,1.011,1.011L13.227,9.281A.655.655,0,0,1,12.722,9.5Z"
                                transform="translate(-12 -3)" fill="#6879b2" />
                        </g>
                    </svg>
                </a>
            </div>
            @include('homepage::menu.sitemap')
        </div>
    </div>
@endif
