<div class="col-sm-5 col-md-4">
    <!-- Book information section -->
    <div class="box box-solid box-label">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __($_module . '::messages.seo.title') }}</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                <label for="canter">{{ __($_module . '::messages.seo.slug') }} :</label>
                <span>{{ $node->slug }}</span>
            </div>
            <div class="form-group">
                <label for="canter">{{ __($_module . '::messages.seo.meta_title') }} :</label>
                <textarea disabled class="form-control" style="height:70px" name="meta[title]" placeholder="{{ __($_module . '::messages.seo.meta_title') }}" data-rule-maxlength="5000" cols="30" rows="3">{{ $node->meta_title }}</textarea>
            </div>
            <div class="form-group">
                <label for="canter">{{ __($_module . '::messages.seo.meta_keyword') }} :</label>
                <textarea disabled class="form-control" style="height:70px" name="meta[keywords]" placeholder="{{ __($_module . '::messages.seo.meta_keyword') }}" data-rule-maxlength="5000" cols="30" rows="3">{{ $node->meta_keywords }}</textarea>
            </div>
            <div class="form-group">
                <label for="canter">{{ __($_module . '::messages.seo.meta_description') }} :</label>
                <textarea disabled class="form-control" style="height:70px" name="meta[description]" placeholder="{{ __($_module . '::messages.seo.meta_description') }}" data-rule-maxlength="10000" cols="30" rows="3">{{ $node->meta_description }}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-5 col-md-4">
    <!-- Book information section -->
    <div class="box box-solid box-label">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __($_module . '::messages.ogp.title') }}</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                <label for="canter">{{ __($_module . '::messages.ogp.ogp_title') }} :</label>
                <input disabled class="form-control" type="text" name="ogp[title]" placeholder="{{ __($_module . '::messages.ogp.ogp_title') }}" value="{{ $node->ogp_title }}">
            </div>
            <div class="form-group">
                <label for="canter">{{ __($_module . '::messages.ogp.ogp_description') }} :</label>
                <textarea disabled class="form-control" style="height:70px" name="ogp[description]" placeholder="{{ __($_module . '::messages.ogp.ogp_description') }}" data-rule-maxlength="5000" cols="30" rows="3">{{ $node->ogp_description }}</textarea>
            </div>
            <div class="form-group">
                <label for="canter">{{ __($_module . '::messages.ogp.ogp_image') }} :</label>
                @if(!empty($node->ogp->image))
                    <div class="uploaded_image"><img src="{{ thumb($node->ogp->image['path']) }}"></div>
                @else
                @endif
            </div>
        </div>
    </div>
</div>