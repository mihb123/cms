<div class="kc-tab-content" id="cms4-detail-tab-2">
    <div class="tab-2-header">
        <span class="kc-button-plus plus-tag-js">
            <button>
                <img class="plus" src="{{ asset('frontend/assets/images/add.svg') }}" alt="">
                <span class="label">表示条件</span>
            </button>
            <div class="plus-dropdown">
                <button class="close-tag-popup">
                    <svg fill="#000000" height="30px" width="30px" version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 512 512" xml:space="preserve">
                        <g>
                            <g>
                                <polygon
                                    points="512,59.076 452.922,0 256,196.922 59.076,0 0,59.076 196.922,256 0,452.922 59.076,512 256,315.076 452.922,512
                                    512,452.922 315.076,256 		" />
                            </g>
                        </g>
                    </svg>
                </button>
                <div class="list-checkboxs">
                    @if (!empty($listService))
                        @foreach ($listService as $key => $item)
                            <div class="checkbox-item">
                                <input type="checkbox" name="tag[]" value="{{ $item->title }}"
                                    data-id={{ $item->id }} id="tag-{{ $item->id }}">
                                <label for="tag-{{ $item->id }}">{{ $item->title }}</label>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="confirm">
                    <button class="kc-btn-confirm" data-product-id="{{ $product->id }}">決定</button>
                </div>
            </div>
        </span>
        <div class="list list-tags-filter-js">

        </div>
    </div>

    <div class="cms4-list-stores">
        <!-- cms4 store item -->
        @include($module . '::partials.ajax.list_company')
        <!-- end cms4 store item -->

    </div>

    <script>
        function showCompany(page, id, route) {
            $.ajax({
                url: route,
                method: "GET",
                data: {
                    page: page,
                    id_product: id,
                },
                beforeSend: function() {
                    $('#cms4-detail-tab-2 .more-button').remove();
                },
                success: function(response) {
                    $('#cms4-detail-tab-2 .cms4-list-stores').append(response.result);
                }
            });
        }

        function showCompanyByService(page, id, id_service, route) {
            $.ajax({
                url: route,
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                    page: page,
                    id_product: id,
                    ids: id_service,
                },
                beforeSend: function() {
                    $('#cms4-detail-tab-2 .more-button').remove();
                },
                success: function(response) {
                    $('#cms4-detail-tab-2 .cms4-list-stores').append(response.result);
                }
            });
        }
    </script>
