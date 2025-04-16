<div class="cms4-top-section top-section-3">
    <div class="cms4-section-title"><span class="large">LifeStar’ｓ choice</span></div>
    <div class="relative @if(count($listTopic) >= 2) has-flick @endif">
        <div class="cms4-list-news owl-carousel">

            @foreach($listTopic as $key => $topic)
                <div class="cms4-new-item">
                    <div class="inner">
                        <div class="title">
                            <a href="{{ route('posts-topic.detail', $topic->id) }}">{{ $topic->title ?? '' }}</a>
                            <img src="{{ isset($topic->avatar) && $topic->avatar ? getLink('media'. '/' . $topic->avatar->path) : '' }}" alt="" />
                        </div>
                        <div class="thumb">
                            <a href="#">
                                <img src="{{ asset('frontend/assets/images/top-news-1.png') }}" alt="" />
                            </a>
                        </div>
                        <div class="caption">
                            {!! $topic->summary !!}
                        </div>
                        <div class="see-more text-right">
                            <a class="link-with-icon gapx-10" href="{{ route('posts-topic.detail', $topic->id) }}">
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
