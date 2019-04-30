@extends('admin.admin-template')
@section('content')

    <main class="app-content">
      <div class="row user">
        <div class="col-md-12">
          <div class="profile">
            <div class="info"><img class="user-img" src="{{asset(env('APP_LOGO', 'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg'))}}"  style="object-fit: cover; width: 100px; height: 100px">
              <h4>{{Auth::user('admin')->nama}}</h4>
              <p>Admin</p>
            </div>
            <div class="cover-image"></div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-update" data-toggle="tab">Update Username</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-password" data-toggle="tab">Password</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
                        
            <div class="tab-pane active" id="user-update">
              <div class="tile user-settings">
                <h4 class="line-head">Update User Reporter</h4>
                <form action="{{route('admin.profil.update')}}" method="post"> @csrf @method('PUT')
                  <div class="row">

                    <div class="col-md-9 col-sm-12">
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{$profil->username}}">
                                @if ($errors->has('username'))
                                    <small class="form-text text-muted">{{ $errors->first('username') }}</small>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-12">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Update Username</button>
                    </div>
                </div>

                  <div class="row mb-10">
                    
                  </div>
                </form>
              </div>
            </div>

            <div class="tab-pane fade" id="user-password">
              <div class="tile user-settings">
                <h4 class="line-head">Rubah Password</h4>
                <form action="{{route('admin.profil.password')}}" method="post">
                 @csrf 
                 @method('PUT')
                 <div class="row">

                  <div class="col-sm-12">
                     <div class="form-group row">
                          <label for="nama" class="col-sm-3 col-form-label">Password Lama</label>
                          <div class="col-sm-9">
                              <input class="form-control" type="password" placeholder="Password Lama" name="passwordlama">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="nama" class="col-sm-3 col-form-label">Password Baru</label>
                          <div class="col-sm-9">
                              <input class="form-control" type="password" placeholder="Password Baru" name="passwordbaru">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="nama" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
                          <div class="col-sm-9">
                              <input class="form-control" type="password" placeholder="Konfirmasi Password Baru" name="cpasswordbaru">
                          </div>
                      </div>
                    
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Rubah Password</button>
                    </div>
                  </div>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </main>
@endsection

@section('script')

<script>

function fotoURl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#foto').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

</script>
@endsection