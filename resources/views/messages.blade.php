@if (isset($_GET['msg']))
    <div class="alert alert-success">{{ $_GET['msg'] }}</div>
@endif

@if (isset($_GET['err']))
    <div class="alert alert-danger">{{ $_GET['err'] }}</div>
@endif
