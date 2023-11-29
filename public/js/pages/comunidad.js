$(function() {

    console.log(BASE_URL);

    class MyUploadAdapter {
		constructor( loader ) {
			// The file loader instance to use during the upload.
			this.loader = loader;
		}

		// Starts the upload process.
		upload() {
			return this.loader.file
				.then(uploadedFile => {
					return new Promise((resolve, reject) => {
                        const data = new FormData();
						data.append('file', uploadedFile);
                        data.append('_token', $('meta[name="csrf-token"]').attr('content'));
						$.ajax({
							url: BASE_URL + 'comunidad/imagen/subir',
							data: data,
							contentType: false,
							processData: false,
							method: 'POST',
							success: response => {
								resolve({
                                    default: response
								});
							},
							error: () => {
								reject('Upload failed');
							}
						});
					});
				});
		}

		// Aborts the upload process.
		abort() {
			if (this.xhr) {
				this.xhr.abort();
			}
		}
	}

	function MyCustomUploadAdapterPlugin( editor ) {
		editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
			// Configure the URL to the upload script in your back-end here!
			return new MyUploadAdapter( loader );
		};
    }


    ClassicEditor.create($('#mensaje')[0], {
        language: 'es',
        toolbar: ["heading", "|", "bold", "italic", "bulletedList", "numberedList", "|", "outdent", "indent", "|", "undo", "redo"],
        htmlEncodeoutput: false,
        entities: false,
        extraPlugins: [MyCustomUploadAdapterPlugin]
    });

})