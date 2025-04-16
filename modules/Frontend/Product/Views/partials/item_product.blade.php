<div class="cms4-list-items">
    <a class="cms4-item-2" href="{{ $data->url ?? '' }}">
        <div class="thumb">
            <img src="{{ $data->avatar ? getLink('media'. '/' . $data->avatar->path) : '' }}" alt="" />
        </div>
        <div class="caption">
            <h3 class="title">
                {{ $data->title ?? '' }}
            </h3>
        </div>
        <span class="cycle-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758" viewBox="0 0 6.935 10.758">
                <path id="path9429" d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z" transform="translate(-1.976 -291.965)" fill="#fff"></path>
            </svg>
        </span>
    </a>
</div>
