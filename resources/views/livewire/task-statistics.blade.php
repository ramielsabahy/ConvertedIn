<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Top 10 Users</h3>

                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Tasks Count</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($statistics as $statistic)
                                <tr>
                                    <td>{{ $statistic->user->name }}</td>
                                    <td>{{ $statistic->user->email }}</td>
                                    <td>{{ $statistic->tasks_count }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
