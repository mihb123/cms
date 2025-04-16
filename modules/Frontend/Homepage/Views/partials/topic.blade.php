@if($listTopic)
    <div class="top-news card d-sp-none">
        <div class="card--header">
            <h2 class="title">お役立ちトピックス記事</h2>
            <div class="title-en">Three important things</div>
        </div>
        <div class="card--body">
            <div class="top-news-list {{ count($listTopic) > 2 ? 'has-flick-tb' : '' }}">
                @foreach($listTopic as $key => $topic)
                    <div class="top-news-item">
                        <div class="thumb">
                            <a href="{{ route('posts-topic.detail', $topic->id) }}" class="ratio ratio-67">
                                <img src="{{ isset($topic->avatar) && $topic->avatar ? getLink('media'. '/' . $topic->avatar->path) : '' }}" alt="" />
                            </a>
                        </div>
                        <div class="caption">
                            <h3 class="title">
                                <a href="{{ route('posts-topic.detail', $topic->id) }}">
                                    <span>{{ $topic->title ?? '' }}</span>
                                    <img src="{{ isset($topic->icon) && $topic->icon ? getLink('media'. '/' . $topic->icon->path) : '' }}" alt="" />
                                </a>
                            </h3>
                            <div class="desc">
                                {{ $topic->summary ?? '' }}
                            </div>
                            <div class="view-more text-right">
                                <a href="{{ route('posts-topic.detail', $topic->id) }}" class="link-with-icon">
                                    <span class="text">もっと詳しく見る</span>
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758" viewBox="0 0 6.935 10.758">
                                            <path id="path9429" d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z" transform="translate(-1.976 -291.965)" fill="#fff"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endif
