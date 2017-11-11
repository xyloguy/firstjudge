@include('common-head')
<div id="timer">
    <div id="time">00:00</div>
</div>

<script>
    jQuery(function($){
        var endtime = 0;
        var clock = document.getElementById('time');

        function getTimeRemaining(t){
            t = parseInt(t);
            var seconds = Math.floor( (t) % 60 );
            var minutes = Math.floor( (t/60) % 60 );
            var hours = Math.floor( (t/(60*60)) % 24 );
            var days = Math.floor( t/(60*60*24) );
            var obj = {
                'total': t,
                'days': days,
                'hours': hours,
                'minutes': minutes,
                'seconds': seconds
            };
            return obj;
        }

        function pad(n) {
            n = n + '';
            return n.length >= 2 ? n : new Array(2 - n.length + 1).join('0') + n;
        }

        setInterval(function() {
            var req = $.ajax({
                type: 'get',
                url: '/api/tournament'
            });

            req.done(function(data){
                if (!!data[0] && !!data[0].timer_end) {
                    var now = Date.now();
                    var end = (new Date(data[0].timer_end + "+00:00")).valueOf();
                    endtime = (end - now) / 1000;

                } else {
                    endtime = 0;
                }
            });

        }, 200);

        function updateClock(clock) {
            var t = getTimeRemaining(endtime);
            endtime = endtime - 1;

            if (t.total <= 0) {
                clock.innerHTML = '00:00';
            } else {
                clock.innerHTML = pad(t.minutes) + ':' + pad(t.seconds);
            }
        }

        updateClock(clock);
        setInterval(function () {
            updateClock(clock);
        }, 500);
    });
</script>
@include('common-footer')