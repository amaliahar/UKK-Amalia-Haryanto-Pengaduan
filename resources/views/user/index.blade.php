@extends ('layout')
@section ('content')

<div class="container-fluid px-6">
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="mt-1">Data User</h2>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <table id="MyTables" class="table table-stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Telp</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Telp</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <th>
                            <td>{{ $user->no }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->telp }}</td>
                        </th>
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <br>
                <div class="container-fluid px-1">
                    <div class="card mb-2">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {{-- <form action="{{ route(user.store)}}" method="POST" enctype="multipart/form-data"></form> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- {!! $user->links() !!} --}}

@endsection
