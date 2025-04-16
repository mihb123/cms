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
                <input class="form-control" type="text" name="slug" placeholder="{{ __($_module . '::messages.seo.slug') }}" value="{{ old('slug') }}">
            </div>
            <div class="form-group">
                <label for="canter">{{ __($_module . '::messages.seo.meta_title') }} :</label>
                <textarea class="form-control" style="height:70px" name="meta[title]" placeholder="{{ __($_module . '::messages.seo.meta_title') }}" data-rule-maxlength="5000" cols="30" rows="3">{{ old('meta_title') }}</textarea>
            </div>
            <div class="form-group">
                <label for="canter">{{ __($_module . '::messages.seo.meta_keyword') }} :</label>
                <textarea class="form-control" style="height:70px" name="meta[keywords]" placeholder="{{ __($_module . '::messages.seo.meta_keyword') }}" data-rule-maxlength="5000" cols="30" rows="3">{{ old('meta_keyword') }}</textarea>
            </div>
            <div class="form-group">
                <label for="canter">{{ __($_module . '::messages.seo.meta_description') }} :</label>
                <textarea class="form-control" style="height:70px" name="meta[description]" placeholder="{{ __($_module . '::messages.seo.meta_description') }}" data-rule-maxlength="10000" cols="30" rows="3">{{ old('meta_description') }}</textarea>
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
                <input class="form-control" type="text" name="ogp[title]" placeholder="{{ __($_module . '::messages.ogp.ogp_title') }}" value="{{ old('ogp_title') }}">
            </div>
            <div class="form-group">
                <label for="canter">{{ __($_module . '::messages.ogp.ogp_description') }} :</label>
                <textarea class="form-control" style="height:70px" name="ogp[description]" placeholder="{{ __($_module . '::messages.ogp.ogp_description') }}" data-rule-maxlength="5000" cols="30" rows="3">{{ old('ogp_description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="canter">{{ __($_module . '::messages.ogp.ogp_image') }} :</label>
                @upload(['type' => 'image', 'vendor' => $_module, 'name' => 'ogp_image'])
            </div>
        </div>
    </div>
</div>