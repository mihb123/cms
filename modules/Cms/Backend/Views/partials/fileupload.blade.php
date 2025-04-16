@push('scripts')
<script src="{{ asset('cms/plugins/dropzone/dropzone.js') }}"></script>
@endpush

<div class="modal fade" id="fm" role="dialog" aria-labelledby="fileManagerLabel">
	<div class="modal-dialog modal-xl" role="document" >
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title" id="fileManagerLabel">アップロード済みメディアの管理</h1>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p0">
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="fm_folder_selector">
							<form action="{{ route('media.upload') }}" id="fm_dropzone" enctype="multipart/form-data" method="POST" style="border: none;">
								{{ csrf_field() }}
								<input type="hidden" id="upload-data-type" value="" />
								<input type="hidden" id="upload-data-name" value="" />
								<input type="hidden" id="upload-data-vendor" value="" />
								<div class="dz-message"><i class="fa fa-cloud-upload-alt"></i><br>ここをクリックしてファイルを選択またはドラッグします</div>
								@if(!config('backend.media.private_uploads'))@endif
							</form>
						</div>
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 pl0">
                        <div class="row">
                            <div class="col-xs-2 col-sm-7 col-md-7"></div>
                            <div class="col-xs-10 col-sm-5 col-md-5">
                                <input type="search" class="form-control" placeholder="絞り込み検索">
                            </div>
                        </div>
						<div class="fm_file_selector">
							<ul class="ul-customer">

                            </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
