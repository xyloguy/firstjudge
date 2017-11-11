@include('common-head')
@include('admin/admin-head')

<div class="container">
    <iframe src="/timer"></iframe>
    <form method="post" action="/admin/tournaments/1" id="startTimer">
        <?= csrf_field(); ?>
        <?= method_field("PUT"); ?>
        <input type="hidden" id="startEnd" name="timer_end" value="0000-00-00 00:00:00">
        <input type="submit" value="Start" class="btn btn-primary">
    </form>
    <form method="post" action="/admin/tournaments/1" id="stopTimer">
        <?= csrf_field(); ?>
        <?= method_field("PUT"); ?>
        <input type="hidden" name="timer_end" value="">
        <input type="submit" value="Stop" class="btn btn-primary">
    </form>
</div>

<script type="text/javascript">
    jQuery("form#startTimer").submit(function (e) {
        if (jQuery("input#startEnd").val() === "0000-00-00 00:00:00") {
            e.preventDefault();
            var date = new Date(Date.now() + ({{ $tournament->timer_duration }} + {{ $tournament->timer_pre_duration }}) * 1000)
            jQuery("input#startEnd").val(date.toUTCString())
            jQuery("form#startTimer").submit()
        }
    });
</script>

@include('admin/admin-footer')
@include('common-footer')
