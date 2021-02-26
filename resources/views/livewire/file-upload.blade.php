<div
x-data="{ progress: 0 }"
x-on:livewire-upload-progress="progress = $event.detail.progress"
>
	<div class="container mt-5">
		<form action="#" wire:submit.prevent="uploadFile" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="upload_file">Upload file</label>
				<input type="file" class="form-control" name="upload_file" id="upload_file" wire:model.lazy="upload_file">

				@error('upload_file')
				<strong class="text-danger mt-1"><small>{{ $message }}</small></strong>
				@enderror

				<small wire:loading wire:target="upload_file" class="w-100 mt-1">
					Please wait, uploading file...
					<div class="progress">
						<div class="progress-bar" role="progressbar" x-bind:style="`width: ${progress}%;`" aria-valuemin="0" aria-valuemax="100" x-bind:aria-valuenow="progress" x-text="`${progress}%`">0%</div>
					</div>
				</small>
			</div>
			<div class="form-group mt-2">
				<button class="btn btn-primary" wire:loading.attr="disabled">
					Start upload
				</button>
				@if ( $success_message )
				<span class="mt-2 d-block alert alert-success">
					{{ $success_message }}
				</span>
				@endif
			</div>
		</form>
	</div>
</div>
