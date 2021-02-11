<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('template')}}/assets/images/favicon_sia.png">
    <title>@yield('title')</title>
    <!-- Custom CSS -->
    <link href="{{asset('template')}}/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="{{asset('template')}}/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="{{asset('template')}}/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{asset('template')}}/dist/css/style.min.css" rel="stylesheet">
<style>
.sidebar-nav #sidebarnav .sidebar-item.selected > .sidebar-link {
    background: linear-gradient(to right,#ea1b63,#ea1b53,#ea1b43,#ea1b33,#ea1b23);
    box-shadow: 0 7px 12px 0 rgba(95,118,232,.21);
}
.page-item.active .page-link {
    background-color:#ea1b23;
    border-color:#ea1b23;
}
.page-item .page-link {
    background-color:#fff;
    color:#ea1b23;
}
</style>
</head>