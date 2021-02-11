<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1"><span style="color:#ea1b23">Welcome </span> {{Auth::user()->name}}!</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li style="color:#ea1b23" class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a> =>> @yield('title')
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                    <option selected>{{date('d F,Y')}}</option>
                </select>
            </div>
        </div>
    </div>
</div>