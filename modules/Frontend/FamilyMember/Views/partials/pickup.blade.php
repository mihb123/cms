<div class="mitori-pickup">
    <h2 class="mitori-title"><span>Pickup 体験談</span> <img src="{{ asset('frontend/assets/images/mitori/heart-icon.png') }}" /></h2>
    <div class="pickup-slider swiper d-sp-none">
        <div class="swiper-wrapper">
        @foreach ($listTopicMember as $key => $topic)
            @if(isset($topic->familyMember))
                <div class="swiper-slide">
                    <div class="pickup-item">
                        <div class="p-header">
                            <div class="avatar-info">
                                @if(isset($topic->familyMember->avatar->path))
                                    <a href="{{ route('mitori-taiken.detail', $topic->id )}}" class="avatar">
                                        <img class="member-avatar" src="{{ getImageThumb($topic->familyMember->avatar->path) }}" alt="" />
                                    </a>
                                @endif
                                <div class="more-info">
                                    <span>{{ $topic->familyMember->birthday }}歳</span>
                                    <span>{{ $topic->familyMember->summary ?? ''}}</span>
                                </div>
                            </div>
                            <div class="name">{{ $topic->familyMember->name ?? ''}}<span class="ms">さん</span></div>
                        </div>
                        <div class="caption">
                            <h3 class="title"><a href="{{ route('mitori-taiken.detail', $topic->id )}}"><span>{{ $topic->title ?? '' }}</span></a></h3>
                        </div>
                        <div class="p-bottom">
                            <div class="rela">{{ $topic->patient_relationship ?? '' }}</div>
                            <div class="tag">{{ $topic->tag && isset($topic->tag->title) ? '#'.$topic->tag->title  : '' }}</div>
                        </div>
                        <a href="{{ route('mitori-taiken.detail', $topic->id )}}" class="arrow-right-cicle"><img src="{{ asset('frontend/assets/images/arrow-right-cicle.svg') }}" alt="" /></a>
                    </div>
                </div>
            @endif
        @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <div class="d-pc-none d-tb-none list-sp-pickup">
        @foreach ($listTopicMember as $key => $topic)
            @if(isset($topic->familyMember))
                <div class="mitori-item">
                    <div class="item-left">
                        <div class="top">
                            @if(isset($topic->familyMember->avatar->path))
                                <a href="{{ route('mitori-taiken.detail', $topic->id )}}" class="d-flex">
                                    <img class="avatar" src="{{ getImageThumb($topic->familyMember->avatar->path) }}" alt="" />
                                    <div class="title">
                                        {{ $topic->title ?? '' }}
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="bottom">
                            <a class="name" href="{{ route('mitori-taiken.detail', $topic->id )}}">{{ $topic->familyMember->name ?? ''}}<span>さん</span></a>
                            <div class="p-bottom">
                                <div class="rela">{{ $topic->patient_relationship ?? '' }}</div>
                                <div class="tag">{{ $topic->tag && isset($topic->tag->title) ? '#'.$topic->tag->title  : '' }}</div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="arrow-right-cicle"><img src="{{ asset('frontend/assets/images/arrow-right-cicle.svg') }}" alt="" /></a>
                </div>
            @endif
        @endforeach
    </div>
</div>
