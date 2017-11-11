@include('common-head')
@include('admin/admin-head')

<div class="container">
    <iframe src="/timer"></iframe>
    <form method="post">
        <input type="submit" name="start" value="Start" class="btn btn-primary">
        <input type="submit" name="stop" value="Stop" class="btn btn-danger">
    </form>
</div>

@include('admin/admin-footer')
@include('common-footer')