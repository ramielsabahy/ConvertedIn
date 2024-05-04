<div>
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Create Task</h3>

                <div class="card-tools">

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" wire:ignore>
                            <label>Assigned By</label>
                            <select id="assigned_by" class="form-control select2bs4" style="width: 100%;" wire:model.live="adminId">
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group" wire:ignore>
                            <label>Assigned To</label>
                            <select id="assigned_to" class="form-control select2bs4" style="width: 100%;" wire:model.live="userId">
                            </select>
                        </div>
                    </div>
                    <!-- /.col -->

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" wire:model="title" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" wire:ignore>
                            <label>Description</label>
                            <textarea id="summernote">

                            </textarea>
                        </div>
                    </div>
                </div>

                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="button" class="btn btn-success" wire:click="submit">Submit</button>
            </div>

        </div>
        <!-- /.card -->
        <!-- /.row -->
    </div>
</div>
@script
<script>
    $(function () {
        // Summernote
        $('#summernote').summernote({
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    @this.set('description', contents);
                }
            }
        });
        //Initialize Select2 Elements
        $('#assigned_by').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            theme: 'bootstrap4',
            minimumInputLength: 2,
            minimumResultsForSearch: 10,
            ajax:{
                url: "{{ route('users.index') }}",
                dataType: "json",
                type: "GET",
                data: function (params) {

                    return {
                        query: params.term,
                        type: "{{ \App\RolesEnum::ADMIN }}"
                    };
                },
                processResults: function (data,status,xhr) {
                    return {
                        results: $.map(data.data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true,
            }

        }).on('change', function (e) {
            @this.set('adminId', e.target.value);
        });

        $('#assigned_to').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            theme: 'bootstrap4',
            minimumInputLength: 2,
            minimumResultsForSearch: 10,
            ajax:{
                url: "{{ route('users.index') }}",
                dataType: "json",
                type: "GET",
                data: function (params) {

                    return {
                        query: params.term,
                        type: "{{ \App\RolesEnum::USER }}"
                    };
                },
                processResults: function (data,status,xhr) {
                    return {
                        results: $.map(data.data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true,
            }

        }).on('change', function (e) {
            @this.set('userId', e.target.value);
        });



    })
</script>
@endscript
